<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>微信分销后台管理系统V5.1.3</title>
        <link type="text/css" rel="stylesheet" href="/Public/Store/Css/style.css" media="all" />
        <link type="text/css" rel="stylesheet" href="/Public/Store/Css/order_remind.css" media="all" />
        <link type="text/css" rel="stylesheet" href="/Public/Store/Css/content.css" media="all" />
        <link type="text/css" rel="stylesheet" href="/Public/Store/Css/jquery_dialog.css" media="all" />
        <script src="/Public/Store/JS/jquery-1.8.2.min.js"></script></script>
    </head>
    <body>
        <div id="mainss" class="main" style="height:auto; padding-top:1px;">
            <style type="text/css">
                .subcates{ margin:0px ; padding:0px;}
                .subcates li{ width:150px;  height:30px; border:1px solid #ccc; background-color:#ededed; line-height:30px; float:left; text-align:center; position:relative}
                .subcates li a{ display:block}
                .subcates li:hover dl{ display:block}
                .subcates li dl{ width:150px; height:300px; overflow-x:hidden; overflow-y:scroll; position:absolute; left:0px; top:15px; background-color:#fff; z-index:9999; border:1px solid #ededed; display:none; padding-left:2px; padding-right:2px}
                .subcates li dd{ text-align:left; margin:0px; padding:0px; height:26px; line-height:26px; cursor:pointer}
                .subcates li dd a{ display:block;}
                .subcates li dd:hover{ background-color:#ededed}
                .subcates li dd.dd2{ padding-left:8px;}
            </style>
            <div class="contentbox">
                <form id="form1" name="form1" method="post" action="">
                    <table cellspacing="2" cellpadding="5" width="100%">
                        <tr>
                            <th colspan="2" align="left">添加商品分类</th>
                        </tr>
                        <tr>
                            <td class="label" width="150">分类名称:</td>
                            <td><input name="cat_name" id="cat_name"  maxlength="60" size="30" value="" type="text"><span class="require-field">*</span><span class="cat_name_mes"></span></td>
                        </tr>
                        <tr>
                            <td class="label">分类标题:</td>
                            <td><input name="cat_title"  size="50" value="" type="text" /></td>
                        </tr>
                        <tr>
                            <td class="label">分类广告:</td>
                            <td>
                                <input name="cat_img" id="cateimg" type="file" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td class="label">分类图标:</td>
                            <td>
                                <input name="cat_icon" id="cateicon" type="file" value="" />
                            </td>
                        </tr>
                        <tr>
                            <td class="label">上级分类:</td>
                            <td>
                                <select name="parent_id" id="parent_id">
                                    <option value="0">顶级分类</option>
                                    <option value="592"  >绿叶</option>
                                    <option value="593"  >法国蒂蓉</option>
                                    <option value="594"  >会员等级</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="label">排序:</td>
                            <td><input name="sort_order" maxlength="60" size="50" value="50" type="text"></td>
                        </tr>
                        <tr>
                            <tr>
                                <td class="label">是否启用:</td>
                                <td>
                                    <label><input name="is_show" value="1" checked="checked" type="radio" /> 是 </label>
                                    <label><input name="is_show" value="0" type="radio" /> 否     </label>  
                                </td>
                            </tr>
                            <tr>
                                <td class="label">Meta关键字:</td>
                                <td><input name="keywords" maxlength="60" size="50" value="" type="text" />
                                    <br /><span style="display: block;" id="notice_keywords">关键字为选填项，其目的在于方便外部搜索引擎搜索</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="label">Meta描述:</td>
                                <td><textarea name="cat_desc" cols="60" rows="4"></textarea></td>
                            </tr>
                            <tr>
                                <td class="label">&nbsp;</td>
                                <td align="left"><br>
                                        <input class="new_save" value=" 确定 " type="submit" />
                                        <input class="button" value=" 重置 " type="reset" />
                                </td>
                            </tr>
                    </table>
                </form>
            </div>
    </body>
</html>