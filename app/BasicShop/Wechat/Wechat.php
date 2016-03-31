<?php

namespace App\BasicShop\Wechat;

use App\Constants\AppConstant;
use App\Models\Customer;
use App\Models\CustomerType;
use Overtrue\Wechat\Server;
use Overtrue\Wechat\Message;
use Overtrue\Wechat\MenuItem;
use Overtrue\Wechat\Menu;
use Overtrue\Wechat\Auth;


class Wechat
{

    private $_appId;
    private $_secret;
    private $_aesKey;
    private $_token;

    function __construct()
    {
        $this->_appId   = env('WX_APPID');
        $this->_secret  = env('WX_SECRET');
        $this->_token   = env('WX_TOKEN');
        $this->_aesKey  = env('WX_ENCODING_AESKEY');
    }

    public function getServer()
    {
        return new Server($this->_appId, $this->_token, $this->_aesKey);
    }

    private function createMenuItem()
    {
        return [
            (new MenuItem("药械平台"))->buttons([
                new MenuItem('产品专区', 'view', url('/shop')),
                new MenuItem('入驻厂家', 'view', url('/supplier'))
            ]),
            (new MenuItem("直播讲堂"))->buttons([
                new MenuItem('直播讲堂', 'view', url('/register/create')),
                new MenuItem('最新资讯', 'view', url('/article'))
            ]),
            (new MenuItem("个人中心"))->buttons([
                new MenuItem('个人信息', 'view', url('/personal')),
                new MenuItem('关于我们', 'view', url('/about'))
            ])
        ];

    }

    public function createMenu()
    {
        $menuService = new Menu($this->_appId, $this->_secret);
        $menus = $this->createMenuItem();
        try {
            $menuService->set($menus);
        } catch(\Exception $e) {
            return false;
        } /*catch>*/

        return true;
    }

    public function messageEventCallback() {
        return function ($message) {
            return Message::make('text')->content('您好!');
        };
    }

    public function subscribeEventCallback()
    {
        return function ($event) {
            \Log::info('subscribe' . $event);
            $openId = $event['FromUserName'];
            $customer = Customer::where('openid', $openId)->first();
            if ($customer) {
                return Message::make('text')->content('欢迎您回来!');
            }

//            $customer = new Customer();
//            $customer->openid = $openId;
//            $typeId = CustomerType::where('type_en', AppConstant::CUSTOMER_COMMON)->first()->id;
//            $customer->type_id = $typeId;
//            $customer->save();
            return Message::make('text')->content('嗨!欢迎关注药械通!');
        };
    }

    /**
     * @param string $jump_url
     * @return null|\Overtrue\Wechat\Utils\Bag
     */
    public function authorizeUser($jump_url)
    {
        $appId = $this->_appId;
        $secret = $this->_secret;
        $auth = new Auth($appId, $secret);
        $result = $auth->authorize(url($jump_url), 'snsapi_base,snsapi_userinfo');

        \Session::put('web_token', $result->get('access_token'));
        return $auth->getUser($result->get('openid'), $result->get('access_token'));
    }

} /*class*/