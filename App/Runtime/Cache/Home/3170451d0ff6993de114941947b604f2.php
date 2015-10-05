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
    <link href="/Public/Home/Css/addressEdit.css" rel="stylesheet">
    <link rel="stylesheet" href="/Public/Home/Css/layer.css" id="layui_layer_skinlayercss">

    <script src="/Public/Home/Js/region.js"></script>
    <script src="/Public/Home/Js/layer.js"></script>
    <script src="/Public/Home/Js/jquery.form.js"></script>
    <script src="/Public/Home/Js/address_edit.js"></script>
    <script src="/Public/Home/Js/hide.js"></script>
</head>
<body onselectstart="return true;" ondragstart="return false;">
    <div data-role="container" class="container my_addressEdit">
        <section data-role="body" class="body">
            <div class="div_section">
                <form id="form_list_address">
                    <ul id="list_address_edit" class="list_address_edit">
                        <input type="hidden" name="id" value="<?php echo ($addrDetail["id"]); ?>">
                        <input type="hidden" name="type" value="<?php echo ($type); ?>">
                        <li>
                            <div>
                                <input type="text" maxlength="50" id="name" name="name" value="<?php echo ($addrDetail["receive_name"]); ?>" placeholder="姓名">
                            </div>
                        </li>
                        <li>
                            <div>
                                <input type="text" id="tel" name="tel" value="<?php echo ($addrDetail["phone"]); ?>" placeholder="电话" maxlength="20">
                            </div>
                        </li>
                        <li>
                            <div class="address_select">
                                <select name="province" placeholder="省份">
                                    <?php if($addrDetail['privince'] == '' ): ?><option value="北京市">北京市</option>
                                    <?php else: ?>
                                        <option value="<?php echo ($addrDetail['privince']); ?>"><?php echo ($addrDetail['privince']); ?></option><?php endif; ?>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="address_select">
                                <select name="city" placeholder="城市">
                                    <?php if($addrDetail['city'] == ''): ?><option value="市辖区">市辖区</option>
                                        <option value="市辖县">市辖县</option>
                                    <?php else: ?>
                                        <option value="<?php echo ($addrDetail["city"]); ?>"><?php echo ($addrDetail["city"]); ?></option><?php endif; ?>
                                </select>
                            </div>
                        </li>
                        <li>
                            <div class="address_select">
                                <select name="area" placeholder="区县">
                                    <?php if($addrDetail['town'] == ''): ?><option value="东城区">东城区</option>
                                    <?php else: ?>
                                        <option value="<?php echo ($addrDetail["town"]); ?>"><?php echo ($addrDetail["town"]); ?></option><?php endif; ?>
                                </select>
                            </div>
                            <script type="text/javascript">
                                new PCAS('province', 'city', 'area', '', '', '');
                            </script>
                        </li>
                        <li>
                            <div>
                                <input type="text" id="address" name="address" value="<?php echo ($addrDetail["address"]); ?>" placeholder="详细地址" maxlength="50">
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
            <div class="div_section_btn">
                <ul>
                    <li>
                        <a href="javascript:void(0);" class="btn red" id="btn_save_address">保存</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" onclick="history.back();" class="btn btn_cancel" id="btn_cancel_address">取消</a>
                    </li>
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
</body>
</html>