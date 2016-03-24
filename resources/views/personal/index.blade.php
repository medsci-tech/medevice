<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>个人信息</title>
    <link rel="stylesheet" href="{{asset('/css/frozen.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
</head>
<body>
<div class="ui-container">
    <ul class="ui-list ui-list-text ui-border-tb ui-top">
        <li class="ui-border-t">
            <h4 class="ui-nowrap">用户名</h4>
            <div class="ui-txt-info">{{$customer->nickname}}</div>
        </li>
        <li class="ui-border-t">
            <h4 class="ui-nowrap">用户类型</h4>
            <div class="ui-txt-info">普通用户</div>
        </li>
    </ul>

    <ul class="ui-list ui-list-text ui-list-link ui-border-tb ui-top">
        <li class="ui-border-t">
            <h4>申请记录</h4>
        </li>
    </ul>

    <ul class="ui-list ui-list-text ui-list-link ui-border-tb ui-top">
        <li class="ui-border-t">
            <h4>我的收藏</h4>
        </li>
    </ul>

    <ul class="ui-list ui-list-text ui-list-link ui-border-tb ui-top">
        <li class="ui-border-t">
            <h4>关注厂家</h4>
        </li>
    </ul>

    <ul class="ui-list ui-list-text ui-list-link ui-border-tb ui-top">
        <li class="ui-border-t">
            <h4>联系客服</h4>
        </li>
    </ul>
</div>

</body>
</html>