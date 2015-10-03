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
                                        <div id="mainss" class="main" style="height:auto; padding-top:1px;">
                                            <div class="contentbox">
                                                <form id="shopConf" name="shopConf" method="post" action="<?php echo U('Store/Shop/setCompanyConf');?>" enctype="multipart/form-data">
                                                    <table cellspacing="2" cellpadding="5" width="100%">
                                                        <tr>
                                                            <td class="label" width="15%">网站名称:</td>
                                                            <td width="85%">
                                                                <input name="site_name" id="site_name"  type="text" style="width:315px;" value="<?php echo ($companyInfo["name"]); ?>">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="label">公司地址:</td>
                                                            <td><input name="company_addr" id="company_url"  type="text" style="width:315px;" value="<?php echo ($companyInfo["address"]); ?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="label">网站标题:</td>
                                                            <td><input name="site_title" id="site_title"  type="text" style="width:315px;" value="<?php echo ($companyInfo["title"]); ?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="label">网站logo:</td>
                                                            <td>
                                                                <img src="<?php echo ($companyInfo["logo"]); ?>" style='width:50px;height:50px;'/>
                                                                <input name="site_logo" id="logo" type="file" value="" size="43"/>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="label">客服电话:</td>
                                                            <td><input name="custome_phone" id="custome_phone" value="<?php echo ($companyInfo["service_phone"]); ?>" type="text" style="width:315px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="label">联系客服:</td>
                                                            <td><input name="custome_qq" id="custome_qq" value="<?php echo ($companyInfo["service_qq"]); ?>" type="text" style="width:315px;"><br /><em>填写QQ号码,用逗号分隔。</em></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="label">快商客服:</td>
                                                            <td><input name="custome_email" id="custome_email" value="<?php echo ($companyInfo["kuaishang_service"]); ?>" type="text" style="width:315px;" />
                                                                <p style="padding:0px; margin:0px; padding-top:5px;">下载软件注册：<a href="http://kuaishang.cn/" target="_blank">http://kuaishang.cn/</a>,&nbsp;&nbsp;<a href="http://kefu6.kuaishang.cn/bs/im.htm?cas=31235___565427&fi=33908" target="_blank" style="color:#FF0000">示例</a></p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="label">邮件提醒：</td>
                                                            <td>
                                                        <input type='radio' name='setSendEmail' value='1' <?php if($companyInfo["is_set_send_email"] == '1' ): ?>checked<?php endif; ?> /> 是
                                                        <input type='radio' name='setSendEmail' value='2' <?php if($companyInfo["is_set_send_email"] != '1' ): ?>checked<?php endif; ?>/> 否
                                                        </td>
                                                        </tr>
                                                        <tr <?php if($companyInfo["is_set_send_email"] != '1' ): ?>class='email dn'<?php else: ?>class='email'<?php endif; ?>>
                                                        <td class="label">设置发送邮箱：</td>
                                                        <td>
                                                            <input type='email' name='sendEmail' value='<?php echo ($companyInfo["send_email"]); ?>' />
                                                        </td>
                                                        </tr>
                                                        <tr <?php if($companyInfo["is_set_send_email"] != '1' ): ?>class='email dn'<?php else: ?>class='email'<?php endif; ?>>
                                                        <td class="label">发送邮箱密码：</td>
                                                        <td>
                                                            <input type='text' name='sendEmailPass' value='<?php echo ($companyInfo["email_password"]); ?>' />
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <td>&nbsp;</td>
                                                            <td>
                                                                <input name="mes_save" class="mes_save" value="保存" type="submit">
                                                            </td>
                                                        </tr>
                                                        <input type='hidden' name='type' value='<?php echo ($edit); ?>' />
                                                        <input type='hidden' name='info' value='<?php echo ($companyInfo["id"]); ?>' />
                                                    </table>
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
<script type='text/javascript'>
    $(function(){
        $('input[name=setSendEmail]').click(function(){
            var sendEmail = $(this).val();
            if(sendEmail == 1){
                $('.email').removeClass('dn');
            }else if(sendEmail == 2){
                $('.email').addClass('dn');
            }
        });
    });
</script>
</body>
</html>