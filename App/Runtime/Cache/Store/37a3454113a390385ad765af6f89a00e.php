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
                                        <div class="contentbox">
                                            <form id="form1" name="form1" method="post" action="<?php echo U('Store/GoodsBrand/addGoodsClass');?>" enctype="multipart/form-data">
                                                <table cellspacing="2" cellpadding="5" width="100%">
                                                    <tr>
                                                        <td class="label" width="150">分类名称:</td>
                                                        <td><input name="cat_name" id="cat_name"  maxlength="60" size="30" value="<?php echo ($singleClassInfo["name"]); ?>" type="text"><span class="require-field">*</span><span class="cat_name_mes"></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label">分类标题:</td>
                                                        <td><input name="cat_title"  size="50" value="<?php echo ($singleClassInfo["title"]); ?>" type="text" /></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label">分类广告:</td>
                                                        <td>
                                                            <img src='<?php echo ($singleClassInfo["adImgUrl"]); ?>' />
                                                            <input name="cat_img" id="cateimg" type="file" value="<?php echo ($singleClassInfo["ad_img"]); ?>" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label">分类图标:</td>
                                                        <td>
                                                            <img src='<?php echo ($singleClassInfo["classLogoUrl"]); ?>' />
                                                            <input name="cat_icon" id="cateicon" type="file" value="<?php echo ($singleClassInfo["class_logo"]); ?>" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label">上级分类:</td>
                                                        <td>
                                                            <select name="parent_id" id="parent_id">
                                                                <option value="0" <?php if($item["id"] == 0 ): ?>selected<?php endif; ?>>顶级分类</option>
                                                                <?php if($classInfo != '' ): if(is_array($classInfo)): $i = 0; $__LIST__ = $classInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>" <?php if($item["id"] == $singleClassInfo.parent_id): ?>selected<?php endif; ?>><?php echo ($item["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label">排序:</td>
                                                        <td><input name="sort_order" maxlength="60" size="50" value="<?php echo ($singleClassInfo["index"]); ?>" type="text"></td>
                                                    </tr>
                                                    <tr>
                                                    <tr>
                                                        <td class="label">是否启用:</td>
                                                        <td>
                                                            <label><input name="is_show" value="1" <?php if($singleClassInfo["is_delete"] != '2' ): ?>checked="checked"<?php endif; ?> type="radio" /> 是 </label>
                                                            <label><input name="is_show" value="0" <?php if($singleClassInfo["is_delete"] == '2' ): ?>checked="checked"<?php endif; ?> type="radio" /> 否     </label>  
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label">Meta关键字:</td>
                                                        <td><input name="keywords" maxlength="60" size="50" value="<?php echo ($singleClassInfo["desc"]); ?>" type="text" />
                                                            <br /><span style="display: block;" id="notice_keywords">关键字为选填项，其目的在于方便外部搜索引擎搜索</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label">Meta描述:</td>
                                                        <td><textarea name="cat_desc" cols="60" rows="4"><?php echo ($singleClassInfo["keywords"]); ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="label">&nbsp;操作</td>
                                                        <input type='hidden' name='id' value='<?php echo ($singleClassInfo["id"]); ?>'>
                                                        <td align="left"><br>
                                                            <input class="new_save" value=" 确定 " type="submit" />
                                                            <input class="button" value=" 重置 " type="reset" />
                                                        </td>
                                                    </tr>
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
</section>
</body>
</html>