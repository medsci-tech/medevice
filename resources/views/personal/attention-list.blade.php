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
                <h5 class="order_cancel">
                    <button class="ui-btn ui-btn-danger" onclick="unfollow({{$attention->supplier->id}})">取消关注</button>
                </h5>
            </li>
            <li class="ui-border-t">
                <div class="ui-list-thumb">
                    <span style="background-image:url(http://placeholder.qiniudn.com/100x100)"></span>
                </div>
                <a href="/supplier/detail?id={{$attention->supplier->id}}">
                    <div class="ui-list-info">
                        <h5 class="ui-nowrap">{{$attention->supplier->supplier_desc}}</h5>

                        <p class="ui-nowrap ui-txt-info">时间：{{$attention->created_at}}</p>
                    </div>
                </a>
            </li>
        </ul>
    @endforeach
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

    function unfollow(supplier_id) {
        $.ajax({
            url: '/supplier/unfollow',
            data: {
                supplier_id: supplier_id
            },
            type: "get",
            dataType: "json",
            success: function (json) {
                if (json.success) {
                    showDia(true, '取消成功', '已取消关注！');
                } else {
                    showDia(true, '取消失败', '取消关注失败,请重试！');
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