<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="colorBall">
        <title>二维码名片</title>
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/Public/Js/jquery-1.11.3.min.js"></script>
        <style>
            #data input{margin-top: 10px;}
            #commit{margin-top: 10px;}
        </style>
    </head>

    <body>
        <div class="container">
            <form id="data" action="<?php echo U('Home/Vcard/createVcard');?>" method="post" enctype='multipart/form-data'>
                ＊姓名：<input type="text" name="userName" value="" placeholder="请填写您的姓名" /><br />
                ＊手机：<input type="text" name="phone" value="" placeholder="请填写您的手机" /><br />
                地址：<input type="text" name="company" value="" placeholder="请填写您的公司地址" /><br />
                职位：<input type="text" name="option" value="" placeholder="请填写您的职位" /><br />
                邮箱：<input type="text" name="email" value="" placeholder="请填写您的常用邮箱" /><br />
                备注：<input type="text" name="note" value="" placeholder="请填写备注信息" /><br />
                背景图片：<input type="file" accept="image/*" name="bgPhoto" />
                <button id="commit">提交</button>
            </form>
        </div>
        <script type="text/javascript">
        </script>
    </body>
</html>