<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN" ng-app="WmallAPP" class="ng-scope">
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
        <link href="/Public/Home/Css/shopcart.css" rel="stylesheet">
        <script src="/Public/Home/Js/layer.js"></script>
        <link rel="stylesheet" href="/Public/Home/Css/layer.css" id="layui_layer_skinlayercss">
        <script src="/Public/Home/Js/car.js"></script>
        <script src="/Public/Home/Js/hide.js"></script>

    </head>
    <body onselectstart="return true;" ondragstart="return false;" ng-controller="shopcart_Controller" class="ng-scope">
        <div data-role="container" class="container shopcart">
            <section data-role="body" class="body" style="min-height: 497px;">
                <div class="section_goods _goods ">
                    <form id="form_shopcart_list" method="post" class="ng-pristine ng-valid">
                        <div class="shopcart_list_header ng-scope" style="position:fixed; top:0; left:0; background-color:#CCCCCC; z-index:99">
                            <li class="tbox">
                                <div class="selAll">
                                    <span class="input_wrap">
                                        <div id="checkAll" class="radio " ng-checked=""></div>
                                    </span>
                                </div>
                                <div style="width:100%;">
                                    <label>全选</label>
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="icon_del" id="delGoods">&nbsp;</a>
                                </div>
                            </li>
                        </div>
                        <ul id="shopcart_list_body" class="shopcart_list_body list_goods" style="margin-top:45px">
                            <?php if(is_array($carList)): $i = 0; $__LIST__ = $carList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="ng-scope">
                                <div class="tbox">
                                    <div class="ng-scope one_data">
                                        <span>
                                            <div ng-checked="" name="goods_id" value="<?php echo ($item["id"]); ?>" class="radio"></div>
                                            <input type="checkbox" style="display:none;" name="car[]" value="<?php echo ($item["id"]); ?>">
                                        </span>
                                    </div>
                                    <div>
                                        <a href="#">
                                            <span class="img_wrap">
                                                <img src="<?php echo getUploadUrl($item['small_img']);?>" />
                                            </span>
                                        </a>
                                    </div>
                                    <div>
                                        <p class="title ng-binding"><a href="<?php echo U('Home/Goods/goodsDetail',array('code'=>$item['goods_code']));?>"><?php echo ($item["title"]); ?></a></p>
                                        <p class="price ng-binding">￥ <?php echo ($item["price"]); ?></p>
                                        <p class="ng-binding"></p>
                                        <dl class="ng-scope">
                                            <dd>
                                                <a href="javascript:;" class="reduce">&nbsp;</a>
                                            </dd>
                                            <dd>
                                                <input type="text" name="sum" value="<?php echo ($item["count"]); ?>" readonly="true">
                                            </dd>
                                            <dd>
                                                <a href="javascript:;" class="plus">&nbsp;</a>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </form>
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
                        <a href="addAddr.html" class="btn red" id="btn_addAddress" style="color:#FFFFFF">新增收货地址</a>
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
    </body>
        </html>