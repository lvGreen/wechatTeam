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
                                                <table cellspacing="2" cellpadding="5" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <th colspan="15" align="left"><span style="float:left">实体商品列表</span></th>
                                                        </tr>
                                                        <tr>
                                                            <th align="right" colspan="15">
                                                                <img src="/Public/Store/Image/goods/icon_search.gif" alt="SEARCH" width="26" border="0" height="22" align="absmiddle" />
                                                                <select name="cat_id" id='cat_id'>
                                                                    <option value="0">所有分类</option>
                                                                        <?php if(is_array($classInfo)): $i = 0; $__LIST__ = $classInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$classItem): $mod = ($i % 2 );++$i;?><option value="<?php echo ($classItem["id"]); ?>"><?php echo ($classItem["name"]); ?></option>
                                                                            <?php if($classItem["next"] != '' ): if(is_array($classItem["next"])): $i = 0; $__LIST__ = $classItem["next"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$class): $mod = ($i % 2 );++$i;?><option value="<?php echo ($class["id"]); ?>"><?php echo ($class["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                                                                </select>

                                                                <select name="is_goods_attr" id='is_goods_attr'>
                                                                    <option value="0">全部</option>
                                                                    <option value="1">上架</option>
                                                                    <option value="2">下架</option>
                                                                    <option value="hot">热销</option>
                                                                    <option value="new">新品</option>
                                                                    <option value="recommend">推荐</option>
                                                                </select>
                                                                关键字 <input name="keyword" size="15" type="text" value="" />
                                                                <input value=" 搜索 " name='search' type="button" />
                                                            </th>
                                                        </tr>
                                                        <tr>
                                                            <th width="60"><label>选择</label></th>
                                                            <th>所在分类</th>
                                                            <th>商品图</th>
                                                            <th style="width:225px;">标题</th>
                                                            <th>销售价格</th>
                                                            <th>采购价</th>
                                                            <th>市场价</th>
                                                            <th>折扣价</th>
                                                            <th>分销利润</th>
                                                            <th>上架</th>
                                                            <th>热销</th>
                                                            <th>新品</th>
                                                            <th>推荐</th>
                                                            <th>录入时间</th>
                                                            <th>操作</th>
                                                        </tr>
                                                        <?php if(is_array($goodsListArray)): $i = 0; $__LIST__ = $goodsListArray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                                                                <td><input type="checkbox" name="quanxuan" value="<?php echo ($item["id"]); ?>" class="gids"></td>
                                                                <td><?php echo ($item["name"]); ?></td>
                                                                <td><img src="<?php echo getUploadUrl($item['small_img']);?>" width="60" /></td>
                                                                <td><?php echo ($item["title"]); ?></td>
                                                                <td><span><?php echo ($item["price"]); ?></span></td>
                                                                <td><span><?php echo ($item["purchase_price"]); ?></span></td>
                                                                <td><span><?php echo ($item["market_price"]); ?></span></td>
                                                                <td><span><?php echo ($item["discount_price"]); ?></span></td>
                                                                <td><span><?php echo ($item["distribution_price"]); ?></span></td>
                                                                <td><img <?php if($item["status"] == '1'): ?>src="/Public/Store/Image/goods/yes.gif" <?php else: ?> src="/Public/Store/Image/goods/no.gif"<?php endif; ?> alt="0" class="activeop" lang="sale" rel='<?php echo ($item["id"]); ?>'></td>
                                                                <td><img <?php if($item["is_hot"] == '1'): ?>src="/Public/Store/Image/goods/yes.gif" <?php else: ?> src="/Public/Store/Image/goods/no.gif"<?php endif; ?> alt="0" class="activeop" lang="hot" rel='<?php echo ($item["id"]); ?>'></td>
                                                                <td><img <?php if($item["is_new"] == '1'): ?>src="/Public/Store/Image/goods/yes.gif" <?php else: ?> src="/Public/Store/Image/goods/no.gif"<?php endif; ?> alt="0" class="activeop" lang="new" rel='<?php echo ($item["id"]); ?>'></td>
                                                                <td><img <?php if($item["is_recommend"] == '1'): ?>src="/Public/Store/Image/goods/yes.gif" <?php else: ?> src="/Public/Store/Image/goods/no.gif"<?php endif; ?> alt="0" class="activeop" lang="best" rel='<?php echo ($item["id"]); ?>'></td>
                                                                <td><?php echo dateformat($item['add_time'],'Y-m-d');?></td>
                                                                <td>
                                                                    <a href="<?php echo U('Store/Goods/goodsAdd', array('id'=>$item['id']));?>" title="编辑">
                                                                        <img src="/Public/Store/Image/goods/icon_edit.gif" title="编辑" />
                                                                    </a>
                                                                </td>
                                                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                                        <tr>
                                                            <td colspan="15"> <input type="checkbox" class="quxuanall" value="checkbox">
                                                                <input type="button" name="button" value="批量下架" class="bathdel" id="bathdel">
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
        //查询
        $("input[name='search']").click(function(){
            var classId = $('#cat_id').val();
            var status = $('#is_goods_attr').val();
            var keywords = $("input[name='keyword']").val();
            window.location.href = "<?php echo U('Store/Goods/goodsList');?>&classId="+classId+'&status='+status+'&keywords='+keywords;
        });
        
        $('.activeop').click(function () {
            var classId = $(this).attr('rel');
            var act = $(this).attr('lang');
            $.post("<?php echo U('Store/Goods/changeGoodsStatus');?>", {'act':act,'goodsId': classId}, function (data) {
                data = eval(data);
                if (data['error'] == '0') {
                    alert('修改状态成功！');
                    window.location.reload();
                } else {
                    alert(data['msg']);
                }
            });
        });

        $('.quxuanall').click(function () {
            if (this.checked == true) {
                $("input[name='quanxuan']").each(function () {
                    this.checked = true;
                });
            } else {
                $("input[name='quanxuan']").each(function () {
                    this.checked = false;
                });
            }
        });

        $('#bathdel').click(function () {
            if (confirm("确定删除吗？将会删除下级分类！考虑清楚了吗？")) {
                var arr = [];
                $('input[name="quanxuan"]').each(function () {
                    arr.push($(this).val());
                })
                var str = arr.join('+');
                $.post("<?php echo U('Store/GoodsBrand/delClassStatus');?>", {'str': str}, function (data) {
                    data = eval(data);
                    alert(data['msg']);
                });
            }
        });
    });
</script>
</body>
</html>