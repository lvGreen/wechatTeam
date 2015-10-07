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
                <img src="/Public/Store/Image/frame/images/logo.png" alt="Cloud Admin Logo" class="img-responsive" height="30" width="120">
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
        <div id="search-bar">
            <input class="search" type="text" placeholder="绿叶科技"><i class="fa fa-search search-icon"></i>
        </div>
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
                                                <table cellspacing="2" cellpadding="5" width="100%" class="order_basic">
                                                    <tbody>
                                                        <tr>
                                                            <th align="left">订单详情列表</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <p>基本信息</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <table cellspacing="0" cellpadding="0" width="100%">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="label" width="15%">订单号：</td>
                                                                            <td width="35%"  id='orderSn'><?php echo ($orderDetail["order_sn"]); ?></td>
                                                                            <td class="label" width="15%">订单状态：</td>
                                                                            <td width="35%">
                                                                    <?php if($orderDetail['status'] == '0'): ?>未付款
                                                                        <?php elseif($orderDetail['status'] == '1'): ?>
                                                                        已付款
                                                                        <?php elseif($orderDetail['status'] == '2'): ?>
                                                                        已发货
                                                                        <?php elseif($orderDetail['status'] == '3'): ?>
                                                                        已收货
                                                                        <?php elseif($orderDetail['status'] == '4'): ?>
                                                                        退货中
                                                                        <?php elseif($orderDetail['status'] == '5'): ?>
                                                                        已退货
                                                                        <?php elseif($orderDetail['status'] == '6'): ?>
                                                                        退款中
                                                                        <?php elseif($orderDetail['status'] == '7'): ?>
                                                                        已退款<?php endif; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="label" width="15%">购货人：</td>
                                                            <td width="35%"><?php echo ($orderDetail["ordername"]); ?></td>
                                                            <td class="label" width="15%">下单时间：</td>
                                                            <td width="35%"><?php echo dateformat($orderDetail['add_time']);?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="label" width="15%">支付方式：</td>
                                                            <td width="35%">
                                                    <?php if($orderDetail['pay_type'] == '0' ): ?>微信支付<?php endif; ?>
                                                    </td>
                                                    <td class="label" width="15%">产品总价：</td>
                                                    <td><?php echo ($orderDetail["totalprice"]); ?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>收货人信息</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table cellspacing="0" cellpadding="0" width="100%" class="order_basic">
                                                            <tbody><tr>
                                                                    <td class="label" width="15%">收货人：</td>
                                                                    <td width="35%"><?php echo ($orderDetail["receive_name"]); ?></td>
                                                                    <td class="label" width="15%">物流公司：</td>
                                                                    <td width="35%"><input type='text' name='shippingCompany' value='<?php echo ($orderDetail["shipping_company"]); ?>' /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label" width="15%">收货地址：</td>
                                                                    <td width="35%"><?php echo ($orderDetail["privince"]); echo ($orderDetail["city"]); echo ($orderDetail["town"]); echo ($orderDetail["address"]); ?></td>
                                                                    <td class="label" width="15%">物流单号：</td>
                                                                    <td width="35%"><input type='text' name='shippingOrder' value='<?php echo ($orderDetail["shipping_order"]); ?>' /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label" width="15%">电话|手机：</td>
                                                                    <td width="35%"><?php echo ($orderDetail["phone"]); ?></td>
                                                                    <td class="label" width="15%">邮费：</td>
                                                                    <td width="35%">￥0.00</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>商品信息</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table cellspacing="0" cellpadding="0" width="100%">
                                                            <tbody><tr align="center">
                                                                    <td><strong>商品条形码</strong></td>
                                                                    <td><strong>商品名称[品牌]</strong></td>
                                                                    <td><strong>数量</strong></td>
                                                                    <td><strong>单价</strong></td>
                                                                    <td><strong>金额</strong></td>
                                                                </tr>
                                                            <?php if(is_array($orderDetail["goods"])): $i = 0; $__LIST__ = $orderDetail["goods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr align="center">
                                                                    <td><?php echo ($item["bar_code"]); ?></td>
                                                                    <td><?php echo ($item["title"]); ?></td>
                                                                    <td><?php echo ($item["count"]); ?></td>
                                                                    <td><?php echo ($item["singleprice"]); ?></td>
                                                                    <td>￥<?php echo ($item["total"]); ?></td>
                                                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                                            <tr align="center">
                                                                <td colspan="4" align="right">总价:</td><td>¥<?php echo ($orderDetail["totalprice"]); ?></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>操作信息</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <table cellspacing="0" cellpadding="0" width="100%">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="15%"><strong>当前可执行操作:</strong></td>
                                                                    <td id="get_button">
                                                                <input name='shipping' value="确认发货" class="order_action" type="button" />
                                                                <input name='order'  value="退货" class="order_action" type="button" />
                                                                <input name='money' value="退款" class="order_action" type="button" />
                                                            无
                                                    </td>
                                                </tr>
                                                </tbody>
                                                </table> 
                                                </td>
                                                </tr>
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
    $(function () {
        $("input[name='shipping']").click(function(){
            var orderSn = $('#orderSn').text();
            var shippingCompany = $('input[name=shippingCompany]').val();
            var shippingOrder = $('input[name=shippingOrder]').val();
            $.post('<?php echo U("Store/Order/addShippingInfo");?>', {'orderSn':orderSn, 'shippingCompany':shippingCompany, 'shippingOrder':shippingOrder}, function(data){
                
            });
            alert(orderSn);
        });
    });
</script>
</body>
</html>