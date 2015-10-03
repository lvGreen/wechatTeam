
$(function(){
	
	// 显示“顶部”按钮
	window.onscroll=function(){
		if(document.body.scrollTop||document.documentElement.scrollTop>0){
			document.getElementById('tools_widget_goTop').style.display="block"
		}else{
			document.getElementById('tools_widget_goTop').style.display="none"
		}
	}

	// 返回顶部
	$("#tools_widget_goTop").click(function(){
		$('body,html').animate({scrollTop:0},300);
	});
	
});


