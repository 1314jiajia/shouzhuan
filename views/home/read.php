
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="keywords" content="探米,积分墙,探米官网,北京无限探米科技股份有限公司,广告激励平台,App试玩,手机赚钱,积米,友贝">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="author" content="zhaoxiaodong" />
    <link rel="apple-touch-icon" href="img/icon.ico">
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">
    <script type="text/javascript" src="js/rem.js"></script>
    <link href="css/swiper-3.4.1.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/common.css?v=004" />
    <link rel="stylesheet" type="text/css" href="css/read.css?v=004" />
    <title>阅读</title>
    <script>
        //声明_czc对象:
        var _czc = _czc || [];
        //绑定siteid，请用您的siteid替换下方"XXXXXXXX"部分
        window._czc.push(["_setAccount", "1274770939"]);
    </script>
    <script type="text/javascript">
        var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
        document.write(unescape("%3Cspan id='cnzz_stat_icon_1274770939'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s96.cnzz.com/z_stat.php%3Fid%3D1274770939' type='text/javascript'%3E%3C/script%3E"));
        document.getElementById("cnzz_stat_icon_1274770939").style.display = "none";
    </script>
</head>

<body class="body">
    <div class="read-body">
        <div class="read-list" id="readList">
            <!--<div class="read">
					<div class="read-top">
						<div class="read-icon">
							<img src="img/icon.png" />
						</div>
						<div class="read-title">
							<div class="read-title-text fs16">快马小报</div>
							<div class="read-buttont fs13">立即下载</div>
						</div>
					</div>
					<div class="read-title-intro fs13">每单试玩奖励1.0到2.2元</div>
				</div>-->
        </div>
    </div>
    <div class="footer">
        <div class="navbar">
            <a class="navbar-item navbar-index" onclick="_czc.push(['_trackEvent','导航栏','试玩赚钱导航']);"> <i class="navbar-icon icon-index"></i>
                <p class="navbar-desc">
                    试玩赚钱
                </p>
            </a>
            <a class="navbar-item navbar-read" onclick="_czc.push(['_trackEvent','导航栏','阅读赚钱导航']);"> <i class="navbar-icon icon-reads"></i>
                <p class="navbar-descs">
                    阅读赚钱
                </p>
            </a>
            <a class="navbar-item navbar-wode" onclick="_czc.push(['_trackEvent','导航栏','我的']);"> <i class="navbar-icon icon-recommend"><em class="xnew"></em></i>
                <p class="navbar-desc">
                    我的
                </p>
            </a>
<!--             <a class="navbar-item navbar-recommend" onclick="_czc.push(['_trackEvent','导航栏','热门推荐']);"> <i class="navbar-icon icon-recommend"></i>
    <p class="navbar-desc">
        热门推荐
    </p>
</a> -->

        </div>
    </div>
</body>
<script type="text/javascript" src="/vendor/static/js/jquery-1.11.0.js"></script>
<script type="text/javascript" src="/vendor/static/js/template.js"></script>
<script type="text/javascript" src="/vendor/static/js/config.js?v=001"></script>
<script type="text/javascript" src="/vendor/static/js/utils.js"></script>
<script type="text/javascript" src="/vendor/static/js/common.js?v=0011"></script>
<script type="text/javascript" src="/vendor/static/js/read.js?v=010"></script>
<script type="text/html" id="t:readList">
    <%for(var i = 0;i < list.length; i++){%>
        <a data-id="<%=list[i].id%>" href="javascript:;" onclick="_czc.push(['_trackEvent','阅读赚钱列表','第<%=i+1%>个']);" data-type="<%=list[i].style%>" data-linkUrl="<%=list[i].linkUrl%>" class="platform-a">
            <div class="read">
                <div class="read-top">
                    <div class="read-icon">
                        <img src="<%=list[i].path%>" />
                    </div>
                    <div class="read-title">
                        <div class="read-title-text fs16">
                            <%=list[i].title%>
                        </div>
                        <div class="read-buttont fs13">立即下载</div>
                    </div>
                </div>
                <div class="read-title-intro fs13">
                    <%=list[i].describe%>
                </div>
            </div>
        </a>
        <%}%>
</script>

</html>