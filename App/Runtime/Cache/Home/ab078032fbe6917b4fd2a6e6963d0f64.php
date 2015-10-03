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
    <link href="/Public/Home/Css/home.css" rel="stylesheet" />
    <link href="/Public/Home/Css/widget_menu.css" rel="stylesheet" />
    <script src="/Public/Home/Js/swipe_min.js"></script>
</head>
<body onselectstart="return true;" ondragstart="return false;" style="">
    <div data-role="container" class="container home">
        <header data-role="header">
        </header>
        <section data-role="body" class="body" style="min-height: 768px;">
            <!--轮播图 start-->
            <div data-role="widget" data-widget="slider_1_120145" class="slider_1">
                <section class="widget_wrap">
                    <div id="slider_1_wrap_120145" class="slider_1_wrap" style="visibility: visible;">
                        <ul style="list-style: none; width: 7680px; transition: -webkit-transform 0ms; -webkit-transition: -webkit-transform 0ms; -webkit-transform: translate3d(-2560px, 0px, 0px);"><!--before-->
                            <?php if(is_array($bannerList)): $i = 0; $__LIST__ = $bannerList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li style="width: 100%; display: table-cell; vertical-align: top;">
                                <a data-fx="Modulefx" <?php if($item["url"] != '' ): ?>href="$item.url" <?php else: ?>href="javascript:void(0)"<?php endif; ?>>
                                    <img style="max-height:35%;" src="<?php echo getUploadUrl($item['banner_img']);?>" />
                                </a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <div id="slider_1_indicate_120145" class="slider_1_indicate">
                            <span class="on">&nbsp;</span>
                            <span class="">&nbsp;</span>
                            <span class="">&nbsp;</span>
                            <span class="">&nbsp;</span>
                            <span class="">&nbsp;</span>
                        </div>
                    </div>
                </section>
            </div>
            <!--轮播图 end-->

            <!--导航 start-->
            <div data-role="widget" data-widgt="fn_1" class="fn_1">
                <div class="widget_wrap" style="background-color:#CCCCCC; text-align:center; height:auto;">
                    <marquee width=100% scrollamount=2 >
                        <p ><font color="#FF0000" size="2" >公告：欢迎来到<?php echo ($_SESSION['shopInfo']['name']); ?></font ></p >
                    </marquee >

                    <form id="form1" name="form1" method="get" action="<?php echo U('Home/Goods/goodsSearchList');?>">
                        <input id="keywords" name="ks" type="text" placeholder="搜您想要的" style="margin-top:5px; margin-bottom:5px; padding-left:8px; padding-right:8px; width:98%; font-size:14px; border:1px solid #FFFFFF; height:30px; line-height:30px;border-radius:3px; ">
                    </form>
                </div>
            </div>			
            <!--商品列表 start-->
            <?php if(is_array($classInfo)): $i = 0; $__LIST__ = $classInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="indexcont" style="margin-top:0;">
                <div>
                    <span><?php echo ($item["name"]); ?> </span>
                    <a href="<?php echo U('Home/Goods/goodsList',array('classId'=>$item['id'], 'type'=>'class'));?>">更多</a>
                </div>
            </div>
            <div data-role="widget" data-widget="goodsList_1" class="goodsList_1" style="margin-top:-6px;">
                <div class="widget_wrap">
                    <ul>
                        <?php if(is_array($item["goods"])): $i = 0; $__LIST__ = $item["goods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goodsInfo): $mod = ($i % 2 );++$i;?><li>
                            <a href="<?php echo U('Home/Goods/goodsDetail', array('goodsCode'=>$goodsInfo['goods_code']));?>">
                                <div>
                                    <img src="<?php echo getUploadUrl($goodsInfo.img);?>">
                                </div>
                                <div>
                                    <p class="title"><?php echo ($goodsInfo["title"]); ?></p>
                                    <label class="price">¥ <?php echo ($goodsInfo["price"]); ?></label>
                                </div>
                            </a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
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
    <?php if($goods != '' ): ?><div data-role="widget" data-widget="">
            <div class="widget_wrap">
                <ul class="fixed_btn">
                    <ol id="fixed_btn" class="tbox" style="position: fixed;">
                        <li id="headerShopTu">
                            <div style="width: 45px">
                                <a href="buycar.html" id="btn_link_shopcart" class="btn_add btn_add_shopcart" data-count="1">&nbsp;</a>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <div>
                                    <a href="javascript:;" id="btn_add_shopcart" class="btn on">
                                        <label>加入购物车</label></a>
                                </div>
                                <div>
                                    <a href="ordersubmit.html" id="btn_buy" class="btn red on">
                                        <label>立刻购买</label></a>
                                </div>
                            </div>
                        </li>
                    </ol>
                </ul>
            </div>
        </div><?php endif; ?>
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
    
    <!--返回顶部 start-->
    <div data-widget="tools" data-tools="tools_widget" id="tools_widget" class="tools_widget">
        <div class="widget_wrap">
            <ul class="tools_widget_wrap">
                <li><a href="javascript:;" id="tools_widget_goTop" class="tools_widget_goTop hidden" style="display: none;">
                        顶部</a> </li>
                <li id="tools_kfli" style=" display:none;">
                    <a href="#" id="tolls_widget_message" class="tolls_widget_message">客服</a> 
                </li>
            </ul>
        </div>
    </div>
    <div data-role="widget" data-widget="widget_40" id="widget_dialog_1500" class="dialog_guid dialog_guid_follow_authentication on topTip" style="z-index: 1500;">
        <div class="widget_wrap" style="z-index: 1500;">
            <ul class="tbox" style="z-index: 1550;">
                <li><span class="img_wrap">
                        <img src="<?php echo ($_SESSION['user']['headimgurl']); ?>" />
                    </span></li>
                <li style="width: 100%;">
                    <p>
                        尊敬的<?php echo ($_SESSION['user']['nickname']); ?>，您还不是微客，成为微客还可以分享赚钱哦</p>
                </li>
                <li>
                    <div style="width: 110px; text-align: right;">
                        <a href="weike.html">
                            成为微客</a><a href="javascript:;" class="close" onclick="$('.topTip').hide();">&nbsp;
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
        var slider_1 = (function () {
            var that = {};
            that.initSlider = function () {
                that.slider = new Swipe(document.getElementById('slider_1_wrap_120145'), {
                    speed: 500,
                    loop: true,
                    auto: 3000,
                    indicate: "#slider_1_indicate_120145"
                });
                return that;
            }
            return that;
        })().initSlider();
    </script>
    <script type='text/javascript'>
        $(document).keydown(function (e) {
            var curKey = e.which;
            if (curKey == 13) {
                var keywords = $('#keywords').val();
                if ($.trim(keywords) == '') {
                    return false;
                }
                document.form1.submit();
            }
        });
    </script>
</body>
</html>