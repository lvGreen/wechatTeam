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
                                                <form action="<?php echo U('Store/Goods/addGoods');?>" method="post" enctype="multipart/form-data" name="theForm" id="theForm">
                                                    <div class="menu_content">
                                                        <table cellspacing="2" cellpadding="5" width="100%" id="tab1">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="label">商品名称:</td>
                                                                    <td>
                                                                        <input name="goods_name" id="goods_name" type="text" size="43" value="<?php echo ($goodsInfo["title"]); ?>">
                                                                        <span style="color:#FF0000">*</span><span class="goods_name_mes"></span>
                                                                        &nbsp;&nbsp;&nbsp;<b>商品条形码:</b>
                                                                        <input name="goods_sn" id="goods_sn" type="text" size="23" value="<?php echo ($goodsInfo["bar_code"]); ?>" />
                                                                        <b>商品编号:</b>
                                                                        <input name="goods_bianhao" id="goods_bianhao" type="text" size="23" value="<?php echo ($goodsInfo["code"]); ?>" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">是否上架：</td>
                                                                    <td>
                                                                        <input name="is_online" value="1" size="20" type="radio" <?php if($goodsInfo["status"] == '1' ): ?>checked<?php endif; ?> />是
                                                                        <input name="is_online" value="0" size="20" type="radio" <?php if($goodsInfo["status"] == '0' ): ?>checked<?php endif; ?> />否
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">是否新品：</td>
                                                                    <td>
                                                                        <input name="is_new" value="1" size="20" type="radio" <?php if($goodsInfo["is_new"] == '1' ): ?>checked<?php endif; ?> />是
                                                                        <input name="is_new" value="0" size="20" type="radio" <?php if($goodsInfo["is_new"] == '0' ): ?>checked<?php endif; ?> />否
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">是否热销：</td>
                                                                    <td>
                                                                        <input name="is_hot" value="1" size="20" type="radio" <?php if($goodsInfo["is_hot"] == '1' ): ?>checked<?php endif; ?> />是
                                                                        <input name="is_hot" value="0" size="20" type="radio" <?php if($goodsInfo["is_hot"] == '0' ): ?>checked<?php endif; ?> />否
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">是否推荐：</td>
                                                                    <td>
                                                                        <input name="is_recommend" value="1" size="20" type="radio" <?php if($goodsInfo["is_recommend"] == '1' ): ?>checked<?php endif; ?> />是
                                                                        <input name="is_recommend" value="0" size="20" type="radio" <?php if($goodsInfo["is_recommend"] == '0' ): ?>checked<?php endif; ?> />否
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">商品单位：</td>
                                                                    <td>
                                                                        <b>商品重量：</b><input name="goods_weight" value="<?php echo ($goodsInfo["weight"]); ?>" size="20" type="text" /> (克／个)
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">商品库存数量：</td>
                                                                    <td>
                                                                        <input name="goods_number" value="<?php echo ($goodsInfo["count"]); ?>" size="20" type="text" />
                                                                        <b>库存警告数量：</b><input name="warn_number" value="<?php echo ($goodsInfo["alarm_count"]); ?>" size="20" type="text" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label" width="150"><a href="javascript:;" class="addsubcate"></a>商品类别:</td>
                                                                    <td>
                                                                        <select name="type" id="cat_id">
                                                                            <option value="0">--选择类别--</option>
                                                                            <option value="1" <?php if($goodsInfo["type"] == '1' ): ?>selected<?php endif; ?> >积分商品</option>
                                                                            <option value="2" <?php if($goodsInfo["type"] == '2' ): ?>selected<?php endif; ?> >虚拟商品</option>
                                                                            <option value="3" <?php if($goodsInfo["type"] == '3' ): ?>selected<?php endif; ?> >实体商品</option>
                                                                        </select>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label" width="150"><a href="javascript:;" class="addsubcate"></a>所在分类:</td>
                                                                    <td>
                                                                        <select name="cat_id" id="cat_id">
                                                                            <option value="0">--选择分类--</option>
                                                                            <?php if(is_array($classInfo)): $i = 0; $__LIST__ = $classInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>" <?php if($goodsInfo["class_id"] == $item["id"] ): ?>selected<?php endif; ?> ><?php echo ($item["name"]); ?></option>
                                                                                <?php if($item["next"] != '' ): if(is_array($item["next"])): $i = 0; $__LIST__ = $item["next"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$class): $mod = ($i % 2 );++$i;?><option value="<?php echo ($class["id"]); ?>" <?php if($goodsInfo["class_id"] == $class["id"] ): ?>selected<?php endif; ?> ><?php echo ($class["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                                                                        </select>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">采购价:</td>
                                                                    <td>
                                                                        <input name="purchase_price" id="market_price" type="text" size="13" value="<?php echo ($goodsInfo["purchase_price"]); ?>" />
                                                                        <b>折扣价:</b><input name="pifa_price" id="pifa_price" type="text" size="13" value="<?php echo ($goodsInfo["discount_price"]); ?>" />
                                                                        <b>原始价:</b><input name="shop_price" id="shop_price" type="text" size="13" value="<?php echo ($goodsInfo["price"]); ?>" />
                                                                        <b>市场价:</b><input name="market_price" id="shop_price" type="text" size="13" value="<?php echo ($goodsInfo["market_price"]); ?>" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label" style="color:#FF0000">总佣金:</td>
                                                                    <td align="left" style="color:#FF0000">
                                                                        <ul class="ajaxshowmoney">
                                                                            <li style="width:180px; float:left; position:relative; padding-bottom:5px;">
                                                                                <input name="takemoney" id="takemoney1" type="text" size="8" value="<?php echo ($goodsInfo["distribution_price"]); ?>" />元
                                                                            </li>
                                                                            <li style="width:100px; float:left"><a style="text-decoration:underline; color:#66CC00" href="http://www.zmnkj.net/admin/weixin.php?type=userconfig" target="_blank">【查看佣金比例】</a></li>
                                                                            <div style="clear:both"></div>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">上传商品主图:</td>
                                                                    <td>
                                                                        <img src="<?php echo getUploadUrl($goodsInfo['img']);?>" />
                                                                        <input name="original_img" id="goods" type="file" value="" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">商品缩略图:</td>
                                                                    <td>
                                                                        <img src="<?php echo getUploadUrl($goodsInfo['small_img']);?>" />
                                                                        <input name="goods_thumb" id="goods_thumb" type="file" value="" />
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label" width="150">产品属性描述:</td>
                                                                    <td>
                                                                        <textarea name="goods_proper" id="goods_details" style="width: 60%; height: 65px; overflow: auto;"><?php echo ($goodsInfo["property"]); ?></textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label" width="150">产品详情:</td>
                                                                    <td>
                                                                        <textarea name="goods_details" id="goods_details" style="width: 60%; height: 65px; overflow: auto;"><?php echo ($goodsInfo["content"]); ?></textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">Meta关键字:</td>
                                                                    <td>
                                                                        <textarea name="meta_keys" id="meta_keys" style="width: 60%; height: 65px; overflow: auto;"><?php echo ($goodsInfo["meta_keywords"]); ?></textarea>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="label">Meta描述:</td>
                                                                    <td>
                                                                        <textarea name="meta_desc" id="meta_desc" style="width: 60%; height: 65px; overflow: auto;"><?php echo ($goodsInfo["meta_dis"]); ?></textarea>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <input type='hidden' name='goodsId' value='<?php echo ($goodsInfo["id"]); ?>' />
                                                        <p style="text-align:center;">
                                                            <input class="new_save" value="添加保存" type="Submit" style="cursor:pointer">&nbsp;
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
<script type='text/javascript'>
    $(function () {
        $('.changeStatus').click(function () {
            var classId = $(this).attr('rel');
            $.post("<?php echo U('Store/GoodsBrand/changeClassStatus');?>", {'classId': classId}, function (data) {
                data = eval(data);
                if (data['error'] == '0') {
                    alert('修改状态成功！');
                    window.location.reload();
                } else {
                    alert(data['msg']);
                }
            });
        });

//        $('.quxuanall').click(function () {
//            if (this.checked == true) {
//                $("input[name='quanxuan']").each(function () {
//                    this.checked = true;
//                });
//            } else {
//                $("input[name='quanxuan']").each(function () {
//                    this.checked = false;
//                });
//            }
//        });
//
//        $('#bathdel').click(function () {
//            if (confirm("确定删除吗？将会删除下级分类！考虑清楚了吗？")) {
//                var arr = [];
//                $('input[name="quanxuan"]').each(function () {
//                    arr.push($(this).val());
//                })
//                var str = arr.join('+');
//                $.post("<?php echo U('Store/GoodsBrand/delClassStatus');?>", {'str': str}, function (data) {
//                    data = eval(data);
//                    alert(data['msg']);
//                });
//            }
//        });
    });
</script>
</body>
</html>