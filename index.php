<?php
define(APPID, "wx96bfa7c4e7c79526");
define(SECRET, "40db16a9e46dc3ba386bae7a3a4911b1");
require_once "back_api/jssdk.php";
$jssdk = new JSSDK(APPID, SECRET);
$signPackage = $jssdk->GetSignPackage();
$access_token=$jssdk->getAccessToken();


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1">
    <title><?php echo $arr['nickname']; ?>的真心话大挑战💌</title>
    <style>
    	.loading{
			  position: absolute;
			  z-index: 1;
			  top:0;
			  left: 0;
			  right: 0;
			  bottom: 0;
			  background-color: #666;
			}
			.loading-words{
				position: absolute;
				top: 30%;
				color: #fff;
				text-align: center;
				font-size: 26px;
				width: 100%;
			}
			.heart {
			  position: absolute;
			  width: 100px;
			  height: 90px;
			  top: 50%;
			  left: 50%;
			  margin-top: -45px;
			  margin-left: -50px;
			}
			.heart:before,
			.heart:after {
			  position: absolute;
			  content: "";
			  left: 50px;
			  top: 0;
			  width: 50px;
			  height: 80px;
			  background: #fc2e5a;
			  border-radius: 50px 50px 0 0;
			  -webkit-transform: rotate(-45deg);
			  -o-transform: rotate(-45deg);
			  -ms-transform: rotate(-45deg);
			  -moz-transform: rotate(-45deg);
			  -webkit-transform-origin: 0 100%;
			  -o-transform-origin: 0 100%;
			  -ms-transform-origin: 0 100%;
			  -moz-transform-origin: 0 100%;
			}
			.heart:after {
			  left: 0;
			  -webkit-transform: rotate(45deg);
			  -o-transform: rotate(45deg);
			  -ms-transform: rotate(45deg);
			  -moz-transform: rotate(45deg);
			  -webkit-transform-origin :100% 100%;
			  -o-transform-origin :100% 100%;
			  -ms-transform-origin :100% 100%;
			  -moz-transform-origin :100% 100%;
			}
			.heart1{
			   animation: heart-anim 1s linear .4s infinite;
			   -webkit-animation: heart-anim 1s linear .4s infinite;
			   -o-animation: heart-anim 1s linear .4s infinite;
			   -ms-animation: heart-anim 1s linear .4s infinite;
			   -moz-animation: heart-anim 1s linear .4s infinite;
			}
			.heart2{
			   animation: pounding .5s linear infinite alternate;
			   -webkit-animation: pounding .5s linear infinite alternate;
			   -o-animation: pounding .5s linear infinite alternate;
			   -ms-animation: pounding .5s linear infinite alternate;
			   -moz-animation: pounding .5s linear infinite alternate;
			}
			.heart1:after, .heart1:before{
			  background-color: #ff7693;
			}

			@keyframes pounding{
			  0%{ transform: scale(1.5); }
			  100%{ transform: scale(1); }
			}
			@-webkit-keyframes pounding{
			  0%{ -webkit-transform: scale(1.5); }
			  100%{ -webkit-transform: scale(1); }
			}
			@-o-keyframes pounding{
			  0%{ -o-transform: scale(1.5); }
			  100%{ -o-transform: scale(1); }
			}
			@-ms-keyframes pounding{
			  0%{ -ms-transform: scale(1.5); }
			  100%{ -ms-transform: scale(1); }
			}
			@-moz-keyframes pounding{
			  0%{ -moz-transform: scale(1.5); }
			  100%{ -moz-transform: scale(1); }
			}
			@-webkit-keyframes heart-anim {
			  46% {

			    -webkit-transform: scale(1);
			  }
			  50% {
			    -webkit-transform: scale(1.3);
			  }
			  52% {
			    -webkit-transform: scale(1.5);
			  }
			  55% {
			    -webkit-transform: scale(3);
			  }
			  100% {
			    opacity: 0;
			    -webkit-transform: scale(50);
			  }
			}
			@-o-keyframes heart-anim {
			  46% {

			    -o-transform: scale(1);
			  }
			  50% {
			    -o-transform: scale(1.3);
			  }
			  52% {
			    -o-transform: scale(1.5);
			  }
			  55% {
			    -o-transform: scale(3);
			  }
			  100% {
			    opacity: 0;
			    -o-transform: scale(50);
			  }
			}
			@-moz-keyframes heart-anim {
			  46% {
			    -moz-transform: scale(1);
			  }
			  50% {
			    -moz-transform: scale(1.3);
			  }
			  52% {
			    -moz-transform: scale(1.5);
			  }
			  55% {
			    -moz-transform: scale(3);
			  }
			  100% {
			    opacity: 0;
			    -moz-transform: scale(50);
			  }
			}
			@-ms-keyframes heart-anim {
			  46% {

			    -ms-transform: scale(1);
			  }
			  50% {
			    -ms-transform: scale(1.3);
			  }
			  52% {
			    -ms-transform: scale(1.5);
			  }
			  55% {
			    -ms-transform: scale(3);
			  }
			  100% {
			    opacity: 0;
			    -ms-transform: scale(50);
			  }
			}
			@keyframes heart-anim {
			  46% {

			    transform: scale(1);
			  }
			  50% {
			    transform: scale(1.3);
			  }
			  52% {
			    transform: scale(1.5);
			  }
			  55% {
			    transform: scale(3);
			  }
			  100% {
			    opacity: 0;
			    transform: scale(50);
			  }
			}
    </style>
  <link href=./static/css/app.ce2f902194e1f25739ab97b55fa9e324.css rel=stylesheet></head><body><div id=app></div><div id=loading-box class=loading><div class=loading-words>11.11快乐</div><div class="heart heart1"></div><div class="heart heart2"></div></div><script type=text/javascript src=./static/js/manifest.cdcc9ee8e64ef55a4fa2.js></script><script type=text/javascript src=./static/js/vendor.4b6b78edb1472feb3037.js></script><script type=text/javascript src=./static/js/app.5e23c80c21e2f15fb6f0.js></script></body>
  
  <script>
  	setTimeout(function(){
  		document.getElementById("loading-box").style.display='none'
  	},3500)
  </script>

  <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
	wx.config({
    debug: false,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // 所有要调用的 API 都要加到这个列表中
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
		var headimgurl
  	var nickname
		headimgurl=document.querySelector('.-img').src
  	nickname=document.querySelector('.headimg .-nickname').innerHTML
  	document.title=nickname+"的真心话大挑战💌"

    // 在这里调用 API
    wx.onMenuShareTimeline({
	    title: nickname+'接受了真心话挑战，匿名提问，表白也行哈哈~你敢问我就敢答', // 分享标题
	    link: 'http://item.redream.cn/truthmoment/index.html?id=<?php echo $id;?>&userid=<?php echo $arr["openid"];?>', // 分享链接
	    imgUrl: headimgurl, // 分享图标
	    success: function () { 
	        // 用户确认分享后执行的回调函数
	    },
	    cancel: function () { 
	        // 用户取消分享后执行的回调函数
	    }
	});
	wx.onMenuShareAppMessage({
	    title: '<?php echo $arr["nickname"]."接受了真心话挑战，匿名提问，表白也行哈哈~你敢问我就敢答"; ?>', // 分享标题
	    desc: '真心话大挑战，你敢应战否？', // 分享描述
	    link: 'http://item.redream.cn/truthmoment/index.html?id=<?php echo $id;?>&userid=<?php echo $arr["openid"];?>', // 分享链接
	    imgUrl: headimgurl, // 分享图标
	    type: '', // 分享类型,music、video或link，不填默认为link
	    dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
	    success: function () { 
	        // 用户确认分享后执行的回调函数
	    },
	    cancel: function () { 
	        // 用户取消分享后执行的回调函数
	    }
	});
	wx.onMenuShareQQ({
	    title: nickname+'接受了真心话挑战，匿名提问，表白也行哈哈~你敢问我就敢答', // 分享标题
	    desc: '真心话大挑战，你敢应战否？', // 分享描述
	    link: 'http://item.redream.cn/truthmoment/index.html?id=<?php echo $id;?>&userid=<?php echo $arr["openid"];?>', // 分享链接
	    imgUrl: headimgurl, // 分享图标
	    success: function () { 
	       // 用户确认分享后执行的回调函数
	    },
	    cancel: function () { 
	       // 用户取消分享后执行的回调函数
	    }
	});
	wx.onMenuShareWeibo({
	    title: nickname+'接受了真心话挑战，匿名提问，表白也行哈哈~你敢问我就敢答', // 分享标题
	    desc: '真心话大挑战，你敢应战否？', // 分享描述
	    link: 'http://item.redream.cn/truthmoment/index.html?id=<?php echo $id;?>&userid=<?php echo $arr["openid"];?>', // 分享链接
	    imgUrl: headimgurl, // 分享图标
	    success: function () { 
	       // 用户确认分享后执行的回调函数
	    },
	    cancel: function () { 
	        // 用户取消分享后执行的回调函数
	    }
	});
	wx.onMenuShareQZone({
	    title: nickname+'接受了真心话挑战，匿名提问，表白也行哈哈~你敢问我就敢答', // 分享标题
	    desc: '真心话大挑战，你敢应战否？', // 分享描述
	    link: window.location.href, // 分享链接
	    imgUrl: headimgurl, // 分享图标
	    success: function () { 
	       // 用户确认分享后执行的回调函数
	    },
	    cancel: function () { 
	        // 用户取消分享后执行的回调函数
	    }
	});
  });
</script>
  <script>
	<!-- //百度统计 -->
	var _hmt = _hmt || [];
	(function() {
	  var hm = document.createElement("script");
	  hm.src = "//hm.baidu.com/hm.js?f2cc571993a81df123eaa6ef3a5be7c5";
	  var s = document.getElementsByTagName("script")[0]; 
	  s.parentNode.insertBefore(hm, s);
	})();
</script>
</html>
