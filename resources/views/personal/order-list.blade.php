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
                    <h5>订单：{{$order->order_sn}}</h5>
                </div>
            </li>
            <li class="ui-border-t">
                <div class="ui-list-thumb">
                    <span style="background-image:url({{$order->product->logo_image_url}})"></span>
                </div>
                <div class="ui-list-info">
                    <h5 class="ui-nowrap">{{$order->product->name}}</h5>

                    <p class="ui-nowrap ui-txt-info">时间：{{$order->created_at}}</p>
                </div>
                {{--<p class="order_cancel">￥{{$order->product->price}}<br><span class="ui-flex ui-flex-pack-end"></span>--}}
                {{--</p>--}}
            </li>
            <li class="ui-border-t">
                <div class="ui-list-info">
                    <h5>价格：<span class="ui-txt-warning">待定</span></h5>
                    {{--<h5>价格：<span class="ui-txt-warning">￥{{$order->product->price}}</span></h5>--}}
                </div>
                <div class="order_pay"><h6 class="ui-list-action ui-btn ui-btn-danger"
                                           onclick="cancel({{$order->id}})">取消订单</h6></div>
            </li>
        </ul>
    @endforeach
</div>
<div class="ui-txt-tips ui-txt-info ui-flex ui-flex-pack-center ui-top">已经没有更多订单了！</div>

<div class="ui-dialog" id="dialog">
    <div class="ui-dialog-cnt">
        <header class="ui-dialog-hd ui-border-b">
            <h3 id="dia_title"></h3>
            <i class="ui-dialog-close" data-role="button" onclick="closeDia()"></i>
        </header>
        <div class="ui-dialog-bd">
            <i class="ui-icon-success success_dia" id="icon"></i><h4 id="dia_content"></h4>
        </div>
        <div class="ui-dialog-ft">
            <button type="button" data-role="button" onclick="closeDia()">确定</button>
        </div>
    </div>
</div>

<script src="http://cdn.bootcss.com/bootswatch/2.0.2/js/jquery.js"></script>
<script>
    function showDia(success, title, content) {
        $("#dia_title").text(title);
        $("#dia_content").text(content);
        if (success) {
            $("#icon").removeClass().addClass("ui-icon-success success_dia");
        } else {
            $("#icon").removeClass().addClass("ui-icon-success ui-txt-warning");
        }
        document.getElementById("dialog").style.display = "-webkit-box";
    }
    function closeDia() {
        window.location.reload();
        document.getElementById("dialog").style.display = "none";
    }

    function cancel(id) {
        $.ajax({
            url: '/shop/cancel-order',
            data: {
                id: id
            },
            type: "get",
            dataType: "json",
            success: function (json) {
                if (json.success) {
                    showDia(true, '取消成功', '已取消代理申请！');
                } else {
                    showDia(true, '取消失败', '取消代理申请失败,请重试！');
                }
            },
            error: function (xhr, status, errorThrown) {
                console.log("Sorry, there was a problem!");
                showDia(true, '取消失败', '取消代理申请失败,请重试！');
            }
        });
    }
</script>
</body>
</html>