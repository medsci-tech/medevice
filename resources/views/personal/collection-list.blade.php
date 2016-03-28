<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>我的收藏</title>
    <link rel="stylesheet" href="{{asset('/css/frozen.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
</head>
<body>
<div>
    @foreach($collections as $collection)
        <ul class="ui-list  ui-border-tb" style="margin-top: 10px">
            <li class="ui-border-t">
                <div class="ui-list-info">
                    <h5>{{$collection->product->name}}</h5>
                </div>
            </li>
            <li class="ui-border-t">
                <div class="ui-list-thumb">
                    <span style="background-image:url(http://placeholder.qiniudn.com/100x100)"></span>
                </div>
                <div class="ui-list-info">
                    <h5 class="ui-nowrap">{{$collection->product->introduction}}</h5>

                    <p class="ui-nowrap ui-txt-info">时间：{{$collection->created_at}}</p>
                </div>
            </li>
            <li class="ui-border-t">
                <div class="ui-list-info">
                    <h5>价格：<span class="ui-txt-warning">￥{{$collection->product->price}}</span></h5>
                </div>
                <div class="order_pay"><h6 class="ui-list-action ui-btn ui-btn-danger">取消收藏</h6></div>
            </li>
        </ul>
    @endforeach
</div>
<div class="ui-txt-tips ui-txt-info ui-flex ui-flex-pack-center ui-top">已经没有更多关注商品了！</div>
</body>
</html>