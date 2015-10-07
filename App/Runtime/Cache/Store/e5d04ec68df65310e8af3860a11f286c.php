<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>绿叶软件科技 & blank_page</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" type="text/css" href="/Public/Store/Css/frame/css/cloud-admin.css" >
<link rel="stylesheet" type="text/css"  href="/Public/Store/Css/frame/css/default.css" id="skin-switcher" >
<link rel="stylesheet" type="text/css"  href="/Public/Store/Css/frame/css/responsive.css" >
<link href="/Public/Store/Css/frame/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/Public/Store/Css/frame/css/daterangepicker-bs3.css" />
<script type="text/javascript" src="/Public/Store/JS/frame/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/Public/Store/JS/frame/js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="/Public/Store/JS/frame/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/Store/JS/frame/js/moment.min.js"></script>
<script type="text/javascript" src="/Public/Store/JS/frame/js/daterangepicker.min.js"></script>
<script type="text/javascript" src="/Public/Store/JS/frame/js/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/Public/Store/JS/frame/js/slimScrollHorizontal.min.js"></script>
<script type="text/javascript" src="/Public/Store/JS/frame/js/jquery.cookie.min.js"></script>
<script type="text/javascript" src="/Public/Store/JS/frame/js/script.js"></script>
<script>
    jQuery(document).ready(function () {
        App.setPage("widgets_box");  //Set current page
        App.init(); //Initialise plugins and elements
    });
</script>
        <link rel="stylesheet" href="css/common.css" type="text/css" />
</head>
<body>
 <header class="navbar clearfix" id="header">
    <div class="container">
        <div class="navbar-brand">
            <a href="javascript:void(0)">
                <img src="<?php echo ($_SESSION["logo"]); ?>" alt="Cloud Admin Logo" class="img-responsive" height="30" width="120" />
            </a>
            <div class="visible-xs">
                <a href="#" class="team-status-toggle switcher btn dropdown-toggle">
                    <i class="fa fa-users"></i>
                </a>
            </div>
            <div id="sidebar-collapse" class="sidebar-collapse btn">
                <i class="fa fa-bars" 
                   data-icon1="fa fa-bars" 
                   data-icon2="fa fa-bars" ></i>
            </div>
        </div>
        <ul class="nav navbar-nav pull-left hidden-xs" id="navbar-left">
            <li class="dropdown">
                <a href="i" class="team-status-toggle dropdown-toggle tip-bottom" data-toggle="tooltip" title="">
                    <i class="fa fa-users"></i>
                    <span class="name">子公众号名字</span>

                </a>
            </li>					
        </ul> 
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown user" id="header-user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img alt="" src="<?php echo ($_SESSION["logo"]); ?>" />
                    <span class="username"><?php echo ($_SESSION["user"]); ?></span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo U('Store/Index/logout');?>"><i class="fa fa-power-off"></i> 退出</a></li>
                </ul>
            </li>
        </ul>
    </div>
</header>
<section id="page">
    <div id="sidebar" class="sidebar">
    <div class="sidebar-menu nav-collapse">
        <div class="divide-20"></div>
        <ul>
            <?php if(is_array($cat)): $i = 0; $__LIST__ = $cat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$catItem): $mod = ($i % 2 );++$i;?><li class="has-sub">
                    <a <?php if($catItem['url'] != '' ): ?>href="<?php echo ($catItem["url"]); ?>" <?php else: ?> href="javascript:void(0);"<?php endif; ?>class="">
                        <i class="fa fa-bookmark-o fa-fw"></i> <span class="menu-text"><?php echo ($catItem["name"]); ?></span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <?php if(is_array($catItem["next"])): $i = 0; $__LIST__ = $catItem["next"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$catlog): $mod = ($i % 2 );++$i;?><li class="has-sub-sub">
                                <a href="<?php echo ($catlog["url"]); ?>" class=""><span class="sub-menu-text"><?php echo ($catlog["name"]); ?></span>
                                    <span class="arrow"></span>
                                </a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div id="content" class="col-lg-12">
                     <div class="row">
    <div class="col-sm-12">
        <div class="page-header">
            <ul class="breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="index.html">公告：</a>
                </li>
            </ul>
        </div>
    </div>
</div>
                    <!-- /PAGE HEADER -->
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- SIMPLE STRIPED -->
                            <div class="row">
                                <div class="col-md-12 ">
                                    <!-- BOX -->
                                    <div class="box border blue">
                                    <div class="box-title">
    <h4><i class="fa fa-table"></i><?php echo ($title); ?></h4>
    <div class="tools">
        <a href="javascript:;" class="collapse">
            <i class="fa fa-chevron-up"></i>
        </a>
        <a href="javascript:;" class="remove">
            <i class="fa fa-times"></i>
        </a>
    </div>
</div>
                                        <!-- 右边内容-->											
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>