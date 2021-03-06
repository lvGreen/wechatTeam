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
                                                <table cellspacing="2" cellpadding="5" width="100%">
                                                    <tr>
                                                        <th colspan="7" align="left">商品分类</th>
                                                    </tr>
                                                    <tr>
                                                        <th width="60"><label>选择</label></th>
                                                        <th width="40%">品牌名称</th>
                                                        <th>品牌标题</th>
                                                        <th>商品数量</th>
                                                        <th>状态</th>
                                                        <th width="35">排序</th>
                                                        <th>操作</th>
                                                    </tr>
                                                    <?php if(is_array($brandList)): $i = 0; $__LIST__ = $brandList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr>
                                                            <td><input type="checkbox" name="quanxuan" value="<?php echo ($item["id"]); ?>" class="gids"/></td>
                                                            <td><?php echo ($item["name"]); ?></td>
                                                            <td><?php echo ($item["title"]); ?></td>
                                                            <td><?php echo ($item["goods_count"]); ?></td>
                                                            <td class='changeStatus' rel='<?php echo ($item["id"]); ?>'>
                                                        <?php if($item["is_delete"] == '1' ): ?><img src="/Public/Store/Image/goods/yes.gif" class="activeop" lang="is_show" />
                                                            <?php else: ?>
                                                            <img src="/Public/Store/Image/goods/no.gif" class="activeop" lang="is_show" /><?php endif; ?>
                                                        </td>
                                                        <td><span class="vieworder"><?php echo ($item["index"]); ?></span></td>
                                                        <td>
                                                            <a href="<?php echo U('Store/GoodsBrand/viewGoodsClass',array('id'=>$item['id']));?>" title="编辑">
                                                                <img src="/Public/Store/Image/goods/icon_edit.gif" title="编辑"/>
                                                            </a>
                                                        </td>
                                                        </tr>
                                                        <?php if(item.next != '' ): if(is_array($item["next"])): $i = 0; $__LIST__ = $item["next"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$class): $mod = ($i % 2 );++$i;?><tr>
                                                                    <td><input type="checkbox" name="quanxuan" value="<?php echo ($class["id"]); ?>" class="gids"/></td>
                                                                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($class["name"]); ?></td>
                                                                    <td><?php echo ($class["title"]); ?></td>
                                                                    <td><?php echo ($class["goods_count"]); ?></td>
                                                                    <td class='changeStatus' rel='<?php echo ($class["id"]); ?>'>
                                                                <?php if($class["is_delete"] == '1' ): ?><img src="/Public/Store/Image/goods/yes.gif" class="activeop" lang="is_show" />
                                                                    <?php else: ?>
                                                                    <img src="/Public/Store/Image/goods/no.gif" class="activeop" lang="is_show" /><?php endif; ?>
                                                                </td>
                                                                <td><span class="vieworder"><?php echo ($class["index"]); ?></span></td>
                                                                <td>
                                                                    <a href="<?php echo U('Store/GoodsBrand/viewGoodsClass',array('id'=>$class['id']));?>" title="编辑">
                                                                        <img src="/Public/Store/Image/goods/icon_edit.gif" title="编辑"/>
                                                                    </a>
                                                                </td>
                                                                </tr><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                                                    <tr>
                                                        <td colspan="7"> <input type="checkbox" class="quxuanall" value="checkbox" />
                                                            <input type="button" name="del" value="批量删除" class="bathdel" id="bathdel"/>
                                                        </td>
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
    </div>
</section>
<script type='text/javascript'>
    $(function(){
        $('.changeStatus').click(function(){
            var classId = $(this).attr('rel');
            $.post("<?php echo U('Store/GoodsBrand/changeClassStatus');?>",{'classId':classId}, function(data){
                data = eval(data);
                if(data['error'] == '0'){
                    alert('修改状态成功！');
                    window.location.reload();
                }else{
                    alert(data['msg']);
                }
            });
        });
        
        $('.quxuanall').click(function(){
            if(this.checked == true){
                $("input[name='quanxuan']").each(function(){this.checked = true;});
            }else{
                $("input[name='quanxuan']").each(function(){this.checked = false;});
            }
        });
        
        $('#bathdel').click(function(){
            if(confirm("确定删除吗？将会删除下级分类！考虑清楚了吗？")){
                var arr = [];
                $('input[name="quanxuan"]').each(function(){
                    arr.push($(this).val());
                })
                var str = arr.join('+');
                $.post("<?php echo U('Store/GoodsBrand/delClassStatus');?>",{'str':str},function(data){
                    data = eval(data);
                    alert(data['msg']);
                    window.location.reload();
                });
            }
        });
    });
    </script>
</body>
</html>