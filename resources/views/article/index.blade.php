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
<div class="ui-slider">
    <ul class="ui-slider-content" style="width: 300%">
        <li><span style="background-image:url(http://7xso2p.com1.z0.glb.clouddn.com/xwzx03.png)"></span></li>
        <li><span style="background-image:url(http://7xso2p.com1.z0.glb.clouddn.com/xwzx02.png)"></span></li>
        <li><span style="background-image:url(http://7xso2p.com1.z0.glb.clouddn.com/xwzx01.png)"></span></li>
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
                        <span style="background-image:url(http://7xso2p.com1.z0.glb.clouddn.com/1.png)"></span>
                    </div>
                    <div class="ui-list-info">
                        <a href="http://mp.weixin.qq.com/s?__biz=MzAwMTc3MDY4NA==&mid=404288131&idx=1&sn=4bd2dac348d7122e9d78e8e012c6b156#rd">
                        <h4 class="ui-nowrap">刺活检，精准判断肺癌分型</h4>

                        <p class="ui-nowrap-multi">
                            导读：肺的穿刺活检是在一定的动态规律下完成的，不像做骨穿刺一样把骨头固定在扫描床上就可以非常精准地完成。我们经常打一个比喻：穿刺活检就像射击打靶一样，但肺不是固定的靶而是移动的靶。奥运会移动靶射击项目的冠军经常易主，就是因为打移动靶的变数非常大，肺穿刺活检的难度就在这里。——柳晨</p>
                        </a>
                    </div>
                </li>
                <li class="ui-border-t">
                    <div class="ui-list-img">
                        <span style="background-image:url(http://7xso2p.com1.z0.glb.clouddn.com/2.png)"></span>
                    </div>
                    <div class="ui-list-info">
                        <a href="http://mp.weixin.qq.com/s?__biz=MzAwMTc3MDY4NA==&mid=404288805&idx=1&sn=f8660c50eec380506ee8ea2fdfe6c6c7#rd">
                        <h4 class="ui-nowrap">癌症活检并不会促进癌症的扩散</h4>

                        <p class="ui-nowrap-multi">
                            近日，来自梅奥诊所的研究人员通过对超过2000名胰腺癌病人进行研究表示，人们不必担心进行癌症的活组织检查会促进癌症扩散，相关文章刊登于国际杂志Gut上，该研究表明，相比未活组织检查的病人而言，进行活组织检查的患者或许会有一个较好的预后及较长的生存期。</p>
                            `</a>
                    </div>
                </li>
            </ul>
        </li>
        <li>
            <ul class="ui-list ui-border-tb">
                <li class="ui-border-t">
                    <div class="ui-list-img">
                        <span style="background-image:url(http://7xso2p.com1.z0.glb.clouddn.com/3.png)"></span>
                    </div>
                    <div class="ui-list-info">
                        <a href="http://mp.weixin.qq.com/s?__biz=MzAwMTc3MDY4NA==&mid=404288858&idx=1&sn=2302c099b0f7cd260c62e75e565dc446#rd">
                            <h4 class="ui-nowrap">体外诊断市场剧增,但龙头业绩下滑明</h4>

                            <p class="ui-nowrap-multi">
                                近年来，随着中国医疗不断的改革，人们对自身健康愈加关注都驱动了体外诊断试剂市场的需求，加上国家政策的大力扶持，目前，国内体外诊断行业正逐步崛起，且来看看2015年度国内主要IVD上市公司的业绩。</p>
                        </a>
                    </div>
                </li>
                <li class="ui-border-t">
                    <div class="ui-list-img">
                        <span style="background-image:url(http://7xso2p.com1.z0.glb.clouddn.com/4.png)"></span>
                    </div>
                    <div class="ui-list-info">
                        <a href="http://mp.weixin.qq.com/s?__biz=MzAwMTc3MDY4NA==&mid=404288891&idx=1&sn=6f82b364a0715cd7c4959f40a1e065fe#rd">
                        <h4 class="ui-nowrap">Gut：胰腺癌组织活检未增加肿瘤扩散风险</h4>

                        <p class="ui-nowrap-multi">
                            今日，美国梅奥诊所的研究人员在2000多名患者中进行的一项研究，推翻了“癌组织活检会引起癌症扩散”的言论。2015年1月9日在英国官方最著名的消化杂志《Gut》发表的一项研究表明，与那些没有接受活检的胰腺癌患者相比，接受活组织检查的患者有更好的预后结果和更长的生存期。</p>
                        </a>
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