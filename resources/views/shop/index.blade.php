<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>产品展示</title>
    <link rel="stylesheet" href="{{asset('/css/frozen.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
</head>
<body>
<div>
    <div class="lfloat ui-col ui-col-25">
        <ul id="nav">
            @foreach($categories as $cat)
                <li class="aa" id="tb_{{$cat->id}}" onClick="hoverli({{$cat->id}});">{{$cat->type_ch}}</li>
            @endforeach
        </ul>
    </div>
    <div class="rfloat ui-col ui-col-75" id="products-list">
        @foreach($categories as $cat)
            @if($cat->id == $categories[0]->id)
                <ul class="ui-list ui-border-tb dis" id="tbc_{{$cat->id}}">
                    @foreach($products as $product)
                        <li class="ui-border-t">
                            <div class="ui-list-thumb">
                                <span style="background-image:url(http://placeholder.qiniudn.com/100x100)"></span>
                            </div>
                            <div class="ui-list-info">
                                <a href="/shop/detail?id={{$product->id}}" class="ui-txt-default">
                                    <h4 class="ui-nowrap">{{$product->name}}</h4>
                                    <p class="ui-nowrap">{{$product->introduction}}</p>
                                </a>
                            </div>

                        </li>
                    @endforeach
                </ul>
            @else
                <ul class="undis" id="tbc_{{$cat->id}}"></ul>
            @endif
        @endforeach
    </div>
</div>
<script src="http://cdn.bootcss.com/bootswatch/2.0.2/js/jquery.js"></script>
<script type="text/javascript" language="javascript">
    function hoverli(id) {
        var x = document.getElementById("nav").getElementsByTagName("li");
        for (var i = 1; i <= x.length; i++) {
            document.getElementById('tb_' + i).style.background = '#f8f8f8';
            document.getElementById('tb_' + i).style.color = '#000000';
            document.getElementById('tbc_' + i).className = 'undis';
        }
        $.ajax({
            url: '/shop/get-products-by-cat-id',
            data: {
                cat_id: id
            },
            type: "get",
            dataType: "json",
            success: function (json) {
                strHtml = '';
                $(json.products).each(function () {
                    strHtml += '<li class="ui-border-t"><div class="ui-list-thumb"><span style="background-image:url(http://placeholder.qiniudn.com/100x100)"></span></div><div class="ui-list-info"><a href="/shop/product-detail?id='+this.id+'" class="ui-txt-default"><h4 class="ui-nowrap">'+this.name+'</h4><p class="ui-nowrap">'+this.introduction+'</p></a></div></li>';
                });
                $("#tbc_" + id).html(strHtml);
            },
            error: function (xhr, status, errorThrown) {
                console.log("Sorry, there was a problem!");
            }
        });
        document.getElementById('tbc_' + id).className = 'ui-list ui-border-tb dis';
        document.getElementById('tb_' + id).style.background = '#00a5e0';
        document.getElementById('tb_' + id).style.color = 'white';
    }
</script>
</body>
</html>
