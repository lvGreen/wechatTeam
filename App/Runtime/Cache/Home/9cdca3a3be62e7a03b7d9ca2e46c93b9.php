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
                            <li style="width: 100%; display: table-cell; vertical-align: top;">
                                <a data-fx="Modulefx" href="">
                                    <img style="max-height:35%;" src="./photos/20150828111248_49135.jpg"></a>
                            </li><li style="width: 100%; display: table-cell; vertical-align: top;">
                                <a data-fx="Modulefx" href="">
                                    <img style="max-height:35%;" src="./photos/20150828135110_28340.jpg"></a>
                            </li><li style="width: 100%; display: table-cell; vertical-align: top;">
                                <a data-fx="Modulefx" href="">
                                    <img style="max-height:35%;" src="./photos/20150828110353_15549.jpg"></a>
                            </li><li style="width: 100%; display: table-cell; vertical-align: top;">
                                <a data-fx="Modulefx" href="">
                                    <img style="max-height:35%;" src="./photos/20150828110941_63444.jpg"></a>
                            </li>						<!--center-->
                            <li style="width: 100%; display: table-cell; vertical-align: top;">
                                <a data-fx="Modulefx" href="">
                                    <img style="max-height:35%;" src="./photos/20150828111248_49135.jpg"></a>
                            </li><li style="width: 100%; display: table-cell; vertical-align: top;">
                                <a data-fx="Modulefx" href="">
                                    <img style="max-height:35%;" src="./photos/20150828135110_28340.jpg"></a>
                            </li><li style="width: 100%; display: table-cell; vertical-align: top;">
                                <a data-fx="Modulefx" href="">
                                    <img style="max-height:35%;" src="./photos/20150828110353_15549.jpg"></a>
                            </li><li style="width: 100%; display: table-cell; vertical-align: top;">
                                <a data-fx="Modulefx" href="">
                                    <img style="max-height:35%;" src="./photos/20150828110941_63444.jpg"></a>
                            </li>						<!--after-->
                            <li style="width: 100%; display: table-cell; vertical-align: top;">
                                <a data-fx="Modulefx" href="">
                                    <img style="max-height:35%;" src="./photos/20150828111248_49135.jpg"></a>
                            </li><li style="width: 100%; display: table-cell; vertical-align: top;">
                                <a data-fx="Modulefx" href="">
                                    <img style="max-height:35%;" src="./photos/20150828135110_28340.jpg"></a>
                            </li><li style="width: 100%; display: table-cell; vertical-align: top;">
                                <a data-fx="Modulefx" href="">
                                    <img style="max-height:35%;" src="./photos/20150828110353_15549.jpg"></a>
                            </li><li style="width: 100%; display: table-cell; vertical-align: top;">
                                <a data-fx="Modulefx" href="">
                                    <img style="max-height:35%;" src="./photos/20150828110941_63444.jpg"></a>
                            </li>						</ul>
                        <div id="slider_1_indicate_120145" class="slider_1_indicate"><span class="on">&nbsp;</span><span class="">&nbsp;</span><span class="">&nbsp;</span><span class="">&nbsp;</span></div>
                    </div>
                </section>
            </div>
            <!--轮播图 end-->

            <!--导航 start-->
            <div data-role="widget" data-widgt="fn_1" class="fn_1">
                <div class="widget_wrap" style="background-color:#CCCCCC; text-align:center; height:auto;">
                    <marquee width=100% scrollamount=2 >
                        <p ><font color="#FF0000" size="2" >公告：欢迎来到绿叶商城。。。</font ></p >
                    </marquee >

                    <form id="form1" name="form1" method="get" action="/vshop/lists">
                        <input id="keywords" name="ks" type="text" placeholder="搜您想要的" style="margin-top:5px; margin-bottom:5px; padding-left:8px; padding-right:8px; width:98%; font-size:14px; border:1px solid #FFFFFF; height:30px; line-height:30px;border-radius:3px; ">
                    </form>
                </div>
            </div>
            <!--导航 end-->
            <div style="margin-bottom:2px;">
                <a href="">
                    <img style="width:100%" src="./photos/20150828134829_42233.jpg"></a>
            </div>			
            <!--商品列表 start-->
            <div class="indexcont" style="margin-top:0;">
                <div>
                    <span>单支红酒 </span>
                    <a href="goodslist.html">更多</a>
                </div>
            </div>
            <div data-role="widget" data-widget="goodsList_1" class="goodsList_1" style="margin-top:-6px;">
                <div class="widget_wrap">
                    <ul>
                        <li>
                            <a href="good.html">
                                <div>
                                    <img src="./photos/20150812182349_26716.jpg">
                                </div>
                                <div>
                                    <p class="title">卡露—西拉</p>
                                    <label class="price">￥99.00</label>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="good.html">
                                <div>
                                    <img src="./photos/20150717132242_36820.jpg">
                                </div>
                                <div>
                                    <p class="title">卡露-克洛德</p>
                                    <label class="price">￥288.00</label>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="indexcont" style="margin-top:0;">
                <div>
                    <span>双支皮盒</span>
                    <a href="goodslist.html">更多</a>
                </div>
            </div>
            <div data-role="widget" data-widget="goodsList_1" class="goodsList_1" style="margin-top:-6px;">
                <div class="widget_wrap">
                    <ul>
                        <li>
                            <a href="good.html">
                                <div>
                                    <img src="/material/Uploads/Attached/1012/image/20150723/20150723150714_89646.jpg">
                                </div>
                                <div>
                                    <p class="title">双只皮盒—美乐</p>
                                    <label class="price">￥198.00</label>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="good.html">
                                <div>
                                    <img src="/material/Uploads/Attached/1012/image/20150723/20150723150821_21742.jpg">
                                </div>
                                <div>
                                    <p class="title">双只皮盒—黑比诺</p>
                                    <label class="price">￥238.00</label>
                                </div>
                            </a>
                        </li>					
                    </ul>
                </div>
            </div>
            <div class="indexcont" style="margin-top:0;">
                <div>
                    <span>整件红酒</span>
                    <a href="goodslist.html">更多</a>
                </div>
            </div>
            <div data-role="widget" data-widget="goodsList_1" class="goodsList_1" style="margin-top:-6px;">
                <div class="widget_wrap">
                    <ul>
                        <li>
                            <a href="good.html">
                                <div>
                                    <img src="/material/Uploads/Attached/1012/image/20150717/20150717161626_16505.jpg">
                                </div>
                                <div>
                                    <p class="title">整件—美乐（6支装）</p>
                                    <label class="price">￥348.00</label>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="good.html">
                                <div>
                                    <img src="/material/Uploads/Attached/1012/image/20150717/20150717161829_14913.jpg">
                                </div>
                                <div>
                                    <p class="title">整件—黑比诺（6支装）</p>
                                    <label class="price">￥468.00</label>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <footer data-role="footer">
            <div data-role="copyright">
                <div data-role="copyright" data-copyright="copyright1" class="copyright1">
                    <div class="widget_wrap">
                        <ul class="tbox">
                            <li>
                                <p class="box" style="padding-top:10px;">
                                    <a href="index.html">店铺首页</a>
                                    <a href="usercenter.html">会员中心</a>
                                    <a href="about.html">关于我们</a>
                                </p>
                                <p style="height:50px; padding-top:15px; font-size:1.1em;"><a href="#">
                                        ©绿叶科技技术支持					</a></p>
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
                    <a href="index.html" data-fx="Modulefx">
                        <span class="wicon-home">&nbsp;</span>
                        <p>首页</p>
                    </a>
                </li>

                <li>
                    <a href="fenlei.html" data-fx="Modulefx">
                        <span class="wicon-mark">&nbsp;</span>
                        <p>分类</p>
                    </a>
                </li>

                <li class="li3">
                    <a href="usercenter.html" data-fx="Modulefx">
                        <span class="wicon-info">&nbsp;</span>
                        <p>分销中心</p>
                    </a>
                </li>

                <li>
                    <a href="myorder.html" data-fx="Modulefx">
                        <span class="wicon-file">&nbsp;</span>
                        <p>我的订单</p>
                    </a>
                </li>

                <li>
                    <a href="buycar.html" data-fx="Modulefx">
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
                        <img src="./photos/0.jpg">
                    </span></li>
                <li style="width: 100%;">
                    <p>
                        尊敬的飘云，您还不是微客，成为微客还可以分享赚钱哦</p>
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