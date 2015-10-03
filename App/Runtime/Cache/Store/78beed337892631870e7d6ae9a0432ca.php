<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="css/common.css" type="text/css" />
        <title>后台管理系统</title>
    </head>
    <script type="text/javascript" src="http://www.zmnkj.net/admin/js/jquery1.6.js"></script>
    <style>
        #nav ul li{
            float:left; width:87px; height:88px; margin-left:10px; display:inline; padding:0px; text-align:center;}
        .bg_image_onclick{
            background-image:url(images/navbg.png);}
        #nav ul li a{
            float:left; margin:0px; padding:33px 0px 0px 0px; width:87px; text-align:center; color:#fff; display:block; height:55px; background-position:center; background-repeat:no-repeat; font-weight:normal}
        #nav ul li#man_nav_1 a{
            background-image:url(images/lv001.png); background-position:center 10px; background-repeat:no-repeat;}
        #nav ul li#man_nav_2 a{
            background-image:url(images/lv002.png); background-position:center 10px; background-repeat:no-repeat;}
        #nav ul li#man_nav_3 a{
            background-image:url(images/lv003.png); background-position:center 10px; background-repeat:no-repeat;}
        #nav ul li#man_nav_4 a{
            background-image:url(images/lv004.png); background-position:center 10px; background-repeat:no-repeat;}
        #nav ul li#man_nav_5 a{
            background-image:url(images/lv005.png); background-position:center 10px; background-repeat:no-repeat;}
        #nav ul li#man_nav_6 a{
            background-image:url(images/lv006.png); background-position:center 10px; background-repeat:no-repeat;}
        #nav ul li#man_nav_7 a{
            background-image:url(images/lv007.png); background-position:center 10px; background-repeat:no-repeat;}
        #nav ul li#man_nav_8 a{
            background-image:url(images/lv008.png); background-position:center 10px; background-repeat:no-repeat;}
        </style>
        <body>
            <div class="header_content" style="position:fixed; border:none; height:88px;  background-position:top; background-repeat:repeat-x;">
            <div class="right_nav" style="padding-left:0px; height:88px;">
                <img src="images/logo.png" style="float:left; margin-left:10px; display:inline; margin-top:20px;" />
                <div id="nav" style="height:88px;">
                    <ul style="float:left; height:88px;">
                        <li  id="man_nav_1" onclick="list_sub_nav(id, '管理首页')"  class="bg_image_onclick"><a href="javascript:void(0);">管理首页</a></li>
                        <li  id="man_nav_2" onclick="list_sub_nav(id, '系统设置')"  class="bg_image"><a href="javascript:void(0);">系统设置</a></li>
                        <li  id="man_nav_3" onclick="list_sub_nav(id, '用户管理')"  class="bg_image"><a href="javascript:void(0);">用户管理</a></li>
                        <li  id="man_nav_4" onclick="list_sub_nav(id, '产品管理')"  class="bg_image"><a href="javascript:void(0);">产品管理</a></li>
                        <li  id="man_nav_5" onclick="list_sub_nav(id, '订单管理')"  class="bg_image"><a href="javascript:void(0);">订单管理</a></li>
                        <li  id="man_nav_6" onclick="list_sub_nav(id, '其他扩展')"  class="bg_image"><a href="javascript:void(0);">其他扩展</a></li>
                        <li  id="man_nav_7" onclick="list_sub_nav(id, '数据管理')"  class="bg_image"><a href="javascript:void(0);">数据管理</a></li>
                        <li  id="man_nav_8" onclick="list_sub_nav(id, '公众平台')"  class="bg_image"><a href="javascript:void(0);">公众平台</a></li>
                    </ul>
                </div>
            </div>
            <div class="text_right" style="width:230px; padding-right:5px; position:absolute; right:0px; top:22px;">
                <p style="line-height:18px; height:18px; padding:0px; margin:0px; color:#FFF; padding-left:18px">欢迎您，<strong style="color:#FF0000">admin</strong></p>
                <ul class="nav_return"><li><img src="images/return.gif" width="13" height="21" />&nbsp;[ <a href="../m/" target="_blank">前台首页</a> ]&nbsp;[ <a href="./" target="_parent">后台首页</a> ]&nbsp;[ <a href="logout.php" onclick="return confirm('确认退出吗')">退出</a> ]</li>
                </ul>
            </div>
        </div>
        <div id="left_content">
            <div id="main_nav">
                <div id="right_main_nav"></div>
            </div>
        </div>

        <div id="man_zone">
            <table>
                <tr>
                    <th>产品总数：</th>
                    <td><font color="#FF0000"><?php echo ($goodsCount); ?></font>个</td>
                    <th>推荐商品数：</th>
                    <td><font color="#FF0000"><?php echo ($recommendGoodsCount); ?></font>个</td>
                </tr>
                <tr>
                    <th>上架产品数：</th>
                    <td><font color="#FF0000"><?php echo ($onlineGoodsCount); ?></font>个</td>
                    <th>下架产品数：</th>
                    <td><font color="#FF0000"><?php echo ($offlineGoodsCount); ?></font>个</td>
                </tr>
                <tr>
                    <th width="15%">订单数量：</th>
                    <td><font color="#FF0000"><?php echo ($orderCount); ?></font>个</td>
                    <th width="15%">成功订单数量：</th>
                    <td><font color="#FF0000"><?php echo ($successOrderCount); ?></font>个</td>
                </tr>
                <tr>
                    <th width="15%">使用的操作系统：</th>
                    <td><?php echo ($oprationSystem); ?></td>
                    <th width="15%">当前的浏览器：</th>
                    <td><?php echo ($browser); ?></td>
                </tr>
            </table>

        </div>

    </body>
</html>