<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Supplier;


use App\Http\Requests;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
    }

    public function index() {
        return view('supplier.index', ['suppliers' =>  Supplier::all()]);
    }

    public function detail(Request $request) {
        return view('supplier.detail', ['supplier' => Supplier::find($request->input('id'))]);
    }

    public function follow(Request $request) {
        //TODO redis
        //TODO DB::transaction
        $supplier = Supplier::find($request->input('supplier_id'));
        $supplier->fans += 1;
        $supplier->save;

        return response()->json(['success'=> true]);
    }
} /*class*/
