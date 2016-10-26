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
     * @throws \Exception
     */
    public function __construct()
    {
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
                'appId' => '1'
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
                'appId' => '1',
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
}