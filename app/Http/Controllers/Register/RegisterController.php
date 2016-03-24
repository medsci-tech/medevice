<?php

namespace App\Http\Controllers\Register;

use App\Models\Customer;
use App\Models\CustomerType;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Constants\AppConstant;


class RegisterController extends Controller
{
    function __construct()
    {
    }

    public function create()
    {
        return view('register.create');
    }


    public function store(Request $request) {
        $messages = array(
            'phone.required'  => '手机号不能为空',
            'phone.digits'    => '手机格式不正确',
            'phone.phone'     => '手机格式不正确',
            'phone.unique'    => '手机号已注册',
            'code.required'   => '验证码不能为空',
            'code.digits'     => '验证码格式不正确',
        );
        $validator = \Validator::make($request->all(), [
            'phone' => 'required|digits:11|unique:customers,phone',
            'code'  => 'required|digits:6'
        ], $messages);
        if ($validator->fails()) {
            return view('register.create', ['errors' => $validator->errors(), 'input' => $request->all()]);
        }
        $result = \MessageSender::checkVerify($request->input('phone'), $request->input('code'));
        if($result) {
            $user = \Wechat::authorizeUser($request->url());
            $comstomer = new Customer();
            $comstomer->phone = $request->input('phone');
            $comstomer->openid = $user->openid;
            $comstomer->type_id = CustomerType::where('type_en', AppConstant::CUSTOMER_COMMON)->first()->id;
            $comstomer->save();
            return view('register/success');
        } else {
            $validator->errors()->add('code', '验证码错误');
            return view('register.create', ['errors' => $validator->errors(), 'input' => $request->all()]);
        }
    }

    public function sendMessage(Request $request) {
        $verifyID = \MessageSender::createMessageVerify($request->input('phone'));
        return response()->json(['success' => true, 'data' => ['verify_id' => $verifyID]]);
    }
}

