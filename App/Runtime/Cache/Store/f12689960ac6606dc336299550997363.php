<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
    <link type="text/css" rel="stylesheet" href="/Public/Store/Css/global.css" media="all" />
    <link type="text/css" rel="stylesheet" href="/Public/Store/Css/style.css" media="all" />
    <link type="text/css" rel="stylesheet" href="/Public/Store/Css/order_remind.css" media="all" />
    <link type="text/css" rel="stylesheet" href="/Public/Store/Css/content.css" media="all" /> 
    <link type="text/css" rel="stylesheet" href="/Public/Store/Css/calendar.css" media="all">
    <script type="text/javascript" src="/Public/Store/JS/calendar.js"></script> 
    <script type="text/javascript" src="/Public/Store/JS/calendar-setup.js"></script> 
    <script type="text/javascript" src="/Public/Store/JS/calendar-zh.js"></script>
</head>
<body>
 <header class="navbar clearfix" id="header">
    <div class="container">
        <div class="navbar-brand">
            <a href="index.html">
                <img src="" alt="Cloud Admin Logo" class="img-responsive" height="30" width="120" />
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
                    <img alt="" src="/Public/Store/Image/frame/images/avatar.jpg" />
                    <span class="username">Admin</span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-user"></i> 我的账户</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i> 账户设置</a></li>
                    <li><a href="#"><i class="fa fa-eye"></i> 个人设置</a></li>
                    <li><a href="login.html"><i class="fa fa-power-off"></i> 退出</a></li>
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
                    <a <?php if($catItem["url"] == '' ): ?>href="javascript:;" <?php else: ?> href="<?php echo ($catItem["url"]); ?>"<?php endif; ?>class="">
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
                                        <div id="mainss" class="main" style="height: 969px; padding-top: 1px;">
                                            <div class="contentbox">
                                                <table cellspacing="2" cellpadding="5" width="100%">
                                                    <tbody>
                                                        <form action="index.php?m=Store&c=Order&a=orderList" method='post' >
                                                        <tr>
                                                            <th colspan="7" align="left">订单列表&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                选择时间：<input type="text" id="EntTime1" name="EntTime1" onclick="return showCalendar(&#39;EntTime1&#39;, &#39;y-mm-dd&#39;);" />
                                                                至
                                                                <input type="text" id="EntTime2" name="EntTime2" onclick="return showCalendar(&#39;EntTime2&#39;, &#39;y-mm-dd&#39;);" />	
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="7" align="left">
                                                                <img src="/Public/Store/Image/icon_search.gif" alt="SEARCH" width="26" border="0" height="22" align="absmiddle">
                                                                订单号<input name="order_sn" size="15" type="text" value="" />
                                                                收货人<input name="consignee" size="15" type="text" value="" />
                                                                订单状态 
                                                                <select name="status">
                                                                    <option value="-1">请选择</option>
                                                                    <option value="0">待付款</option>
                                                                    <option value="1">已付款</option>
                                                                    <option value="2">已发货</option>
                                                                    <option value="3">已收货</option>
                                                                    <option value="4">退货中</option>
                                                                    <option value="5">已退货</option>
                                                                    <option value="6">退款中</option>
                                                                    <option value="7">已退款</option>
                                                                </select>
                                                                <input value=" 搜索 " class="order_search" type="submit" />
                                                            </th>
                                                        </tr>
                                                        </form>
                                                        <tr>
                                                            <th>订单号</th>
                                                            <th>下单时间</th>
                                                            <th>收货人</th>
                                                            <th>总金额</th>
                                                            <th>订单状态</th>
                                                            <th>操作</th>
                                                        </tr>
                                                    <?php if(is_array($orderList)): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                                                            <td><?php echo ($item["order_sn"]); ?></td>
                                                            <td><?php echo dateformat($item['add_time']);?></td>
                                                            <td><?php echo ($item["receive_name"]); ?></td>
                                                            <td><?php echo ($item["receive_name"]); ?></td>
                                                            <td>
                                                        <?php if($item['status'] == '0'): ?>未付款
                                                            <?php elseif($item['status'] == '1'): ?>
                                                            已付款
                                                            <?php elseif($item['status'] == '2'): ?>
                                                            已发货
                                                            <?php elseif($item['status'] == '3'): ?>
                                                            已收货
                                                            <?php elseif($item['status'] == '4'): ?>
                                                            退货中
                                                            <?php elseif($item['status'] == '5'): ?>
                                                            已退货
                                                            <?php elseif($item['status'] == '6'): ?>
                                                            退款中
                                                            <?php elseif($item['status'] == '7'): ?>
                                                            已退款<?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo U('Store/Order/orderDetail', array('order'=>$item['order_sn']));?>" title="编辑">
                                                                <img src="/Public/Store/Image/icon_view.gif" title="编辑" /></a>&nbsp;
                                                        </td>
                                                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </tbody>
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
    </div>
</section>
<script type='text/javascript'>
</script>
</body>
</html>