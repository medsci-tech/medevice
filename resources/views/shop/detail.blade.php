<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>产品详情</title>
    <link rel="stylesheet" href="{{asset('/css/frozen.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
</head>
<body>
{{--<div class="ui-slider">--}}
{{--<ul class="ui-slider-content" style="width: 300%">--}}
{{--<li><span style="background-image:url(http://placeholder.qiniudn.com/640x200)"></span></li>--}}
{{--<li><span style="background-image:url(http://placeholder.qiniudn.com/640x200)"></span></li>--}}
{{--<li><span style="background-image:url(http://placeholder.qiniudn.com/640x200)"></span></li>--}}
{{--</ul>--}}
{{--</div>--}}

<div class="comm-padding">
    <h4>{{$product->name}}</h4>
    <h4 class="ui-txt-warning">￥{{$product->price}}</h4>
</div>

<div>
    <ul class="ui-list ui-list-text ui-border-tb ui-txt-sub">
        <li class="ui-border-t">
            <p class="ui-nowrap">供应商</p>

            <div class="ui-txt-info"><a
                        href="/supplier/detail?id={{$product->supplier_id}}">{{$product->supplier->supplier_name}}</a>
            </div>
        </li>
        <li class="ui-border-t">
            <p>注册号：<br>
                <span class="ui-txt-tips ui-txt-info">{{$product->registration_no}}</span>
            </p>
        </li>
        <li class="ui-border-t">
            <p>产品使用科室：<br>
                <span class="ui-txt-tips ui-txt-info">{{$product->department}}</span>
            </p>
        </li>
        <li class="ui-border-t">
            <p>产品使用部位：<br>
                <span class="ui-txt-tips ui-txt-info">{{$product->body_parts}}</span>
            </p>
        </li>
        @if($product->videos()->first())
        <li class="ui-border-t">
            <p class="ui-nowrap">使用教程</p>

            <div class="ui-txt-info">
                <a href="/shop/video?product_id={{$product->id}}">
                    点击查看
                </a>
            </div>
        </li>
        @endif
    </ul>
</div>

<div class="ui-top ui-border-tb spxq">
    <div class="ui-flex ui-flex-pack-center ui-txt-highlight">商品详情</div>
    <span>{{$product->introduction}}</span>

    @foreach($product->detailImages as $images)
        <div><img src="{{$images->image_url}}" width="100%"></div>
    @endforeach
</div>

<div class="ui-footer ui-footer-stable ui-btn-group ui-border-t" style="height: 50px">
    <button class="ui-btn ui-btn-primary" onclick="showOrderDia()">
        申请代理
    </button>
    @if($collect)
        <button class="ui-btn ui-btn-danger" onclick="cancelCollect({{$product->id}})">
            取消收藏
        </button>
    @else
        <button class="ui-btn ui-btn-danger" onclick="collect({{$product->id}})">
            收藏
        </button>
    @endif
</div>

<div class="ui-dialog" id="create">
    <div class="ui-dialog-cnt">
        <header class="ui-dialog-hd ui-border-b">
            <h3>完成申请</h3>
            <i class="ui-dialog-close" data-role="button" onclick="closeOrderDia()"></i>
        </header>
        <form action="#" style="padding: 5px">
            <div class="ui-form-item ui-form-item-pure ui-border-radius ui-form dialog-top">
                <input type="text" placeholder="请输入姓名" name="name" id="name">
            </div>
            <div class="ui-form-item ui-form-item-pure ui-border-radius ui-form dialog-top">
                <input type="text" placeholder="请输入联系电话" name="phone" id="phone">
            </div>
            <div class="ui-form-item ui-form-item-textarea ui-border-radius dialog-top ui-form">
                <textarea placeholder="备注" style="padding-left: 0px" name="remark" id="remark"></textarea>
            </div>

            <div class="ui-dialog-ft">
                <button type="button" data-role="button" onclick="store({{$product->id}})">申请</button>
                <button type="button" data-role="button" onclick="closeOrderDia()">取消</button>
            </div>
        </form>
    </div>
</div>

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
<script src="{{asset('/js/zepto.min.js')}}"></script>
<script src="{{asset('/js/frozen.js')}}"></script>
<script>
    (function () {
        var slider = new fz.Scroll('.ui-slider', {
            role: 'slider',
            indicator: true,
            autoplay: true,
            interval: 3000
        });

        slider.on('beforeScrollStart', function (from, to) {
            console.log(from, to);
        });

        slider.on('scrollEnd', function (cruPage) {
            //console.log(curPage);
        });

    })();

    function showDia(success, title, content) {
        $("#dia_title").text(title);
        $("#dia_content").text(content);
        if(success) {
            $("#icon").removeClass().addClass("ui-icon-success success_dia");
        } else {
            $("#icon").removeClass().addClass("ui-icon-success ui-txt-warning");
        }
        document.getElementById("dialog").style.display = "-webkit-box";
    }
    function closeDia() {
        document.getElementById("dialog").style.display = "none";
    }

    function showOrderDia() {
        document.getElementById("create").style.display = "-webkit-box";
    }
    function closeOrderDia() {
        document.getElementById("create").style.display = "none";
    }
    function store(product_id) {
        name =  document.getElementById("name").value;
        phone =  document.getElementById("phone").value;
        remark =  document.getElementById("remark").value;
        $.ajax({
            url: '/shop/create-order',
            data: {
                product_id: product_id,
                name: name,
                phone: phone,
                remark: remark,
            },
            type: "get",
            dataType: "json",
            success: function (json) {
                if(json.success) {
                    closeOrderDia();
                    showDia(true, '申请成功', '恭喜你，申请订单成功！');
                } else {
                    showDia(true, '申请失败', '申请失败,请重试！');
                }
            },
            error: function (xhr, status, errorThrown) {
                showDia(true, '申请失败', '申请失败,请重试！');
                console.log("Sorry, there was a problem!");
            }
        });
    }

    function collect(product_id) {
        $.ajax({
            url: '/shop/collect',
            data: {
                product_id: product_id
            },
            type: "get",
            dataType: "json",
            success: function (json) {
                if(json.success) {
                    window.location.reload();
                    showDia(true, '收藏成功', '恭喜你，收藏成功！');
                } else {
                    showDia(true, '收藏失败', '收藏失败,请重试！');
                }
            },
            error: function (xhr, status, errorThrown) {
                console.log("Sorry, there was a problem!");
                showDia(true, '收藏失败', '收藏失败,请重试！');
            }
        });
    }

    function cancelCollect(product_id) {
        $.ajax({
            url: '/shop/cancel-collect',
            data: {
                product_id: product_id
            },
            type: "get",
            dataType: "json",
            success: function (json) {
                if (json.success) {
                    window.location.reload();
                    showDia(true, '取消成功', '已取消收藏！');
                } else {
                    showDia(true, '取消失败', '取消收藏失败,请重试！');
                }
            },
            error: function (xhr, status, errorThrown) {
                console.log("Sorry, there was a problem!");
                showDia(true, '关注失败', '关注失败,请重试！');
            }
        });
    }
</script>
</body>
</html>