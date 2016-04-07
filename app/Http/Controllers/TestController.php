<?php

namespace App\Http\Controllers;

use Overtrue\Wechat\Js;

class TestController extends Controller
{
    function __construct()
    {
        $this->middleware('wechat');
    }

    public function success(Request $request)
    {
        $appId = env('WX_APPID');
        $secret = env('WX_SECRET');
        $js = new Js($appId, $secret);
        return view('register.success', ['js' => $js]);
    }
}

