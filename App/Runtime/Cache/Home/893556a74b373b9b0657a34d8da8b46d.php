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
    <link href="/Public/Home/Css/ucenter.css" rel="stylesheet">
    <link href="/Public/Home/Css/main.css" rel="stylesheet">
    <script src="/Public/Home/Js/hide.js"></script>
</head>
<body onselectstart="return true;" ondragstart="return false;">
    <div data-role="container" class="container usercenter my">
        <header>
            <div class="header">
                <a href="ucenterset.html" class="setting">&nbsp;</a>
                <div style="padding:30px 0 30px 0;">
                    <ul class="tbox">
                        <li>
                            <span id="upload_header">
                                <img src="$_SESSION['user']['headimgurl']" />
                            </span>
                        </li>
                        <li>
                            <h3><?php echo ($_SESSION["user"]["nickname"]); ?></h3>
                            <p style="margin-top:5px;">
                                <font style="margin-right:20px;">会员ID：1523</font>
                                <label>微客：否</label>
                            </p>
                            <p style="margin-top:1px;">推荐人：绿叶科技</p>
                        </li>
                    </ul>
                </div>
                <div>
                    <ul class="box">
                        <li>
                            <a href="shouru.html">
                                <label>推广</label>
                                <span>0.00</span>
                            </a>
                        </li>
                        <li>
                            <a href="mymoney.html">
                                <label>佣金</label>
                                <span>0.00</span>
                            </a>
                        </li>
                        <li>
                            <a href="tixian.html">
                                <label>积分</label>
                                <span>0</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div style="margin-top:-20px;">
                <ul id="list_ul" class="list_ul" style="border:1px solid #efeff4; height:62px; padding-top:0;">
                    <div>
                        <li>
                            <a href="<?php echo U('Home/Order/orderList');?>" class="link_orders">
                                全部订单
                            </a>
                        </li>
                    </div>
                </ul>
                <section class="header_section_2 orderCnt">
                    <ul>
                        <li>
                            <a href="<?php echo U('Home/Order/unpayedOrderList');?>">
                                <span data-tip="0">&nbsp;</span>

                                <p>待支付</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Home/Order/payedOrderList');?>">
                                <span data-tip="0">&nbsp;</span>
                                <p>待发货</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Home/Order/deliveryOrderList');?>">
                                <span data-tip="0">&nbsp;</span>
                                <p>待收货</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Home/Order/completeOrderList');?>">
                                <span data-tip="0">&nbsp;</span>
                                <p>已完成</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo U('Home/Order/legalOrderList');?>">
                                <span data-tip="0">&nbsp;</span>
                                <p>维权中</p>
                            </a>
                        </li>

                    </ul>
                </section>
            </div>
        </header>

        <section class="body">
            <div class="div_section">
                <ul id="list_ul" class="list_ul">
                    <div style="margin:7px 0">
                        <li class="">
                            <a href="shouru.html" class="link_promote ">
                                <span class="">&nbsp;</span>我的推广
                                <label style="color:#999999">客户、订单</label>
                            </a>
                        </li>
                        <li class="">
                            <a href="mymoney.html" class="link_money ">
                                <span class="">&nbsp;</span>我的钱包
                                <label style="color:#999999">所有佣金</label>
                            </a>
                        </li>
                    </div>
                </ul>

                <ul id="list_ul" class="list_ul">
                    <div style="margin:7px 0">
                        <li class="">
                            <a href="jifen.html" class="link_integral ">
                                <span class="">&nbsp;</span>我的积分
                                <label style="color:#999999">小积分 抽大奖</label>
                            </a>
                        </li>
                        <li class="member">
                            <a href="<?php echo U('Home/Order/buyCar');?>" class="link_buycar ">
                                <span class="member">&nbsp;</span>购物车
                            </a>
                        </li>
                        <li class="member">
                            <a href="<?php echo U('Home/PersonalAddr/index');?>" class="link_address ">
                                <span class="member">&nbsp;</span>收货地址
                            </a>
                        </li>
                    </div>
                </ul>

                <ul id="list_ul" class="list_ul">
                    <div style="margin:7px 0">
                        <li class="">
                            <a href="" class="link_ranking ">
                                <span class="">&nbsp;</span>排行榜
                            </a>
                        </li>
                        <li class="">
                            <a href="<?php echo U('Home/Shop/question');?>" class="link_help ">
                                <span class="">&nbsp;</span>帮助中心
                            </a>
                        </li>
                    </div>
                </ul>
            </div>
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
    <?php if($goods == 'goods' ): ?><div data-role="widget" data-widget="">
            <div class="widget_wrap">
                <ul class="fixed_btn">
                    <ol id="fixed_btn" class="tbox" style="position: fixed;">
                        <li id="headerShopTu">
                            <div style="width: 45px">
                                <a href="<?php echo U('Home/Order/buyCar');?>" id="btn_link_shopcart" class="btn_add btn_add_shopcart" data-count="<?php echo ($carCount); ?>">&nbsp;</a>
                            </div>
                        </li>
                        <li>
                            <div class="box">
                                <div>
                                    <a href="javascript:void(0);" id="btn_add_shopcart" class="btn on">
                                        <label>加入购物车</label></a>
                                </div>
                                <div>
                                    <a href="javascript:void(0)" id="btn_buy" class="btn red on">
                                        <label>立刻购买</label></a>
                                </div>
                            </div>
                        </li>
                    </ol>
                </ul>
            </div>
        </div><?php endif; ?>
    <?php if($buyCar == 'buyCar' ): ?><div data-role="widget" data-widget="footer_sub_btn" class="footer_sub_btn">
            <div class="widget_wrap hidden" style="display:inherit;">
                <ul>
                    <ol class="tbox activity" style="visibility:hidden;">
                        <dd>
                            <label class="ng-binding">您可以参加活动</label> 
                        </dd>
                        <dd>
                            <label ng-show="activity.price_youhui" class="ng-binding ng-hide">已减 - ￥NaN</label>
                        </dd>
                    </ol>
                    <ol class="tbox">
                        <li>
                            <div class="price_des" id="price_des">
                                <p>总计<span class="price_total ng-binding">￥0.00</span></p>
                                <p class="ng-binding">(共<font class="cnt_total" style="color:#ff5366">0</font>件，不含运费)</p>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;" class="btn red" id="btn_buy">去结算</a>
                        </li>
                    </ol>
                </ul>
            </div>
        </div><?php endif; ?>
    <?php if($addr == 'addr' ): ?><div class="div_section_btn footer_div_section_btn">
            <div class="widget_wrap">
                <ul>
                    <li style="margin-bottom:20px">
                        <a href="<?php echo U('Home/PersonalAddr/addAddr');?>" class="btn red" id="btn_addAddress" style="color:#FFFFFF">新增收货地址</a>
                    </li>
<!--                    <li>
                        <a href="javascript:;" onclick="getaddr();" class="btn red" id="btn_addAddress" style="color:#FFFFFF">使用微信收货地址</a>
                    </li>-->
                </ul>
            </div>
        </div><?php endif; ?>
</footer>
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
<script type='text/javascript'>
    $(function () {

    })
</script>
</body>
</html>