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
            $this->_token = env('LUOSIMAO_API_KEY');
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
                'appId' => '2'
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
            'url' => 'http://user.mime.org.cn/api/public/get_token',
            'params' => [
                'phone' => $phone,
                'token' => $this->_token,
                'appId' => '2',
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