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
        <form action="{{url('/register/store')}}" method="POST" id="signup-form" id="signup-form">
            <div class="ui-form-item ui-form-item-pure ui-border-radius ui-form">
                <input type="text" placeholder="请输入手机号码" id="phone" name="phone"
                       value="{{ isset($input) ? $input['phone'] : '' }}">
                <a href="#" class="ui-icon-close" onclick="clean('phone')"></a>
            </div>
            <h6 class="ui-txt-warning" id="label_phone">{{ isset($errors) ?  $errors->first('phone') : '' }}</h6>

            <div class="ui-form-item ui-form-item-r ui-border-radius ui-top ui-form">
                <input type="text" placeholder="请输入验证码" id="code" name="code"
                       value="{{ isset($input) ? $input['code'] : '' }}">
                <button type="button" class="ui-border-l" onclick="sendMessage()" id="code_bt">获取验证码</button>
                <a href="#" class="ui-icon-close" onclick="clean('code')"></a>
            </div>
            <h6 class="ui-txt-warning" id="label_code">{{ isset($errors) ?  $errors->first('code') : '' }}</h6>

            <div class="ui-form-item ui-border-radius ui-top ui-form">
                <label class="ui-txt-info">用户类型</label>

                <div class="ui-select">
                    <select class="ui-txt-info" name="customer_type" id="customer_type">
                        <option value="1">个人用户</option>
                        <option value="2">企业用户</option>
                    </select>
                </div>
            </div>
            <h6 class="ui-txt-warning"
                id="label_customer_type">{{ isset($errors) ?  $errors->first('customer_type') : '' }}</h6>

            <div class="ui-form-item ui-form-item-pure ui-border-radius ui-form ui-top" style="display: none"
                 id="company_div">
                <input type="text" placeholder="请输入公司名称" id="company" name="company"
                       value="个人用户">
                <a href="#" class="ui-icon-close" onclick="clean('company')"></a>
            </div>
            <h6 class="ui-txt-warning" id="label_company">{{ isset($errors) ?  $errors->first('company') : '' }}</h6>

            <p class="ui-flex ui-flex-pack-center ui-top">
                <label class="ui-checkbox-s">
                    <input type="checkbox" name="checkbox" checked>
                </label>
                <span class="ui-txt-sub">我已阅读并同意<a>《药械通用户须知》</a></span>
            </p>
            <h5 style="text-align: center"></h5>

            <div class="ui-btn-wrap">
                <button class="ui-btn-lg ui-btn-primary" type="submit">
                    注册
                </button>
            </div>
        </form>
    </div>
</div>
<script src="http://cdn.bootcss.com/bootswatch/2.0.2/js/jquery.js"></script>
<script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
<script type="text/javascript" language="javascript">
    function clean(id) {
        document.getElementById(id).value = "";
    }

    $().ready(function () {
        $("#signup-form").validate({
            rules: {
                phone: "required",
                code: {
                    required: true,
                    rangelength: [6, 6]
                },
                company: "required"
            },
            messages: {
                phone: '手机号不能为空',
                code: {
                    required: "验证码不能为空",
                    rangelength: "验证码格式不正确"
                },
                company: '公司名称不能为空'
            },
            errorPlacement:function(error,element) {
                if (element.attr("name") == "phone") {
                    $("#label_phone").empty();
                    $("#label_phone").append(error.html())
                }

                if(element.attr("name") == "code") {
                    $("#label_code").empty();
                    $("#label_code").append(error.html());
                }

                if (element.attr("name") == "company") {
                    $("#label_company").empty();
                    $("#label_company").append(error.html());
                }
            }
        });
    });

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

    $(document).ready(function () {
        $('#customer_type').change(function () {
            if ($('#customer_type').val() == 2) {
                clean('company');
                document.getElementById("company_div").style.display = "block";
            } else {
                document.getElementById("company").value = "个人用户";
                document.getElementById("company_div").style.display = "none";
            }
        })
    })
</script>
</body>
</html>
