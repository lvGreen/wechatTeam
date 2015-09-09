<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="colorBall">
        <title>双色球</title>
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
        <style>
            $(".bootstrap_fenye a").addClass('btn btn-default btn-xs');
            $(".bootstrap_fenye span").addClass('btn btn-primary btn-xs');
        </style>

        <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
        <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <table class="table table-bordered">
                <tr>
                    <td>期数</td>
                    <td>日期</td>
                    <td>Red1</td>
                    <td>Red2</td>
                    <td>Red3</td>
                    <td>Red4</td>
                    <td>Red5</td>
                    <td>Red6</td>
                    <td>Blue</td>
                </tr>

                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td class="active"><?php echo ($vo["periods"]); ?></td>
                    <td class="warning"><?php echo substr($vo['date'],0,4) . '-' . substr($vo['date'],4,2) . '-' . substr($vo['date'],6,2) ?></td>
                    <td class="danger"><?php echo ($vo["red_ball_one"]); ?></td>
                    <td class="danger"><?php echo ($vo["red_ball_two"]); ?></td>
                    <td class="danger"><?php echo ($vo["red_ball_three"]); ?></td>
                    <td class="danger"><?php echo ($vo["red_ball_four"]); ?></td>
                    <td class="danger"><?php echo ($vo["red_ball_five"]); ?></td>
                    <td class="danger"><?php echo ($vo["red_ball_six"]); ?></td>
                    <td class="info"><?php echo ($vo["blue_ball"]); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        </div>
        <nav style="text-align:center;" >
            <ul class="pagination">

                <?php echo ($page); ?>
            </ul>
        </nav>
    </body>
</html>