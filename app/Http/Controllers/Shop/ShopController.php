<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
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

} /*class*/
