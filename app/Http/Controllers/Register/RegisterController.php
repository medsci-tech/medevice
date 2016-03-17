<?php

namespace App\Http\Controllers\Register;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $user = \Wechat::authorizeUser($request->url());
        dd($user);
        return view('register.create');
    }
}

