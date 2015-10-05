var $_s = 0;

$(function () {
    loadMoney();

    // 加载收货人信息
    /*$.get("/vshop/defaultAddr", {addr_id:$("#addr_id").val()}, function(data){
     var info = "暂无收货地址";
     if(data.status == 1) {
     info = '<p><span><label>收货人：</label>'+data.data.linkname+'</span><span class="fr">'+data.data.phone+'</span></p><p>'+data.data.province+' '+data.data.city+' '+data.data.county+' '+data.data.address+'</p>';	
     }
     $(".section_address").show();
     $(".show_address").html(info);
     
     $("input[type='hidden'][name='linkname']").val(data.data.linkname);
     $("input[type='hidden'][name='phone']").val(data.data.phone);
     $("input[type='hidden'][name='province']").val(data.data.province);
     $("input[type='hidden'][name='city']").val(data.data.city);
     $("input[type='hidden'][name='county']").val(data.data.county);
     $("input[type='hidden'][name='address']").val(data.data.address);
     }, "json");*/

    // 运送方式显示与隐藏
    $(".freightChoose").click(function () {
        if ($(this).hasClass("on")) {
            $(this).removeClass("on");
            $(".list_transport").removeClass("on");
        }
        else {
            $(this).addClass("on");
            $(".list_transport").addClass("on");
        }
    });

    // 运送方式选择
    $("input[type='radio'][name='transport']").change(function () {
        $(".list_transport").removeClass("on");
        $(".freightChoose").removeClass("on");

        $(".delivery").html($(this).parent().parent().find(".listTrans").html());
        $(".freight").html($(this).parent().parent().find(".listPrice").html());

        $("input[name='freight']").val($(this).parent().parent().find(".listPrice").html());

        loadMoney();
    });

    // 提交订单
    $(".createOrder").click(function () {
        var addrId = $('input[name=addr_id]').val();
        if (addrId == '') {
            layer.msg("请选择收货地址信息");
            return false;
        }
        var obj = this;
        if ($_s != 0){
            return false;
        }
        $_s = 1;
        $(obj).css("background-color", "silver");
        $('#form1').ajaxSubmit({
            url: "/index.php?m=Home&c=Order&a=addOrder",
            type: "POST",
            dataType: 'json',
            success: function (data, st) {
                data = eval(data);
                if(data['error'] == '0'){
                    layer.msg(data['msg']);
                }else{
                    layer.msg(data['msg']);
                }
                $_s = 0;
                $(obj).css("background-color", "");
            }
        });
    });
});

// 计算商品总信息
function loadMoney() {
    var allPrice = 0, allCnt = 0;
    $(".list_goods li").each(function () {
        $_price = parseFloat($(this).find(".onePrice").html());
        $_cnt = parseInt($(this).find(".count").html());

        allPrice += $_price * $_cnt;
        allCnt += $_cnt;
    });
    allPrice += parseFloat($(".freight").html());

    $(".allPrice").html(allPrice.toFixed(2));
    $(".allPrice0").html(allPrice.toFixed(2));
    $(".freight0").html($(".freight").html());
    $(".allCnt").html(allCnt);
}