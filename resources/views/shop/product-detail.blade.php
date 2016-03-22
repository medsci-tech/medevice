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
<div class="ui-slider" style="padding-top: 55%">
    <ul class="ui-slider-content" style="width: 300%">
        <li><span style="background-image:url(http://placeholder.qiniudn.com/640x200)"></span></li>
        <li><span style="background-image:url(http://placeholder.qiniudn.com/640x200)"></span></li>
        <li><span style="background-image:url(http://placeholder.qiniudn.com/640x200)"></span></li>
    </ul>
</div>

<div class="comm-padding">
    <h4>{{$product->name}}</h4>
    <h4 class="ui-txt-warning">￥{{$product->price}}</h4>
</div>

<div>
    <ul class="ui-list ui-list-text ui-border-tb ui-txt-sub">
        <li class="ui-border-t">
            <p class="ui-nowrap">供应商</p>

            <div class="ui-txt-info">{{$product->supplier->suppliers_name}}</div>
        </li>
    </ul>
    <ul class="ui-list ui-list-text ui-list-link ui-border-b ui-txt-sub">
        <li class="ui-border-t">
            <p>使用教程</p>

            <div class="ui-txt-info">点击查看</div>
        </li>
    </ul>
</div>

<div class="ui-top ui-border-tb spxq">
    <div class="ui-flex ui-flex-pack-center ui-txt-highlight">商品详情</div>
    <span>文字部分</span>

    <div><img src="http://placeholder.qiniudn.com/640x200" width="100%"></div>
</div>

<div class="ui-footer ui-footer-stable ui-btn-group ui-border-t" style="height: 50px">
    <button class="ui-btn ui-btn-primary" onclick="showdia()">
        申请
    </button>
    <button class="ui-btn ui-btn-danger" onclick="showdia_c()">
        收藏
    </button>
</div>

<div class="ui-dialog" id="dialog">
    <div class="ui-dialog-cnt">
        <header class="ui-dialog-hd ui-border-b">
            <h3>完成申请</h3>
            <i class="ui-dialog-close" data-role="button" onclick="closedia()"></i>
        </header>
        <form action="/shop/create-order" style="padding: 5px" method="post">
            <input type="hidden" name="product_id" value="{{$product->id}}">

            <div class="ui-form-item ui-form-item-pure ui-border-radius ui-form dialog-top">
                <input type="text" placeholder="请输入姓名" name="name">
            </div>
            <div class="ui-form-item ui-form-item-pure ui-border-radius ui-form dialog-top">
                <input type="text" placeholder="请输入联系电话" name="phone">
            </div>
            <div class="ui-form-item ui-form-item-textarea ui-border-radius dialog-top ui-form">

                <textarea placeholder="备注" style="padding-left: 0px"></textarea>
            </div>

            <div class="ui-dialog-ft">
                <button type="button" data-role="button" onclick="closedia()">取消</button>
                <button type="submit" data-role="button">申请</button>
            </div>
        </form>
    </div>
</div>
<div class="ui-dialog" id="dialog_collect">
    <div class="ui-dialog-cnt">
        <header class="ui-dialog-hd ui-border-b">
            <h3>收藏宝贝</h3>
            <i class="ui-dialog-close" data-role="button" onclick="closedia_c()"></i>
        </header>
        <div class="ui-dialog-bd">
            <h4><i class="ui-icon-success ui-txt-warning"></i>恭喜你，收藏成功！</h4>
        </div>
        <div class="ui-dialog-ft">
            <button type="button" data-role="button" onclick="closedia_c()">确定</button>
        </div>
    </div>
</div>

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
            console.log(curPage);
        });

    })();

    function showdia() {
        document.getElementById("dialog").style.display = "-webkit-box";
    }
    function closedia() {
        document.getElementById("dialog").style.display = "none";
    }
    function showdia_c() {
        document.getElementById("dialog_collect").style.display = "-webkit-box";
    }
    function closedia_c() {
        document.getElementById("dialog_collect").style.display = "none";
    }
</script>
</body>
</html>