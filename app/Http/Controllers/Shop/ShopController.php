<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductCollection;
use App\Models\ProductVideo;
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
        $customer = \Helper::getCustomer();
        $product = Product::find($request->input('id'));
        return view('shop.detail', [
            'product' => $product,
            'collect' => ProductCollection::where('product_id', $request->input('id'))->where('customer_id', $customer->id)->get()->toArray() ? true : false
        ]);
    }

    public function createOrder(Request $request) {
        $customer = \Helper::getCustomer();
        $order = new Order();
        $order->customer_id = $customer->id;
        $order->product_id = $request->input('product_id');
        $order->phone = $request->input('phone');
        $order->remark = $request->input('remark');
        $order->save();
        return response()->json(['success' => true]);
    }

    public function cancelOrder(Request $request)
    {
        $customer = \Helper::getCustomer();
        Order::where('id', $request->input('id'))->where('customer_id', $customer->id)->delete();
        return response()->json(['success' => true]);
    }

    public function collect(Request $request) {
        $productID = $request->input('product_id');
        $customer = \Helper::getCustomer();
        \DB::transaction(function () use ($productID, $customer) {
            $product = Product::find($productID);
            $product->fans += 1;
            $product->save();

            $customer = \Helper::getCustomer();
            $collection = new ProductCollection();
            $collection->product_id = $productID;
            $collection->customer_id = $customer->id;
            $collection->save();
        });
        return response()->json(['success' => true]);
    }

    public function cancelCollect(Request $request)
    {
        //TODO redis
        $productID = $request->input('product_id');
        $customer = \Helper::getCustomer();
        \DB::transaction(function () use ($productID, $customer) {
            $product = Product::find($productID);
            $product->fans -= 1;
            $product->save();

            ProductCollection::where('product_id', $productID)->where('customer_id', $customer->id)->delete();
        });
        return response()->json(['success' => true]);
    }

    public function video(Request $request)
    {
        $video = ProductVideo::where('product_id', $request->input('product_id'))->get();
        return view('shop.video', [
            'videos' => $video ? $video : []
        ]);
    }
} /*class*/
