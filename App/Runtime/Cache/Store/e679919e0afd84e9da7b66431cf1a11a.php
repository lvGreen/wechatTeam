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
                                                <form action="<?php echo U('Store/Distribution/addDistributionConfig');?>" method="post" enctype="multipart/form-data" name="theForm" id="theForm">
                                                    <div class="menu_content">
                                                        <table cellspacing="2" cellpadding="5" width="100%">
                                                            <tbody><tr>
                                                                    <td class="label" width="15%">消费送积分：<br>[购买者]&nbsp;&nbsp;</td>
                                                                    <td>
                                                                        消费1元获得<input name="pointnum" value="1" readonly size="10" type="text">&nbsp;<font color="#FF0000">*</font>&nbsp;<input name="pointnum_ag" value="<?php echo ($distributionInfo["customer_point"]); ?>" size="10" type="text">&nbsp;积分
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label" width="15%">消费送积分：<br>[一级分销]&nbsp;&nbsp;</td>
                                                                    <td>
                                                                        消费1元获得<input name="tjpointnum" value="1" readonly size="10" type="text">&nbsp;<font color="#FF0000">*</font>&nbsp;<input name="tjpointnum_ag" value="<?php echo ($distributionInfo["point"]); ?>" size="10" type="text">&nbsp;积分
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label" width="15%">消费送积分：<br>[二级分销]&nbsp;&nbsp;</td>
                                                                    <td>
                                                                        消费1元获得<input name="tjpointnum2" value="1" readonly size="10" type="text">&nbsp;<font color="#FF0000">*</font>&nbsp;<input name="tjpointnum_ag2" value="<?php echo ($distributionInfo["two_point"]); ?>" size="10" type="text">&nbsp;积分
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label" width="15%">消费送积分：<br>[三级分销]&nbsp;&nbsp;</td>
                                                                    <td>
                                                                        消费1元获得<input name="tjpointnum3" value="1" readonly size="10" type="text">&nbsp;<font color="#FF0000">*</font>&nbsp;<input name="tjpointnum_ag3" value="<?php echo ($distributionInfo["three_point"]); ?>" size="10" type="text">&nbsp;积分
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">关注送积分：</td>
                                                                    <td>
                                                                        关注所得<input name="ticheng360_2" value="<?php echo ($distributionInfo["concern_point"]); ?>" size="10" type="text">积分
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">数量享折扣：</td>
                                                                    <td>
                                                                        数量：<input name="discountNumber" value="<?php echo ($distributionInfo["discount_number"]); ?>" size="10" type="text" />
                                                                        折扣：<input name="address2off" value="<?php echo ($distributionInfo["discount"]); ?>" size="10" type="text" />%。【相对关注后的价格再折扣】<br><br>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">关注享折扣：</td>
                                                                    <td>
                                                                        关注后享<input name="guanzhuoff" value="<?php echo ($distributionInfo["concern_discount"]); ?>" size="6" type="text">%
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label" width="15%">最小提款额度：</td>
                                                                    <td>
                                                                        <input name="tixian" value="<?php echo ($distributionInfo["lower_commission_money"]); ?>" size="10" type="text">元
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">一级分销提成点：</td>
                                                                    <td>
                                                                        <input name="ticheng180_1" value="<?php echo ($distributionInfo["commission"]); ?>" size="10" type="text">%<br>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">二级分销提成点：</td>
                                                                    <td>
                                                                        <input name="ticheng180_h1_1" value="<?php echo ($distributionInfo["two_commission"]); ?>" size="10" type="text">%<br>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">二级分销提成点：</td>
                                                                    <td>
                                                                        <input name="ticheng180_h2_1" value="<?php echo ($distributionInfo["three_commission"]); ?>" size="10" type="text">%<br>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">开通分销设置：</td>
                                                                    <td>
                                                                        <label>&nbsp;购买自动开通&nbsp;
                                                                        </label>
                                                                        【最小购买金额<input name="openfx_minmoney" value="<?php echo ($distributionInfo["lower_money"]); ?>" size="10" type="text" />元】
                                                                        <em style="color:#FF0000">如果设置了级别升级，这里的优先级低</em>&nbsp;&nbsp;
                                                                        <label>&nbsp;人数下限&nbsp;
                                                                        </label>【下限<input name="lower_Man" value="<?php echo ($distributionInfo["lower_man"]); ?>" size="10" type="text">人】
                                                                        <em style="color:#FF0000">这里是或的关系</em>&nbsp;&nbsp;
                                                                        <label><input type="checkbox" name="openfxauto" value="1" <?php if($distributionInfo['default_concern'] == '1' ): ?>checked="checked"<?php endif; ?>  />&nbsp;默认关注后自动开通&nbsp;&nbsp;</label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">二级分销设置：</td>
                                                                    <td>
                                                                        <label>&nbsp;购买自动开通&nbsp;
                                                                        </label>
                                                                        【最小购买金额<input name="openfx_minmoneyTwo" value="<?php echo ($distributionInfo['lower_money_two']); ?>" size="10" type="text" />元】
                                                                        <em style="color:#FF0000">如果设置了级别升级，这里的优先级低</em>&nbsp;&nbsp;
                                                                        <label>&nbsp;人数下限&nbsp;
                                                                        </label>【下限<input name="lower_ManTwo" value="<?php echo ($distributionInfo['lower_man_two']); ?>" size="10" type="text">人】
                                                                        <label><input type="checkbox" name="bothTwo" value="1" <?php if($distributionInfo['both_two'] == '1' ): ?>checked="checked"<?php endif; ?> />&nbsp;两者都满足才生效&nbsp;&nbsp;</label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">三级分销设置：</td>
                                                                    <td>
                                                                        <label>
                                                                            &nbsp;购买自动开通&nbsp;
                                                                        </label>
                                                                        【最小购买金额<input name="openfx_minmoneyThree" value="<?php echo ($distributionInfo['lower_money_three']); ?>" size="10" type="text" />元】
                                                                        <em style="color:#FF0000">如果设置了级别升级，这里的优先级低</em>&nbsp;&nbsp;
                                                                        <label>&nbsp;人数下限&nbsp;
                                                                        </label>【下限<input name="lower_ManThree" value="<?php echo ($distributionInfo['lower_man_three']); ?>" size="10" type="text">人】
                                                                        <label><input type="checkbox" name="bothThree" value="1" <?php if($distributionInfo['both_three'] == '1' ): ?>checked="checked"<?php endif; ?> />&nbsp;两者都满足才生效&nbsp;&nbsp;</label>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <input type='hidden' name='configId' value="<?php echo ($distributionInfo["id"]); ?>" />
                                                        </table>
                                                        <p style="text-align:center;">
                                                            <input class="new_save" value="确认保存" type="Submit" style="cursor:pointer">&nbsp;
                                                        </p>
                                                        <div style="clear:both"></div>
                                                    </div> 
                                                </form>
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
</body>
</html>