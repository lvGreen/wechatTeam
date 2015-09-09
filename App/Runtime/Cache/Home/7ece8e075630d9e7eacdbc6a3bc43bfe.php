<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="colorBall">
        <title>爱奇艺账号</title>
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <style type='text/css'>
            .title{text-align: center;margin: 10px;font-size: 20px;}
        </style>
        <script type="text/javascript" src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class='title'>爱奇艺VIP账号，每小时更新一次</div>
        <div class="container">
            <table class="table table-bordered">
                <tr>
                    <td>内容</td>
                    <td>日期</td>
                </tr>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td class="active"><?php echo ($vo["name_pass"]); ?></td>
                    <td class="active"><?php echo dateformat($vo['add_time']);?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        </div>
        <nav style="text-align:center;">
            <ul class="pagination">
                <?php echo ($page); ?>
            </ul>
        </nav>
    </body>
</html>