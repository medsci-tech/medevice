<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>供应商详情</title>
    <link rel="stylesheet" href="{{asset('/css/frozen.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
</head>
<body>
<div class="comm-padding">
    <h4>{{$supplier->supplier_name}}</h4>
</div>

<div>
    <ul class="ui-list ui-list-text ui-border-tb ui-txt-sub">
        <li class="ui-border-t">
            <p class="ui-nowrap">xxxx</p>
            <div class="ui-txt-info">xxxx</div>
        </li>
        <li class="ui-border-t">
            <p class="ui-nowrap">xxxx</p>
            <div class="ui-txt-info">xxxx</div>
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
    <div><img src="http://placeholder.qiniudn.com/640x200" width="100%"></div>
    <span>{{$supplier->suppliers_desc}}</span>
</div>

<div class="ui-footer ui-footer-stable ui-btn-group ui-border-t" style="height: 50px">
    <button class="ui-btn ui-btn-primary" onclick="showdia()">
        关注
    </button>
</div>

<div class="ui-dialog" id="dialog">
    <div class="ui-dialog-cnt">
        <header class="ui-dialog-hd ui-border-b">
            <h3>关注供应商</h3>
            <i class="ui-dialog-close" data-role="button" onclick="closedia()"></i>
        </header>
        <div class="ui-dialog-bd">
            <h4><i class="ui-icon-success ui-txt-warning"></i>恭喜你,关注成功！</h4>
        </div>
        <div class="ui-dialog-ft">
            <button type="button" data-role="button" onclick="closedia()">确定</button>
        </div>
    </div>
</div>

<script src="http://cdn.bootcss.com/bootswatch/2.0.2/js/jquery.js"></script>
<script src="{{asset('/js/frozen.js')}}"></script>
<script src="{{asset('/js/zepto.min.js')}}"></script>
<script>
    //对话框
    function showdia() {
        document.getElementById("dialog").style.display = "-webkit-box";
    }
    function closedia() {
        document.getElementById("dialog").style.display = "none";
    }
</script>
</body>
</html>