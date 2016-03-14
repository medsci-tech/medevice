<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2016/3/9
 * Time: 16:24
 */

namespace App\BasicShop\Wechat;

use Overtrue\Wechat\Server;
use Overtrue\Wechat\Message;
use Overtrue\Wechat\MenuItem;
use Overtrue\Wechat\Menu;


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
                new MenuItem('入驻厂家', 'view', url('/platform/suppliers')),
                new MenuItem('产品专区', 'view', url('/shop/products')),
            ]),
            (new MenuItem("药械知识"))->buttons([
                new MenuItem('最新资讯', 'view', url('/message/news')),
                new MenuItem('直播讲堂', 'view', url('/message/video')),
            ]),
            (new MenuItem("药械社区"))->buttons([
                new MenuItem('个人中心', 'view', url('/personal/information')),
                new MenuItem('药械圈子', 'view', url('/personal/community')),
            ]),
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
            $openId = $event['FromUserName'];
            $content = '嗨!欢迎关注药械通!';
            return Message::make('text')->content($content);
        };
    }


} /*class*/