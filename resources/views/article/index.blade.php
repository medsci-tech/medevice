<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>最新资讯</title>
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('/css/frozen.css')}}">
</head>
<body>
<div class="ui-slider" style="padding-top: 55%">
    <ul class="ui-slider-content" style="width: 300%">
        <li><span style="background-image:url(http://placeholder.qiniudn.com/640x200)"></span></li>
        <li><span style="background-image:url(http://placeholder.qiniudn.com/640x200)"></span></li>
        <li><span style="background-image:url(http://placeholder.qiniudn.com/640x200)"></span></li>
    </ul>
</div>

<div class="ui-tab">
    <ul class="ui-tab-nav ui-border-b">
        <li class="current">推荐图文</li>
        <li>热门文章</li>
    </ul>
    <ul class="ui-tab-content" style="width:300%">
        <li class="current">
            <ul class="ui-list ui-border-tb">
                <li class="ui-border-t">
                    <div class="ui-list-img">
                        <span style="background-image:url(http://placeholder.qiniudn.com/200x136)"></span>
                    </div>
                    <div class="ui-list-info">
                        <h4 class="ui-nowrap">这是标题，这是标题这是标题这是标题</h4>
                        <p class="ui-nowrap-multi">这是内容这是内容这是内容这是内容这是内容这是内容这是内容</p>
                    </div>
                </li>
                <li class="ui-border-t">
                    <div class="ui-list-img">
                        <span style="background-image:url(http://placeholder.qiniudn.com/200x136)"></span>
                    </div>
                    <div class="ui-list-info">
                        <h4 class="ui-nowrap">这是标题，这是标题这是标题这是标题</h4>
                        <p class="ui-nowrap-multi">这是内容这是内容这是内容这是内容这是内容这是内容这是内容</p>
                    </div>
                </li>
            </ul>
        </li>
        <li>
            <ul class="ui-list ui-border-tb">
                <li class="ui-border-t">
                    <div class="ui-list-img">
                        <span style="background-image:url(http://placeholder.qiniudn.com/200x136)"></span>
                    </div>
                    <div class="ui-list-info">
                        <h4 class="ui-nowrap">这是标题，这是标题这是标题这是标题</h4>
                        <p class="ui-nowrap-multi">这是内容这是内容这是内容这是内容这是内容这是内容这是内容</p>
                    </div>
                </li>
                <li class="ui-border-t">
                    <div class="ui-list-img">
                        <span style="background-image:url(http://placeholder.qiniudn.com/200x136)"></span>
                    </div>
                    <div class="ui-list-info">
                        <h4 class="ui-nowrap">这是标题，这是标题这是标题这是标题</h4>
                        <p class="ui-nowrap-multi">这是内容这是内容这是内容这是内容这是内容这是内容这是内容</p>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>

<script src="{{asset('/js/zepto.min.js')}}"></script>
<script src="{{asset('/js/frozen.js')}}"></script>
<script>
    (function(){

        var slider = new fz.Scroll('.ui-slider', {
            role: 'slider',
            indicator: true,
            autoplay: true,
            interval: 3000
        });
    })();
    (function() {

        var tab = new fz.Scroll('.ui-tab', {
            role: 'tab',
            autoplay: false,
        });
    })();
</script>
</body>
</html>