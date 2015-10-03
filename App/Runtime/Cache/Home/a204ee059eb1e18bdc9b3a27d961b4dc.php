<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
    <link href="/Public/Home/Css/detail.css" rel="stylesheet" />
    <script src="/Public/Home/Js/swipe_min.js"></script>
    <script src="/Public/Home/Js/layer.js"></script>
    <link rel="stylesheet" href="/Public/Home/Js/skin/layer.css" id="layui_layer_skinlayercss" />
    <script src="/Public/Home/Js/jquery.form.js"></script>
    <script src="/Public/Home/Js/fly.js"></script>
    <script src="/Public/Home/Js/detail.js"></script>
</head>
<body onselectstart="return true;" ondragstart="return false;">
    <input type="hidden" id="onePercent" value="">
        <div data-role="container" class="container detail3">
            <header data-role="header">
                <div data-role="widget" data-widget="slider_3" class="slider_3">
                    <li style="vertical-align: top;">
                        <a data-fx="Modulefx" href="javascipt:void(0)">
                            <img style="max-height:40%; width:100%" src="<?php echo getUploadUrl($goodsInfo['small_img']);?>" />
                        </a>
                    </li>
                </div>
            </header>

            <section data-role="body" class="body" style="min-height: 448px;">
                <!--基本信息-->
                <div class="section_body info_basic">
                    <div>
                        <ul>
                            <li>
                                <div class="tbox title_and_fav">
                                    <div id="label_title" class="title" style="width: 100%;"><?php echo ($goodsInfo["title"]); ?></div>
                                </div>
                                <div class="tbox price_and_fav price_and_sale">
                                    <div>
                                        <div class="price">
                                            <p>
                                                商城价：<span id="label_price"><label>¥ <?php echo ($goodsInfo["price"]); ?></label></span>
                                            </p>
                                            <p style="margin-top:-5px;">
                                                <span class="">原价：￥<span id="label_price_original"><label><?php echo ($goodsInfo["market_price"]); ?></label></span></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <p class="freight">销量&nbsp;&nbsp;151件</p>
                            </li>
                            <!--规格 start-->
                            <input type="hidden" id="gid" value="15" />
                            <input type="hidden" name="specifications" />
                            <li id="list_sku_number">
                                <table id="table_number" class="table_number">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label style="white-space: pre;">数量</label>
                                            </td>
                                            <td>
                                                <div class="box">
                                                    <div>
                                                        <input type="button" value="-" class="reduce">
                                                    </div>
                                                    <div>
                                                        <input type="number" value="1" id="sku_number" maxlength="2">
                                                    </div>
                                                    <div>
                                                        <input type="button" value="+" class="plus">
                                                    </div>
                                                </div>
                                                <textarea style="display:none" id="specifications"></textarea>
                                            </td>
                                            <td class="td_sku_inventory">
                                                <label id="sku_inventory" class="sku_inventory">(剩余<font id="allCnt">88503</font>)</label>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>                        
                        </ul>
                    </div>
                </div>
                <!--参数&详情 start-->
                <div class="section_body info_detail">
                    <div>
                        <div id="div_nav_fixed" style="position: relative; z-index: 0; top: 0px; width: 100%; background-color: rgb(255, 255, 255);">
                            <div id="div_nav" class="div_nav">
                                <ul class="box">
                                    <li data-idx="0">
                                        <a href="javascript:;" class="">商品属性</a>
                                    </li>
                                    <li data-idx="1">
                                        <a href="javascript:;" class="on">图文详情</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="div_sections" class="div_sections">
                            <section class="section_specification">
                                <dl>
                                    <div>
                                        <dd>
                                            <label>产区</label><label>朗格多克</label>
                                        </dd>
                                        <dd>
                                            <label>级别</label><label>AOP</label>
                                        </dd>
                                        <dd>
                                            <label>年份</label><label>2013年</label>
                                        </dd>
                                        <dd>
                                            <label>产地</label><label>法国</label>
                                        </dd> 
                                    </div>
                                </dl>
                            </section>
                            <section class="section_detail on" data-role="widget" data-widget="img_prev_view">
                                <!-- 商品详情 -->
                                <p>
                                    <img src="./photos/20150717161626_16505.jpg" width="100%" height="40%" alt=""> 
                                </p>
                                <p style="text-align:center;">
                                    <img src="./photos/20150717161626_16505.jpg" width="100%" height="40%" alt=""> 
                                </p>
                                <p>
                                    <img src="./photos/20150717161626_16505.jpg" width="100%" height="40%" alt=""> 
                                </p>
                                <p>
                                    <img src="./photos/20150717161626_16505.jpg" width="100%" height="40%" alt=""> 
                                </p>
                                <p>
                                    <img src="./photos/20150717161626_16505.jpg" width="100%" height="40%" alt="">
                                </p>
                                <p>
                                    <img src="./photos/20150717161626_16505.jpg" width="100%" height="40%" alt="">  
                                </p>                        
                            </section>
                        </div>
                    </div>
                </div>
                <!--参数&详情 end-->
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
        
</body>
</html>