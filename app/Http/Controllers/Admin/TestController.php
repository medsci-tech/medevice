<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;

class TestController extends Controller
{
    public function export()
    {
        $customers = Customer::all();
        $array = [];
        foreach ($customers as $customer) {
            array_push($array, $customer->phone);
        }
        dd(json_encode($array));
    }
}
