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
    <link href="/Public/Home/Css/order.css" rel="stylesheet">
    <script src="/Public/Home/Js/common.js"></script>
    <script src="/Public/Home/Js/jquery.form.js"></script>
    <script src="/Public/Home/Js/order_write.js"></script>
    <script src="/Public/Home/Js/layer.js"></script>
    <link rel="stylesheet" href="/Public/Home/Css/layer.css" id="layui_layer_skinlayercss">
    <script src="/Public/Home/Js/hide.js"></script>
</head>
<body onselectstart="return true;" ondragstart="return false;">
    <div data-role="container" class="container ordercreate2">
        <header data-role="header"></header>
        <section data-role="body" class="body" style="min-height: 591px;">
            <form id="form1">
                <?php if($addrInfo != '' ): ?><input type="hidden" id="addr_id" name='addr_id' value="<?php echo ($addrInfo["id"]); ?>">
                    <div class="section_address">
                        <div id="wrap_address">
                            <a href="<?php echo ($addrUrl); ?>" class="tbox arrow" name="addressedit">                            
                                <div><span class="icon_wrap icon_address">&nbsp;</span></div>                            
                                <div class="show_address">    
                                    <p>
                                        <span>
                                            <label>收货人：</label><?php echo ($addrInfo["receive_name"]); ?>
                                        </span>
                                        <span class="fr"><?php echo ($addrInfo["phone"]); ?></span>
                                    </p>
                                    <p><?php echo ($addrInfo["address"]); ?></p>
                                </div>                        
                            </a>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="section_address">
                        <div id="wrap_address">
                            <a href="<?php echo ($addrUrl); ?>" class="tbox arrow">                            
                                <div><span class="icon_wrap icon_address">&nbsp;</span></div>                            
                                <div class="show_address">    
                                    <p><span><label>添加收货地址</label></span></p>
                                </div>                        
                            </a>
                        </div>
                    </div><?php endif; ?>
                <div class="section_detail">
                    <div>
                        <header>
                            <p>
                                <label class="h8">购物清单</label>
                                <label class="label_amount_goods fr">共<font class="allCnt">1</font>件   ￥<font class="allPrice">468.00</font></label>
                            </p>
                        </header>
                        <ul class="list_goods">
                            <?php if(is_array($goodsInfo)): $i = 0; $__LIST__ = $goodsInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li>
                                    <a href="javascript:void(0);" class="tbox">
                                        <div>
                                            <span class="img_wrap">
                                                <img src="<?php echo getUploadUrl($item['small_img']);?>" />
                                            </span>
                                        </div>
                                        <div>
                                            <p class="title"><?php echo ($item["title"]); ?></p>
                                            <p class="price">
                                                ￥<font class="onePrice"><?php echo ($item["price"]); ?></font>&nbsp;*&nbsp;<font class="count"><?php echo ($item["count"]); ?></font></p>
                                            <p class=""></p>
                                        </div>
                                    </a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <header class="header_transport">
                            <a href="javascript:void(0);">
                                <label class="h8">运送方式</label>
                                <label class="fr">运费    ￥<font class="freight">0.00</font></label>
                            </a>
                        </header>
                        <!--促销活动-->
                        <div class="mark_msg">
                            <input type="text" name="remark" placeholder="备注" maxlength="200" />
                        </div>
                        <ul id="pay_list" class="pay_list on">
                            <li>
                                <label class="tbox">
                                    <div>
                                        <span class="pay_weipay">&nbsp;</span>
                                    </div>
                                    <div>
                                        <p>
                                            微信支付
                                        </p>
                                    </div>
                                    <div>
                                        <input type="hidden" name="paytype" value="0" rel="wechat" class="radio" checked="" />
                                    </div>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                    <div id="order_submit_1" class="section_price_and_pay align_center order_submit_1">
                        <p>总共支付   <span class="label_amount_total">￥<font class="allPrice0">468.00</font></span></p>
                        <p class="p_delivery_fee">（含运费￥<font class="freight0">0.00</font>）</p>
                        <p>
                            <span>
                                <a href="javascript:void(0);" class="btn red createOrder">订单支付</a>
                            </span>
                        </p>
                    </div>
                </div>
                <input type='hidden' name='orderType' value='<?php echo ($type); ?>' />
                <?php if($type == 'goods' ): ?><input type='hidden' name='goodsCode' value='<?php echo ($goodsInfo["0"]["goods_code"]); ?>' />
                    <input type='hidden' name='goodsCount' value='<?php echo ($goodsInfo["0"]["count"]); ?>' /><?php endif; ?>
            </form>
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
    </div>
</body>
</html>