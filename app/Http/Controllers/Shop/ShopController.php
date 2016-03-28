<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCollection;
use Illuminate\Http\Request;

use App\Http\Requests;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('wechat');
        $this->middleware('access');
    }

    public function index() {
        $categories = ProductCategory::all();
        $products = Product::where('category_id', $categories[0]->id)->get();
        return view('shop.index', ['categories' => $categories, 'products' => $products]);
    }

    public function getProductByCatID(Request $request) {
        return response()->json(['products' => Product::where('category_id', $request->input('cat_id'))->get()]);
    }

    public function detail(Request $request)
    {
        $product = Product::find($request->input('id'));
        return view('shop.detail', ['product' => $product]);
    }

    public function createOrder(Request $request) {
        Order::create($request->input());
        return response()->json(['success' => true]);
    }

    public function collect(Request $request) {
        $customer = \Helper::getCustomer();
        $collection = new ProductCollection();
        $collection->product_id = $request->input('product_id');
        $collection->customer_id = $customer->id;
        $collection->save();

        return response()->json(['success' => true]);
    }
} /*class*/
