<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title>注册帐号</title>
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('/css/frozen.css')}}">
</head>
<body>
<div class="ui-container signup-top signup-padding">
    <div class="ui-border-radius signup-padding signup-shadow">
        <form action="{{url('/register/store')}}" method="POST" id="signup-form">
            <div class="ui-form-item ui-form-item-pure ui-border-radius ui-form">
                <input type="text" placeholder="请输入手机号码" id="phone" name="phone">
                <a href="#" class="ui-icon-close" onclick="clean_phone()"></a>
            </div>
            <h6 class="ui-txt-warning" id="label_phone"></h6>
            <div class="ui-form-item ui-form-item-r ui-border-radius ui-top ui-form">
                <input type="text" placeholder="请输入验证码" id="code" name="code">
                <!-- 若按钮不可点击则添加 disabled 类 -->
                <button type="button" class="ui-border-l" onclick="sendMessage()" id="code_bt">获取验证码</button>
                <a href="#" class="ui-icon-close" onclick="clean_code()"></a>
            </div>
            <h6 class="ui-txt-warning" id="label_code"></h6>
            <p class="ui-flex ui-flex-pack-center ui-top">
                <label class="ui-checkbox-s">
                    <input type="checkbox" name="checkbox" checked>
                </label>
                <span class="ui-txt-sub">我已阅读并同意<a>《药械通用户须知》</a></span>
            </p>
            <h5 style="text-align: center"></h5>

            <div class="ui-btn-wrap">
                <button class="ui-btn-lg ui-btn-primary">
                    注册
                </button>
            </div>
        </form>
    </div>
</div>
<script src="http://cdn.bootcss.com/bootswatch/2.0.2/js/jquery.js"></script>
<script src="{{asset('/js/frozen.js')}}"></script>
<script src="{{asset('/js/zepto.min.js')}}"></script>
<script type="text/javascript" language="javascript">
    function clean_phone() {
        document.getElementById("phone").value = "";
    }
    function clean_code() {
        document.getElementById("code").value = "";
    }

    function validateMobile() {
        var mobile = document.getElementById('phone').value;
        if (mobile.length == 0) {
            document.getElementById('label_phone').innerText = '请输入手机号码！';
            document.getElementById('phone').focus();
        }
        if (mobile.length != 11) {
            document.getElementById('label_phone').innerText = '请输入有效的手机号码！';
            document.getElementById('phone').focus();
            return false;
        }

        var myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
        if (!myreg.test(mobile)) {
            document.getElementById('label_phone').innerText = '请输入有效的手机号码！';
            document.getElementById('phone').focus();
            return false;
        }

        return true;

    }

    function validateAll() {
        if (!validateMobile()) {
            return false;
        }

        if (code.length == 0) {
            document.getElementById('label_code').innerText = '请输入验证码！';
            document.getElementById('code').focus();
            return false;
        }

        if (code.length != 6) {
            document.getElementById('label_code').innerText = '请输入有效的验证码！';
            document.getElementById('code').focus();
            return false;
        }

        if (isNaN(code)) {
            document.getElementById('label_code').innerText = '请输入有效的验证码！';
            document.getElementById('code').focus();
            return false;
        }

        return true;
    }

    function sendMessage() {
        if (validateMobile()) {
            $('#code_bt').attr("disabled", "disabled");
            var mobile = document.getElementById('phone').value;
            $.get(
                    '/register/send-message?phone=' + mobile,
                    function (json) {
                        if (json.success) {
                            document.getElementById('label_phone').innerText = '';
                        } else {
                            $('#code_bt').removeAttr("disabled");
                        }
                    },
                    "json"
            );

            var i = 61;
            timer();
            function timer() {
                i--;
                $('#code_bt').text(i + '秒后重发');
                if (i == 0) {
                    clearTimeout(timer);
                    $('#code_bt').removeAttr("disabled");
                    $('#code_bt').text('重新发送');
                } else {
                    setTimeout(timer, 1000);
                }
            }
        }
    }
</script>
</body>
</html>
