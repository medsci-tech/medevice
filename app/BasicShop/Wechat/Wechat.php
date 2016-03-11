<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2016/3/9
 * Time: 16:24
 */

namespace App\BasicShop\Wechat;

class Wechat
{

    private $_appId;
    private $_secret;
    private $_aeskey;
    private $_token;

    function __construct()
    {
        $this->_appId   = env('WX_APPID');
        $this->_secret  = env('WX_SECRET');
        $this->_token   = env('WX_TOKEN');
        $this->_aeskey  = env('WX_ENCODING_AESKEY');
    }


    private function createMenu()
    {
    }

} /*class*/