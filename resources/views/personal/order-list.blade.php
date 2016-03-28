<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>我的订单</title>
    <link rel="stylesheet" href="{{asset('/css/frozen.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
</head>
<body>
<div>
    @foreach($orders as $order)
        <ul class="ui-list  ui-border-tb" style="margin-top: 10px">
            <li class="ui-border-t">
                <div class="ui-list-info">
                    <h5>订单：45782333</h5>
                </div>
                <h5 class="order_cancel"><a>取消</a></h5>
            </li>
            <li class="ui-border-t">
                <div class="ui-list-thumb">
                    <span style="background-image:url(http://placeholder.qiniudn.com/100x100)"></span>
                </div>
                <div class="ui-list-info">
                    <h5 class="ui-nowrap">{{$order->product->name}}</h5>

                    <p class="ui-nowrap ui-txt-info">时间：{{$order->created_at}}</p>
                </div>
                <p class="order_cancel">￥{{$order->product->price}}<br><span class="ui-flex ui-flex-pack-end">x3</span>
                </p>
            </li>
            <li class="ui-border-t">
                <div class="ui-list-info">
                    <h5>总价：<span class="ui-txt-warning">￥2544.00</span></h5>
                </div>
                <div class="order_pay"><h6 class="ui-list-action ui-btn ui-btn-danger">付款</h6></div>
            </li>
        </ul>
    @endforeach
</div>
<div class="ui-txt-tips ui-txt-info ui-flex ui-flex-pack-center ui-top">已经没有更多订单了！</div>
</body>
</html>