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
            (new MenuItem("ҩеƽ̨"))->buttons([
                new MenuItem('��פ����', 'view', url('/platform/suppliers')),
                new MenuItem('��Ʒר��', 'view', url('/shop/products')),
                new MenuItem('��Ʒר��', 'view', url('/shop/personal')),
            ]),
            (new MenuItem("ҩе֪ʶ"))->buttons([
                new MenuItem('������Ѷ', 'view', url('/message/news')),
                new MenuItem('ֱ������', 'view', url('/message/video')),
            ]),
            (new MenuItem("ҩе����"))->buttons([
                new MenuItem('��������', 'view', url('/personal/information')),
                new MenuItem('ҩеȦ��', 'view', url('/personal/community')),
                new MenuItem('ҩе��̳', 'view', url('/blog/index')),
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
            return Message::make('text')->content('����!');
        };
    }

    public function subscribeEventCallback()
    {
        return function ($event) {
            $openId = $event['FromUserName'];
            $content = '��!��ӭ��עҩеͨ!';
            return Message::make('text')->content($content);
        };
    }


} /*class*/