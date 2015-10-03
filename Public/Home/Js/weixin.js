// JavaScript Document

document.write("<script src=\"http://res.wx.qq.com/open/js/jweixin-1.0.0.js\"></script>"); 

var weixin = function(o){
	wx.config({
		debug: false,
		appId: o.appId,
		timestamp: o.timestamp,
		nonceStr: o.nonceStr,
		signature: o.signature,
		jsApiList: [
			'checkJsApi',
			'onMenuShareTimeline',
			'onMenuShareAppMessage',
			'onMenuShareQQ',
			'onMenuShareWeibo',
			'hideMenuItems',
			'showMenuItems',
			'hideAllNonBaseMenuItem',
			'showAllNonBaseMenuItem',
			'translateVoice',
			'startRecord',
			'stopRecord',
			'onRecordEnd',
			'playVoice',
			'pauseVoice',
			'stopVoice',
			'uploadVoice',
			'downloadVoice',
			'chooseImage',
			'previewImage',
			'uploadImage',
			'downloadImage',
			'getNetworkType',
			'openLocation',
			'getLocation',
			'hideOptionMenu',
			'showOptionMenu',
			'closeWindow',
			'scanQRCode',
			'chooseWXPay',
			'openProductSpecificView',
			'addCard',
			'chooseCard',
			'openCard'
		]
	});
	
	wx.ready(function () {
		// 1 判断当前版本是否支持指定 JS 接口，支持批量判断
		wx.checkJsApi({
			jsApiList: [
				'getNetworkType',
				'previewImage'
			],
			success: function (res) {
				// alert(JSON.stringify(res));
				// alert('bbb');
			}
		});
		
		// 2. 分享接口
		// 2.1 监听“分享给朋友”，按钮点击、自定义分享内容及分享结果接口
		wx.onMenuShareAppMessage({
			title: o.title,
			desc: o.desc,
			link: o.link,
			imgUrl: o.img,
			trigger: function (res) {
				// alert('用户点击发送给朋友');
			},
			success: function (res) {
				// alert('已分享');
			},
			cancel: function (res) {
				// alert('已取消');
			},
			fail: function (res) {
				// alert(JSON.stringify(res));
			}
		});
		// 2.2 监听“分享到朋友圈”按钮点击、自定义分享内容及分享结果接口
    	wx.onMenuShareTimeline({
      		title: o.title,
      		link: o.link,
      		imgUrl: o.img,
      		trigger: function (res) {
        		// alert('用户点击分享到朋友圈');
      		},
		  	success: function (res) {
				// alert('已分享');
		  	},
		  	cancel: function (res) {
				//alert('已取消');
		  	},
		  	fail: function (res) {
				// alert(JSON.stringify(res));
		  	}
		});
		// 2.3 监听“分享到QQ”按钮点击、自定义分享内容及分享结果接口
		wx.onMenuShareQQ({
			title: o.title,
		  	desc: o.desc,
		  	link: o.link,
		  	imgUrl: o.img,
		  	trigger: function (res) {
				// alert('用户点击分享到QQ');
		  	},
		  	complete: function (res) {
				// alert(JSON.stringify(res));
		  	},
			success: function (res) {
				// alert('已分享');
		  	},
		  	cancel: function (res) {
				// alert('已取消');
		  	},
		  	fail: function (res) {
				// alert(JSON.stringify(res));
		  	}
		});
		// 2.4 监听“分享到微博”按钮点击、自定义分享内容及分享结果接口
    	wx.onMenuShareWeibo({
			title: o.title,
		  	desc: o.desc,
		  	link: o.link,
		  	imgUrl: o.img,
		  	trigger: function (res) {
				// alert('用户点击分享到微博');
		  	},
		  	complete: function (res) {
				// alert(JSON.stringify(res));
		  	},
		  	success: function (res) {
				// alert('已分享');
		  	},
		  	cancel: function (res) {
				// alert('已取消');
		  	},
		  	fail: function (res) {
				// alert(JSON.stringify(res));
		  	}
		});
		
		// 3 智能接口
  		var voice = {
    		localId: '',
    		serverId: ''
  		};
  		// 3.1 识别音频并返回识别结果
   		if (voice.localId == '') {
      		//alert('请先使用 startRecord 接口录制一段声音');
      		return;
    	}
    	wx.translateVoice({
      		localId: voice.localId,
     		 complete: function (res) {
        		if (res.hasOwnProperty('translateResult')) {
          			alert('识别结果：' + res.translateResult);
        		} else {
          			alert('无法识别');
        		}
			}
		});
		
	});
	
	wx.error(function (res) {
	  //alert(res.errMsg);
	});
}







