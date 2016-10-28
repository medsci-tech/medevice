<?php

namespace App\BasicShop\UCenter;

/**
 * Class UCenter
 * @package App\BasicShop\UCenter
 */
class UCenter
{

    /**
     * @var string
     */
    protected $_token;

    /**
     * @var string
     */
    protected $_appId;

    /**
     * @throws \Exception
     */
    public function __construct()
    {
        $this->_appId = env('UCENTER_APPID', 1);
        if (\Session::has('uc_token') && \Session::get('uc_token')) {
            $this->_token = \Session::get('uc_token');
        } else {
            $token = $this->getToken();
            \Session::set('uc_token', $token);
            $this->_token = $token;
        }
    }


    /**
     * @return mixed
     * @throws \Exception
     */
    function getToken()
    {
        $request = [
            'url' => 'http://user.mime.org.cn/api/public/get_token',
            'params' => [
                'appId' => $this->_appId
            ]
        ];
        $response = \MyHttp::post($request);
        $result = $response->json();
        if ($result->code == 200) {
            return $result->data;
        } else {
            throw new \Exception($result->msg);
        }
    }

    /**
     * @param $phone
     * @param $action
     * @param $beans
     * @return mixed
     * @throws \Exception
     */
    function updateBeans($phone, $action, $beans)
    {
        $request = [
            'url' => 'http://user.mime.org.cn/api/credit/index',
            'params' => [
                'phone' => $phone,
                'token' => $this->_token,
                'appId' => $this->_appId,
                'action' => $action,
                'mdBeans' => $beans,
            ]
        ];
        $response = \MyHttp::post($request);
        $result = $response->json();
        if ($result->code == 200) {
            return $result->data;
        } else {
            throw new \Exception($result->msg);
        }
    }

    /**
     * @param $phone
     * @param $password
     * @return bool
     * @throws \Exception
     */
    function register($phone, $password)
    {
        $request = [
            'url' => 'http://user.mime.org.cn/api/public/register',
            'params' => [
                'token' => $this->_token,
                'appId' => $this->_appId,
                'phone' => $phone,
                'password' => $password
            ]
        ];
        $response = \MyHttp::post($request);
        $result = $response->json();
        if ($result->code == 200) {
            return true;
        } else {
            throw new \Exception($result->msg);
        }
    }

    /**
     * @param $phone
     * @param $password
     * @return bool
     * @throws \Exception
     */
    function setPwd($phone, $password)
    {
        $request = [
            'url' => 'http://user.mime.org.cn/api/public/setPwd',
            'params' => [
                'token' => $this->_token,
                'appId' => $this->_appId,
                'phone' => $phone,
                'password' => $password,
                'repassword' => $password
            ]
        ];
        $response = \MyHttp::post($request);
        $result = $response->json();
        dd($result);
        if ($result->code == 200) {
            return true;
        } else {
            throw new \Exception($result->msg);
        }
    }

}