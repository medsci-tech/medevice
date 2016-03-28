<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>我的关注</title>
    <link rel="stylesheet" href="{{asset('/css/frozen.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
</head>
<body>
<div>
    @foreach($attentions as $attention)
        <ul class="ui-list  ui-border-tb" style="margin-top: 10px">
            <li class="ui-border-t">
                <div class="ui-list-info">
                    <h5>{{$attention->supplier->supplier_name}}</h5>
                </div>
                <h5 class="order_cancel"><a>取消关注</a></h5>
            </li>
            <li class="ui-border-t">
                <div class="ui-list-thumb">
                    <span style="background-image:url(http://placeholder.qiniudn.com/100x100)"></span>
                </div>
                <div class="ui-list-info">
                    <h5 class="ui-nowrap">{{$attention->supplier->supplier_desc}}</h5>

                    <p class="ui-nowrap ui-txt-info">时间：{{$attention->created_at}}</p>
                </div>
            </li>
        </ul>
    @endforeach
</div>
<div class="ui-txt-tips ui-txt-info ui-flex ui-flex-pack-center ui-top">已经没有更多关注商品了！</div>
</body>
</html>