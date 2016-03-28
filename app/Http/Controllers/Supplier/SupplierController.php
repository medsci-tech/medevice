<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use App\Http\Requests;
use App\Models\SupplierAttention;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('wechat');
        $this->middleware('access');
    }

    public function index() {
        return view('supplier.index', ['suppliers' =>  Supplier::all()]);
    }

    public function detail(Request $request) {
        return view('supplier.detail', ['supplier' => Supplier::find($request->input('id'))]);
    }

    public function follow(Request $request) {
        //TODO redis
        $supplierID = $request->input('supplier_id');
        $customer = \Helper::getCustomer();
        \DB::transaction(function () use ($supplierID, $customer) {
            $supplier = Supplier::find($supplierID);
            $supplier->fans += 1;
            $supplier->save();

            $attention = new SupplierAttention();
            $attention->customer_id = $customer->id;
            $attention->supplier_id = $supplierID;
            $attention->save();
        });
        return response()->json(['success'=> true]);

    }
} /*class*/
