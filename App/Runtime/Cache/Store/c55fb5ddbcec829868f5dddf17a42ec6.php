<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>绿叶登陆界面</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="/Public/Store/Css/supersized.css">
        <link rel="stylesheet" href="/Public/Store/Css/login.css">
        <link href="/Public/Store/Css/bootstrap.min.css" rel="stylesheet">
        <script src="/Public/Store/JS/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="/Public/Store/JS/jquery.form.js"></script>
        <script type="text/javascript" src="/Public/Store/JS/tooltips.js"></script>
    </head>

    <body youdao="bind">
        <div class="page-container">
            <div class="main_box">
                <div class="mainbg"></div>
                <div class="login_box">
                    <div class="login_logo">
                        <img src="/Public/Store/Image/logo.png" />
                    </div>

                    <div class="login_form">
                        <form action="" id="login_form" method="post">
                            <div class="form-group">
                                <label for="j_username" class="t"> 用户名：</label>
                                <input id="email" value="" name="adminname" type="text" class="form-control x319" placeholder="请输入用户名" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <label for="j_password" class="t">密　码：</label> 
                                <input id="password" value="" name="password" type="password" placeholder="请输入密码" class="password form-control x319 in" />
                            </div>
                            <div class="form-group">
                                <label for="j_captcha" class="t">验证码：</label>
                                <input id="j_captcha" name="vifcode" type="text" class="form-control x164 in" />
                                <div class="yanzheng" id="changeVerify">
                                    <img alt="点击更换" id="verifyImg" title="点击更换" src="<?php echo U('Store/Index/createVerify');?>" />
                                </div>
                            </div>
                            <!--                            <div class="form-group">
                                                            <label class="t"></label>
                                                            <label for="j_remember" class="m">
                                                                <input id="j_remember" type="checkbox" value="true">&nbsp;记住登陆账号!</label>
                                                        </div>-->
                            <div class="xian">
                            </div>
                            <div class="form-group space">
                                <label class="t"></label>　　　
                                <button type="button" id="submit_btn" class="btn btn-primary btn-lg">&nbsp;登&nbsp;录&nbsp; </button>
                                <input type="reset" value=" 重 置 " class="btn btn-default btn-lg" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="bottom">
                    Copyright © 2015 - 2020
                    <a href="http://www.zmnkj.net/admin/login.php#">绿叶科技</a>
                </div>
                </div>
        </div>

        <!-- Javascript -->

        <script src="/Public/Store/JS/supersized.3.2.7.min.js"></script>
        <script src="/Public/Store/JS/supersized-init.js"></script>
        <script src="/Public/Store/JS/scripts.js"></script>
        <script type="text/javascript">
            $(function () {
                $('#submit_btn').click(function () {
                    submit_data(this);
                });

                $('#verifyImg').click(function () {
                    $(this).attr('src', "<?php echo U('Store/Index/createVerify');?>");
                });

                function submit_data(obj) {
                    var name = $('input[name=adminname]').val();
                    var pas = $('input[name=password]').val();
                    var vifcodes = $('input[name=vifcode]').val();
                    if (name == "" || pas == "" || vifcodes == "") {
                        $('.error_msg').html("输入完整信息！");
                        return false;
                    }
                    $(obj).val("Login...");
                    $.post("<?php echo U('Store/Index/userLogin');?>", {action: 'login', adminname: name, password: pas, vifcode: vifcodes}, function (data) {
                        data = eval(data);
                        if (data['error'] != "0") {
                            alert(data['msg']);
                        } else {
                            window.location.href = data['url'];
                            return;
                        }
                    });
                }
            });


        </script>
        <ul id="supersized" class="quality" style="visibility: visible;">
            <li class="slide-0 prevslide"><a target="_blank">
                    <img src="/Public/Store/Image/0.jpg" style="width: 1920px; left: 0px; top: -252.5px; height: 1440px;" />
                </a></li>
            <li class="slide-1 activeslide" style="visibility: visible; opacity: 1;"><a target="_blank">
                    <img src="/Public/Store/Image/1.jpg" style="width: 1920px; height: 1286.4px; left: 0px; top: -175.5px;" />
                </a></li>
            <li class="slide-2" style="visibility: hidden;"><a target="_blank">
                    <img src="/Public/Store/Image/2.jpg" style="width: 1920px; height: 1209.6px; left: 0px; top: -137px;" /></a>
            </li>
            <li class="slide-3"><a target="_blank">
                    <img src="/Public/Store/Image/3.jpg" style="width: 1920px; left: 0px; top: -252.5px; height: 1440px;" /></a>
            </li>
        </ul>
    </body>
</html>