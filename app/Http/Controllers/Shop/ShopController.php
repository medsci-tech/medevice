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

/**
 * Class ShopController
 * @package App\Http\Controllers\Shop
 */
class ShopController extends Controller
{
    /**
     * @var \App\Models\Customer
     */
    protected $_customer;

    public function __construct()
    {
        $this->middleware('wechat');
        $this->middleware('access');
        $this->_customer = \Helper::getCustomer();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = ProductCategory::all();
        $products = Product::where('category_id', $categories[0]->id)->get();
        return view('shop.index', ['categories' => $categories, 'products' => $products]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductByCatID(Request $request)
    {
        return response()->json(['products' => Product::where('category_id', $request->input('cat_id'))->get()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail(Request $request)
    {
        \UCenter::updateBeans($this->_customer->phone, 'product_view', '1');
        $product = Product::find($request->input('id'));
        return view('shop.detail', [
            'product' => $product,
            'collect' => ProductCollection::where('product_id', $request->input('id'))->where('customer_id', $this->_customer->id)->get()->toArray() ? true : false
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createOrder(Request $request)
    {
        $order = new Order();
        $order->customer_id = $this->_customer->id;
        $order->product_id = $request->input('product_id');
        $order->phone = $request->input('phone');
        $order->remark = $request->input('remark');
        $order->order_sn = time();
        $order->save();

        \UCenter::updateBeans($this->_customer->phone, 'apply_for_surrogate', '1');

        return response()->json(['success' => true]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function cancelOrder(Request $request)
    {
        Order::where('id', $request->input('id'))->where('customer_id', $this->_customer->id)->delete();
        return response()->json(['success' => true]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function collect(Request $request)
    {
        $productID = $request->input('product_id');
        $customer = $this->_customer;
        \DB::transaction(function () use ($productID, $customer) {
            $product = Product::find($productID);
            $product->fans += 1;
            $product->save();

            $collection = new ProductCollection();
            $collection->product_id = $productID;
            $collection->customer_id = $customer->id;
            $collection->save();

            \UCenter::updateBeans($customer->phone, 'collect_product', '1');
        });
        return response()->json(['success' => true]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function video(Request $request)
    {
        $video = ProductVideo::where('product_id', $request->input('product_id'))->get();

        \UCenter::updateBeans($this->_customer->phone, 'video_view', '1');
        return view('shop.video', [
            'videos' => $video ? $video : []
        ]);
    }
} /*class*/
