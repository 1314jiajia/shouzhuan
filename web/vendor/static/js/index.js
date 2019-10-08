 window.onpageshow = function(event) {
	if(event.persisted) {
		window.location.reload()
	}
	//底部下载助手相关
	$(".index-bottom-guide-button-down").on("click", function() {
		sessionStorage.setItem('showBottom', 'down');
		$(".index-bottom-guide-fa").hide();
		if(is_safari()) {
			$(".add-to-desk-mask,.add-to-desk").show();
			$("body").addClass("no-scroll");
			$(".add-to-desk-mask").addClass("scroll-y");
		} else if(is_wechat()) {
			$(".open-safari").show();
		}
	});
	$(".index-bottom-guide-button-close").on("click", function() {
		sessionStorage.setItem('showBottom', 'close');
		$(".index-bottom-guide-fa").hide();
	});
	var showBottom = sessionStorage.getItem('showBottom');
	if(showBottom) {
		$(".index-bottom-guide-fa").hide();
	} else {
		// if(is_safari()) {
		// 	if(localStorage.getItem('firstCome') == 1) {
		// 		$(".index-bottom-guide-fa").show();
		// 	}
		// }else 
		if(is_android()){
			$(".index-bottom-guide-fa").hide();
		}
	}
	$(".add-desk,.open-safari").on("click", function() {
		$(".add-desk").hide();
		$(".open-safari").hide();
	});
	getBannerList();
	getAnnounce();
	addDesk();
	getPlatformList();
	readpackAli();
	switchSystemType();
	getWeather();
	
//	if(localStorage.getItem('firstCome') == 1 && !localStorage.getItem('joinTanrice')) {
//		if(localStorage.getItem('secondCome')){
//			joinTanrice();
//		}else{
//			localStorage.setItem('secondCome','2');
//		}
//	}
	
	$(".hongbao-button").click(function() {
		$(".hongbao-button").hide();
		$(".get-hongbao").show();
		$(".index-bottom-guide-fa").hide();
	});
	$(".hongbao-close").click(function() {
		$(".hongbao-button").show();
		$(".get-hongbao").hide();
		var showBottom2 = localStorage.getItem('showBottom') || sessionStorage.getItem('showBottom');
		if(showBottom2) {
			$(".index-bottom-guide-fa").hide();
		} else {
			// if(is_safari()) {
			// 	if(localStorage.getItem('firstCome') == 1) {
			// 		$(".index-bottom-guide-fa").show();
			// 	}
			// }
			if(is_android()){
				$(".index-bottom-guide-fa").hide();
			}
		}
	});
	
	$(".open-ali").click(function() {
		var share_schema = "alipay://";
		location.href = share_schema;
	})
	$(".shareHongbao").click(function() {
		clipboardHb()
	})
	
	$(".add-back").click(function() {
		$(".add-to-desk-mask,.add-to-desk").hide();
		$("body").removeClass("no-scroll");
	})
	if(is_android()){
		$(".index-bottom-guide-fa").hide();
	}
	
	
}

//轮播图列表
function getBannerList() {
	$.ajax({
		url: BANNER_LIST,
		contentType: "application/json",
		type: "get",
		data:{
			act:_act,
			type:systemType
		},
		dataType: 'json',
		success: function(res) {
			var data = res || {};
			$("#bannerList").html(template('t:bannerList', {
				list: data
			}));
			var mySwiper = new Swiper('.swiper-container', {
				loop: true,
				pagination: '.swiper-pagination',
				autoplay: 2000,
			});
		},
		error: function(res) {

		}
	});
}
//公告列表.首页正在试玩人数
function getAnnounce() {
	$.ajax({
		url: ANNOUNCE,
		contentType: "application/json",
		type: "get",
		data:{
			act:_act,
			type:systemType
		},
		dataType: 'json',
		success: function(res) {
			var data = res || {};
			var _scorll_text = "";
			for(var i = 0; i < data.text.length; i++) {
				_scorll_text += '<div class="scroll-auto scroll-text"'+i+'>'+data.text[i]+'</div>';
			}
			$('#scroll-text').html(_scorll_text);
			$('#checkPeopleNum').html(data.people_num);
			$('title').html(data.title);
			//$(".plate-name").html(data.title);
			$("#plate-ios-name").html(data.title);
			$("#plate-andr-name").html(data.android_title);
			
			var title = '';
			if(systemType == 'android'){
				title = data.android_title;
			}else{
				title = data.title;
			}
			$("#plate-item-name").html(title);
			$("#plate-item-name-show").html(title);
			//$('.add-titles,.add-icon-little-name').html(data.title);
			$('.add-titles,.add-icon-little-name').html(title);
		},
		error: function(res) {

		}
	});
}


//添加到桌面相关的信息
function addDesk() {
	$.ajax({
		url: ENTER_LIST,
		contentType: "application/json",
		type: "get",
		data:{
			act:_act,
			type:systemType
		},
		dataType: 'json',
		success: function(res) {
			var data = res || {};
			console.log(data);
			//alert(data.status);
			if(data.status=='1'){//2019/8/28
				$('.index-bottom-guide-fa').show();
					//底部的那一条
				$('#enterImg').attr("src", data.img);
				$('#enterTitle').html(data.title);
				$('#enterDiscribe').html(data.describe);
				$('.add-icon-img').attr("src", data.img);
				var _url = window.location.host;
				var _param = get_query_val("act");
				$('.add-link').html(_url+"/index.html?act="+_param);
				var _icon = '<link rel="apple-touch-icon" href="'+data.img+'" type="image/png">';
				var _icon2 = '<link rel="shortcut icon" href="'+data.img+'" type="image/png">';
				var _icon3 = '<link rel="apple-touch-icon" href="'+data.img+'">';
				var _icon4 = '<link rel="shortcut icon" href="'+data.img+'" type="image/x-icon">';
				$("head").append(_icon).append(_icon2).append(_icon3).append(_icon4);
			}else if(data.status=='0'){
				$('.index-bottom-guide-fa').hide();
				
			}

			 
			
		},
		error: function(res) {

		}
	});
}
//试玩平台列表
function getPlatformList() {
	$('.load').show();
	$.ajax({
		url: PLATFORM_LIST,
		contentType: "application/json",
		type: "get",
		data:{
			act:_act,
			type:systemType
		},
		dataType: 'json',
		success: function(res) {
			$('.load').hide();
			$('#platformList').html(template('t:platformList', {
				list: res
			}));
			//把第一个数据作为引导的内容
			var _fist_template = res[0] || {};
			var _guid_template = "";
			var _guid_lable = "";
			if(_fist_template.tagText != 0) {
				_guid_lable = '<div class="label label1 fs10">'+_fist_template.tagText+'</div>'
			}
			_guid_template = '<a class="platform-a" data-linkUrl="'+_fist_template.linkUrl+'" data-id="'+_fist_template.id+'" data-type="'+_fist_template.style+'">';
				_guid_template+='<div class="guide-index-item">';
				_guid_template	+='<div class="platform">';
				_guid_template	+=	'<div class="platform-icon">';
				_guid_template	+=		'<img src="'+_fist_template.img+'" />';
				_guid_template	+=	'</div>';
				_guid_template	+=	'<div class="platform-title">';
				_guid_template	+=		'<div class="platform-title-text fs16"><span class="platform-name">'+_fist_template.title+'</span>'+_guid_lable+'</div>';
				_guid_template	+=		'<div class="platform-title-intro fs13">'+_fist_template.describe+'</div>';
				_guid_template	+=	'</div>';
				_guid_template	+=	'<div class="platform-buttont fs13">去赚钱</div>';
				_guid_template	+='</div>';
				_guid_template+='</div>';
			_guid_template+='</a>';
			$(".guide-index-template").html(_guid_template);

			$(".platform").on("touchstart", function() {
				$(this).css("background-color", "#f5f5f5");
			});
			$(".platform").on("touchend", function() {
				$(this).css("background-color", "#fff");
			});
//			var _tm = `<a class="platform-a" data-linkUrl="tanrice.com/i/?10002" data-id="1">
//      				<div class="platform platform-ts">
//							<div class="platform-icon">
//								<img src="./img/icon.png" />
//							</div>
//							<div class="platform-title">
//								<div class="platform-title-text fs17"><span class="platform-name">探米试玩</span>
//									<div class="label label1 fs10">推荐</div>
//								</div>
//								<div class="platform-title-intro fs13">每单试玩奖励1.0到2.2元</div>
//							</div>
//							<div class="platform-buttont fs14 button-ts">去赚钱</div>
//							<div class="rt-icon"></div>
//						</div></a>`;
			//在第item下加一个探米
			var item = $(".index-list .platform");
			//          if(item.length<1){
			//          	$('#platformList').html(_tm);
			//          }else if(item.length<2){
			//          	item.eq(item.length-1).after(_tm);
			//          }else{
			//          	item.eq(1).after(_tm);
			//          }

			clickToPlatformDetail();
			//如果平台数量大于0，有可能要显示新手引导
			if(res.length > 0){sessionStorage.setItem('platformLength',true)};
			
			weaterShowIndex()
		},
		error: function(res) {

		}
	});
}
//支付宝红包
function readpackAli() {
	$.ajax({
		url: READ_PACK_ALI,
		contentType: "application/json",
		type: "get",
		data:{
			act:_act
		},
		dataType: 'json',
		success: function(res) {
			var data = res || {};
			console.log(data)
			if(data.pay_show == 1) {
				$(".hongbao-button").show();
				$(".hongbao-code").html(data.pay_code);
				$("#copyhongbao").val(data.pay_code);
			} else {
				$(".hongbao-button").hide();
			}
		},
		error: function(res) {

		}
	});
}

 
//微信或者安卓是否显示,是否显示视频教程,是否显示新手引导
function weaterShowIndex() {
	$.ajax({
		url: WEATER_SHOW,
		contentType: "application/json",
		type: "get",
		data:{
			act:_act,
			type:systemType
		},
		dataType: 'json',
		success: function(res) {
			var data = res || {};
			if(is_wechat()&&!is_android() && data.wx_jump == 1) {
				  
				location.href = "weixin.html?act="+_act;
			}
			if(is_wechat()&&is_android() && data.wx_jump == 1) {
			 
				location.href = "android.html?act="+_act;
			}
			if(is_qq()&&!is_android() && data.wx_jump == 1) {
				location.href = "weixin.html?act="+_act;
			}
			if(is_qq()&&is_android() && data.wx_jump == 1) {
				location.href = "android.html?act="+_act;
			}
			
			if(data.showad == 1){
				var _ad = "<div class='advice'></div>"
				var item = $(".index-list .platform-a");
	          	if(item.length < 5) {
					item.last().after(_ad);
				} else {
					item.eq(4).after(_ad);
				}
				$(".advice").click(function(){
					window.location.href=data.link_url;
				})
				
			}
			//是否显示新手引导show_user_guide==1显示，0不显示
			//if(localStorage.getItem('firstCome') != 1 && sessionStorage.getItem('platformLength')&&data.show_user_guide==1) {
			if(localStorage.getItem('firstCome') != 1 && sessionStorage.getItem('platformLength')&&data.show_user_guide==1) {
				$(".guide-index").show();
				localStorage.setItem('firstCome', "1");
				$(".hongbao-button").hide();
			}
			//是否显示视频教程show_user_video==1显示，0不显示
			if(localStorage.getItem("videobuttonclose")||data.show_user_video==0){
				$(".video-button").hide();
			}else{
				$(".video-button").show();
			}
			$(".video-button").click(function() {
				$(".video").show();
				var html = '<video id="video" controls="controls" autoplay x-webkit-airplay="true" webkit-playsinline="true" playsinline="true"' +
				'                       width="100%" height="100%"' +
				'                       poster="./img/video-out.png">' +
				'                    Your browser does not support the video tag.' +
				'                    <source src="http://gslb.ins.miaopai.com/stream/ins_5DboNTcng5ZrINNdck1ZXYc7FAWdHWek.mp4"' +
				'                            type="video/mp4">' +
				'                    <source src="http://gslb.ins.miaopai.com/stream/ins_5DboNTcng5ZrINNdck1ZXYc7FAWdHWek.mp4"' +
				'                            type="video/ogg">' +
				'                </video>'
				$('.video-out').html(html);
			});
			$(".video").click(function() {
				$(".video").hide();
				var video = document.getElementById("video");
		        video.pause();
		        video.currentTime = 0;
			});
			$(".video-button-close").click(function(e) {
				e.stopPropagation();
				$(".video-button").hide();
				localStorage.setItem("videobuttonclose","true");
			});
		},
		error: function(res) {

		}
	});
}

//点击跳转平台详情页面
function clickToPlatformDetail() {
	$('.platform-a').on('click', function() {
		var $this = $(this);
		var style = $this.attr('data-type'); //style：1、链接直接跳转，3，跳转到详情页
		var linkUrl = $this.attr('data-linkUrl');
		var platformid = $this.attr('data-id');
		var utitle = $this.attr('data-utitle');
		var trueTitle = $this.attr('data-trueTitle');
		var platnum = $this.attr('data-platnum');
		if(style == 1) {
			window.location.href = linkUrl;
		} else {
			if(utitle == 0) {
				window.location.href = 'platformDetail2.html?platformid=' + platformid + '&platnum=' + platnum+ '&act=' + get_query_val("act")+'&timestamp='+timestamp();
			} else {
				window.location.href = 'platformDetail2.html?platformid=' + platformid+ '&act=' + get_query_val("act")+'&timestamp='+timestamp();
			}

		}
		$(".guide-index").hide();
		return false;
	})
}

//复制板
function clipboardHb() {
	var clipboard = new Clipboard('.shareHongbao');
	clipboard.on('success', function(e) {
		var msg = e.trigger.getAttribute('aria-label');
		alert(msg);
		$(".mask").hide();
		$("#copydiv").hide();
		$('body').removeClass('no-scroll');
		e.clearSelection();
	});
	clipboard.on('error', function(e) {
		$(".mask").hide();
		$("#copydiv").hide();
		$('body').removeClass('no-scroll');
		e.clearSelection();
	});
}


//是否显示加入探米弹窗
function joinTanrice() {
	$.ajax({
		url: JOIN,
		contentType: "application/json",
		type: "get",
		data:{
			act:_act
		},
		dataType: 'json',
		success: function(res) {
			var data = res || {};
			//第二次进入时，弹出进入探米的弹窗
			if(data.status=='1') {
				$(".join-tanrice").show();
				localStorage.setItem('joinTanrice', "1");
				$(".index-bottom-guide-fa").hide();
			};
			$(".join-tanrice-button").click(function() {
				window.location.href=data.link_url;
			});
			$(".join-tanrice-close").click(function() {
				$(".join-tanrice").hide();
				var showBottom3 = localStorage.getItem('showBottom') || sessionStorage.getItem('showBottom');
				if(showBottom3) {
					$(".index-bottom-guide-fa").hide();
				} else {
					// if(is_safari()) {
					// 	if(localStorage.getItem('firstCome') == 1) {
					// 		$(".index-bottom-guide-fa").show();
					// 	}
					// }
					if(is_android()) {
						$(".index-bottom-guide-fa").hide();
					}
				}
			});
		},
		error: function(res) {

		}
	});
}
//手动切换不同系统的数据
function switchSystemType(){
	$(".switch-sm").click(function(){
		$(".switch-popup").show();
	});
	$(".switch-big").click(function(){
		$(".switch-popup").hide();
	});
	_systemType = systemType;
	if(_systemType == "android"){
		$(".system-now-ios").hide();
		$(".system-now-android").show();
	}else{
		$(".system-now-android").hide();
		$(".system-now-ios").show();
	}
	
	$(".system-android").click(function(){
		sendSystemType("android");
	})
	$(".system-ios").click(function(){
		sendSystemType("ios");
	})
}
function sendSystemType(systemType){
	sessionStorage.setItem('systemType',systemType);
	var url = window.location.href;
	if(url.indexOf("?") != -1){
	    url = url.split("?")[0];
	    window.location.href = url + '?act='+_act+'&type='+systemType;
	}else{
		window.location.href = window.location.href;
	}
}
//获取天气
function getWeather(){
	var _weather_qing = "img/weather/weather-qing.png";
	var _weather_bing = "img/weather/weather-bing.png";
	var _weather_feng = "img/weather/weather-feng.png";
	var _weather_mai = "img/weather/weather-mai.png";
	var _weather_wu = "img/weather/weather-wu.png";
	var _weather_xue = "img/weather/weather-xue.png";
	var _weather_yin = "img/weather/weather-yin.png";
	var _weather_yu = "img/weather/weather-yu.png";
	$(".switch-top").show();
	$.ajax({
		url: WEATHER,
		contentType: "application/json",
		type: "get",
		data:{
			act:_act
		},
		dataType: 'json',
//		dataType: 'jsonp',
//		jsonp: 'weather',
//		jsonpCallback: 'weather',
//		async: true,
		success: function(res) {
			var data = res || {};
			var weather = _weather_qing;
			var _type = data.type;
			if(_type=="晴"){
				weather = _weather_qing;
			}else if(_type=="冻雨"){
				weather = _weather_bing;
			}else if(_type=="沙尘暴"||_type=="浮尘"||_type=="扬沙"||_type=="强沙尘暴"){
				weather = _weather_mai;
			}else if(_type=="雾"){
				weather = _weather_wu;
			}else if(_type=="阵雪"||_type=="小雪"||_type=="中雪"||_type=="大雪"||_type=="暴雪"){
				weather = _weather_xue;
			}else if(_type=="阴"||_type=="多云"){
				weather = _weather_yin;
			}else{
				weather = _weather_yu;
			}
			$(".weather-tem").html(data.wendu);
			$(".weather-icon").attr("src", weather);
		},
		error: function(res) {

		}
	});	
}
