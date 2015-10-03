<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
    <head>
    <meta charset="utf-8">
<title><?php echo ($title); ?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta name="Keywords" content="<?php echo ($mataKeyWords); ?>">
<meta name="Description" content="<?php echo ($mataKeyDis); ?>">
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="telephone=no, address=no" name="format-detection">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

<link href="/Public/Home/Css/reset.css" rel="stylesheet">
<link href="/Public/Home/Css/common.css" rel="stylesheet">

<script type="text/javascript" src="/Public/Home/Js/jquery-1.9.1.js"></script>
<script src="/Public/Home/Js/com.js"></script>
    <link href="/Public/Home/Css/home.css" rel="stylesheet">
    <link href="/Public/Home/Css/widget_menu.css" rel="stylesheet">
    <script src="/Public/Home/Js/common.js"></script>
</head>
<body onselectstart="return true;" ondragstart="return false;" style="">
    <div data-role="container" class="container home">
        <section data-role="body" class="body" style="min-height: 768px;">
            <!--商品列表 start-->
            <div data-role="widget" data-widget="goodsList_1" class="goodsList_1">
                <div class="widget_wrap listinfo">
                    <ul>
                        <script type="text/html" id="goods_list">
                            <li>
                                <a href="++URL++">
                                    <div>
                                        <img src="++IMG++" />
                                    </div>
                                    <div>
                                        <p class="title">++TITLE++</p>
                                        <label class="price">￥++PRICE++</label>
                                    </div>
                                </a>
                            </li>
                            </script>
                            <?php if(is_array($goodsInfo)): $i = 0; $__LIST__ = $goodsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li>
                                    <a href="<?php echo U('Home/Goods/goodsDetail',array('code'=>$item['goods_code']));?>">
                                        <div>
                                            <img src="<?php echo getUploadUrl($item['small_img']);?>">
                                        </div>
                                        <div>
                                            <p class="title"><?php echo ($item["title"]); ?></p>
                                            <label class="price">￥<?php echo ($item["price"]); ?></label>
                                        </div>
                                    </a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <div class="listmore" style="color:#4a4a4a; padding:10px; text-align:center; font-size:11px">
                            <span style="display: none;">
                                <img src="./images/loader.gif">&nbsp;数据加载中...</span>
                            <span style="">没有更多数据了</span>
                        </div>
                    </div>
                </div>

                <!--商品列表 end-->
            </section>
            <footer data-role="footer">
    <div data-role="copyright">
        <div data-role="copyright" data-copyright="copyright1" class="copyright1">
            <div class="widget_wrap">
                <ul class="tbox">
                    <li>
                        <p class="box" style="padding-top:10px;">
                            <a href="<?php echo U('Home/Shop/index',array('shop'=>$_SESSION['wapShop']));?>">店铺首页</a>
                            <a href="<?php echo U('Home/PersonalCenter/index');?>">会员中心</a>
                            <a href="<?php echo U('Home/Shop/about',array('shop'=>$_SESSION['wapShop']));?>">关于我们</a>
                        </p>
                        <p style="height:50px; padding-top:15px; font-size:1.1em;">
                            <a href="#"><?php echo ($_SESSION['shopInfo']['name']); ?>支持</a>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
        </div>
    <div data-role="widget" data-widget="menu_4" class="menu_4">
    <div class="widget_wrap">
        <ul id="menu_4_ul" style="z-index:9999;">

            <li>
                <a href="<?php echo U('Home/Shop/index',array('shop'=>$_SESSION['wapShop']));?>" data-fx="Modulefx">
                    <span class="wicon-home">&nbsp;</span>
                    <p>首页</p>
                </a>
            </li>

            <li>
                <a href="" data-fx="Modulefx">
                    <span class="wicon-mark">&nbsp;</span>
                    <p>分类</p>
                </a>
            </li>

            <li class="li3">
                <a href="" data-fx="Modulefx">
                    <span class="wicon-info">&nbsp;</span>
                    <p>分销中心</p>
                </a>
            </li>

            <li>
                <a href="" data-fx="Modulefx">
                    <span class="wicon-file">&nbsp;</span>
                    <p>我的订单</p>
                </a>
            </li>

            <li>
                <a href="" data-fx="Modulefx">
                    <span class="wicon-cart">&nbsp;</span>
                    <p>购物车</p>
                </a>
            </li>
        </ul>
    </div>
</div>
    <div data-widget="tools" data-tools="tools_widget" id="tools_widget" class="tools_widget">
    <div class="widget_wrap">
        <ul class="tools_widget_wrap">
            <li><a href="javascript:;" id="tools_widget_goTop" class="tools_widget_goTop hidden" style="display: block;">
                    顶部</a> </li>
            <li id="tools_kfli" style=" display:none;">
                <a href="#" id="tolls_widget_message" class="tolls_widget_message">客服</a> 
            </li>
        </ul>
    </div>
</div>
    <script>
        var flag, page = 1;
        $(function () {
            flag = true;
            loadInfo();

            $(window).scroll(function () {
                if (!flag)
                    return false;
                // 滚动高度
                var scrollTop = $(window).scrollTop();
                // 标记距顶部位置
                var top = $('.listmore').offset().top;

                if (scrollTop > top - $(window).height()) {
                    loadInfo();
                }
            });
        });

        function loadInfo() {
            flag = false;
            $('.listmore span:eq(0)').show();
            setTimeout(function () {
                $.get("#", {page: page++}, function (data) {
                    $('.listmore span:eq(0)').hide();
                    if (data.status == 1) {
                        if (data.data.length <= 0) {
                            flag = false;
                            $('.listmore span:eq(1)').show();
                            return;
                        }
                        var html = $("#goods_list").html();
                        $.each(data.data, function (k, v) {
                            var h = html.replaceAll("{__ID__}", v.id).replaceAll("{__IMG__}", v.image).replaceAll("{__TITLE__}", v.title).replaceAll("{__PRICE__}", v.price);
                            $(".listinfo ul").append(h);
                        });
                        flag = true;
                    }
                }, 'json');
            }, 1000);
        }
    </script>
</body>
</html>