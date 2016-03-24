<?php

namespace App\Http\Personal\Controllers;

use App\BasicShop\Helper\Facades\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('wechat');
    }

    public function index() {
        return view('personal.index', ['customer' => \Helper::getCustomer()]);
    }

    public function attentionList() {

    }

    public function orderList() {

    }
} /*class*/
