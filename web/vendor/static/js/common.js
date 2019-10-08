var req = new XMLHttpRequest();
req.open('GET', document.location, false);
req.send(null);
var headers = req.getResponseHeader('act')||'';
headers.toLowerCase();
var _act='';
if(headers && headers.indexOf('digrice') < 0){
    _act = headers;
}else if(headers.indexOf('digrice') >= 0){
    _act = get_query_val("act")||"";
} else{
    _act = get_query_val("act")||"";
}


if(!_act){

	getDomain();
	//location.href = domain+"/index.php/user/publics/signin.html";
	/*var domain = window.location.host;
	var domain_arr = domain.split('.');
	var ext = domain_arr[domain_arr.length - 1];
    location.href = "http://tsadmin.digrice."+ext+"/index.php/user/publics/signin.html";*/
}

$(".navbar-index").on("click", function() {
    window.location.href="index.html?act="+_act+'&timestamp='+timestamp();
});
/*$(".navbar-recommend").on("click", function() {
    window.location.href="recommend.html?act="+_act+'&timestamp='+timestamp();
});*/
$(".navbar-wode").on("click", function() {
    window.location.href="myaccount.html?act="+_act+'&timestamp='+timestamp();
});
$(".navbar-read").on("click", function() {
    window.location.href="read.html?act="+_act+'&timestamp='+timestamp();
});
$(".gonlue-button").on("click",function(){
	location.href="gonglue.html?act="+_act+'&timestamp='+timestamp();
});

$(function () {
    var osv = getOsv();
    var osvArr = osv.split('.');
    //初始化显示ios9引导
    if (osvArr && osvArr.length > 0) {
        if (parseInt(osvArr[0])==11||parseInt(osvArr[0])==12) {//ios11
            try {
                window.openDatabase(null, null, null, null);
            } catch (_) {
                window.location.href = 'wuhen.html?act='+_act;
            }

            var isPrivate = false;
            try {
                window.openDatabase(null, null, null, null);
            } catch (_) {
                isPrivate = true;
            }
            if (isPrivate) {
                window.location.href = 'wuhen.html?act='+_act;
            }

        } else {
            try {
                localStorage.setItem('isPrivateMode', '1');
                localStorage.removeItem('isPrivateMode');
                window.isPrivateMode = false;
            } catch (e) {
                window.isPrivateMode = true;
            }
            if (!window.isPrivateMode) { // 不是 Safari 无痕模式并且能用 localStorage

            } else {
                window.location.href = 'wuhen.html?act='+_act;
            }
        }
    }
})

//获取后台域名
function getDomain(){
		$.ajax({
		url: ADMIN_DOMAIN,
		contentType: "application/json",
		type: "get",
		dataType: 'json',
		success: function(res) {
			var domain = res['domain'];
			location.href = domain+"/index.php/user/publics/signin.html";
		}
	});
	
}

//微信或者安卓是否显示
function weaterShow() {
    $.ajax({
        url: WEATER_SHOW,
        contentType: "application/json",
        type: "get",
        data:{
            act:_act
        },
        dataType: 'json',
//		dataType: 'jsonp',
//		jsonp: 'wxjumpback',
//		jsonpCallback: 'wxjumpback',
//		async: true,
        success: function(res) {
            var data = res || {};
            if(is_wechat()&&!is_android() && data.wx_jump == 1) {
                var _act = get_query_val("act")||"";
                if(_act){
                    location.href = "weixin.html?act="+_act;
                }
            }
            if(is_wechat()&&is_android() && data.wx_jump == 1) {
                var _act = get_query_val("act")||"";
                if(_act){
                    location.href = "android.html?act="+_act;
                }
            }
            if(is_qq()&&!is_android() && data.wx_jump == 1) {
                var _act = get_query_val("act")||"";
                if(_act){
                    location.href = "weixin.html?act="+_act;
                }
            }
            if(is_qq()&&is_android() && data.wx_jump == 1) {
                var _act = get_query_val("act")||"";
                if(_act){
                    location.href = "android.html?act="+_act;
                }
            }
        },
        error: function(res) {

        }
    });
}
function timestamp(){
	return new Date().getTime();
}


function getSystemType() {
	var u = navigator.userAgent.toLowerCase();
	var isAndroid = u.indexOf('android') > -1 || u.indexOf('adr') > -1;
	if(isAndroid) {
		return 'android';
	} else {
		return 'ios';
	}
}
var systemType ='';//全局变量，android或ios；
var session_systemType = sessionStorage.getItem('systemType')||'';
if(session_systemType){
	systemType = session_systemType;
}else{
	systemType = getSystemType();
}




/*------errMsg提示框--------*/
function errMsg(message) {//errMsg提示框
    if(message == "" || message == null) {
        return false
    }
    $(".err-msg").fadeIn(10);
    $(".err-msg-text").html(message);
    setTimeout(function() {
        $(".err-msg").fadeOut(10)
    }, 2000)
}

function formatTime(time){//
    var t="";
    if(time > -1) {
        var min = Math.floor(time / 60);
        var sec = time % 60;
        if(min < 10) {
            t += "0";
        }
        t += min + ":";
        if(sec < 10) {
            t += "0";
        }
        t += sec;
    }
    return t;   
}
 


 Date.prototype.Format = function (mask) {
    var d = this;
    var zeroize = function (value, length) {
        if (!length) length = 2;
        value = String(value);
        for (var i = 0, zeros = ''; i < (length - value.length); i++) {
            zeros += '0';
        }
        return zeros + value;
    };

    return mask.replace(/"[^"]*"|'[^']*'|\b(?:d{1,4}|m{1,4}|yy(?:yy)?|([hHMstT])\1?|[lLZ])\b/g, function ($0) {
        switch ($0) {
            case 'd':
                return d.getDate();
            case 'dd':
                return zeroize(d.getDate());
            case 'ddd':
                return ['Sun', 'Mon', 'Tue', 'Wed', 'Thr', 'Fri', 'Sat'][d.getDay()];
            case 'dddd':
                return ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'][d.getDay()];
            case 'M':
                return d.getMonth() + 1;
            case 'MM':
                return zeroize(d.getMonth() + 1);
            case 'MMM':
                return ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'][d.getMonth()];
            case 'MMMM':
                return ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'][d.getMonth()];
            case 'yy':
                return String(d.getFullYear()).substr(2);
            case 'yyyy':
                return d.getFullYear();
            case 'h':
                return d.getHours() % 12 || 12;
            case 'hh':
                return zeroize(d.getHours() % 12 || 12);
            case 'H':
                return d.getHours();
            case 'HH':
                return zeroize(d.getHours());
            case 'm':
                return d.getMinutes();
            case 'mm':
                return zeroize(d.getMinutes());
            case 's':
                return d.getSeconds();
            case 'ss':
                return zeroize(d.getSeconds());
            case 'l':
                return zeroize(d.getMilliseconds(), 3);
            case 'L':
                var m = d.getMilliseconds();
                if (m > 99) m = Math.round(m / 10);
                return zeroize(m);
            case 'tt':
                return d.getHours() < 12 ? 'am' : 'pm';
            case 'TT':
                return d.getHours() < 12 ? 'AM' : 'PM';
            case 'Z':
                return d.toUTCString().match(/[A-Z]+$/);
            // Return quoted strings with the surrounding quotes removed
            default:
                return $0.substr(1, $0.length - 2);
        }
    });
};


 