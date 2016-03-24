<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

use App\Http\Requests;

class ShopController extends Controller
{
    public function __construct()
    {
    }

    public function index() {
        $categories = ProductCategory::all();
        $products = Product::where('category_id', $categories[0]->id)->get();
        return view('shop.index', ['categories' => $categories, 'products' => $products]);
    }

    public function getProductByCatID(Request $request) {
        return response()->json(['products' => Product::where('category_id', $request->input('cat_id'))->get()]);
    }

    public function productDetail(Request $request) {
        $product = Product::find($request->input('id'));
        return view('shop.product-detail', ['product' => $product]);
    }

    public function createOrder(Request $request) {
        Order::create($request->input());
        return response()->json(['success' => true]);
    }

    public function collect(Request $request) {
        return response()->json(['success' => true]);
    }
} /*class*/
