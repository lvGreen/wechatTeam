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
    <link href="/Public/Home/Css/address.css" rel="stylesheet">
    <script src="/Public/Home/Js/layer.js"></script>
    <link rel="stylesheet" href="/Public/Home/Css/layer.css" id="layui_layer_skinlayercss">
    <script src="/Public/Home/Js/hide.js"></script>
</head>
<body onselectstart="return true;" ondragstart="return false;">
    <div data-role="container" class="container my_address">
        <header data-role="header"></header>
        <section data-role="body" class="body">
            <?php if($addrList == '1001' ): ?><div style="width:100%; text-align:center; padding-top:80px; min-height:250px">
                    <img src="/Public/Home/Image/w_22.png" style="width:180px" />
                </div>
                <?php else: ?>
                <div>
                    <ul id="list_address" class="list_address on">
                        <?php if(is_array($addrList)): $i = 0; $__LIST__ = $addrList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li>
                                <a href="<?php echo U('Home/PersonalAddr/addAddr',array('addrId'=>$item['id']));?>">
                                    <label class="tbox" data-default="">
                                        <div>
                                            <p><label>姓名</label>&nbsp;<?php echo ($item["receive_name"]); ?></p>
                                            <p><label>电话</label>&nbsp;<?php echo ($item["phone"]); ?></p>		
                                            <p><label>地址</label>&nbsp;<?php echo ($item["privince"]); ?> <?php echo ($item["city"]); ?> <?php echo ($item["town"]); ?> <?php echo ($item["address"]); ?></p>
                                        </div>
                                        <div>
                                            <p style="width:60px;">&nbsp;</p>
                                        </div>								
                                    </label>								
                                </a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div><?php endif; ?>
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
        $("input[type='radio'][name='radAddress']").click(function () {
            window.location.href = $('#bu').val() + '&addr=' + $(this).val();
        });
    });

    function getaddr() {
        WeixinJSBridge.invoke(
                'editAddress',
                {
                    "appId": "wx0cd0ce55d9b28144",
                    "scope": "jsapi_address",
                    "signType": "sha1",
                    "addrSign": "b03a25d619d8701a7a00d60451e6e7cc3ab443e4",
                    "timeStamp": "1442803064",
                    "nonceStr": "123456"
                },
        function (res) {
            var msg = res.err_msg;
            var arr = msg.split(':');
            if (arr[1] == 'ok') {
                layer.load(2);
                $.post("/vshop/editAddress", {
                    from: "weixin",
                    name: res.userName,
                    tel: res.telNumber,
                    province: res.proviceFirstStageName,
                    city: res.addressCitySecondStageName,
                    area: res.addressCountiesThirdStageName,
                    address: res.addressDetailInfo,
                }, function (data) {
                    if (data.status == -1) {
                        layer.closeAll('loading');
                        layer.msg(data.msg);
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    } else if (data.status == 0) {
                        layer.closeAll('loading');
                        layer.msg(data.msg);
                    } else if (data.status == 1) {
                        setTimeout(function () {
                            window.location.reload();
                        }, 1000);
                    }
                }, "json");
            }
        }
        );
    }
</script>
</body>
</html>