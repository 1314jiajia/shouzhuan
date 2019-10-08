<!DOCTYPE html>
<html>
<style>
 
</style>

<head>
    <meta charset="utf-8" />
    <meta name="keywords" content="">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta name="viewport" content="">
    <meta name="author" content="zhaoxiaodong" />

    <script type="text/javascript" src="/vendor/static/js/rem.js"></script>
    <link href="/vendor/static/css/swiper-3.4.1.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/vendor/static/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/static/css/index.css" />
    <link rel="stylesheet" type="text/css" href="/vendor/static/css/recommend.css" />
    <title></title>

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
    <script type="text/javascript">
         function is_wechat() {
            var ua = window.navigator.userAgent.toLowerCase();
            if(ua.match(/MicroMessenger/i) == 'micromessenger') {
                return 1;
            } else {
                return 0;
            }
        }
        function get_query_val(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if(r != null) return unescape(r[2]);
            return null;
        }

        _czc.push(['_trackEvent','微信自动跳转',''])
    
    </script>
</head>

<body class="body">
    <div class="switch-top">
        <div class="switch">
            <div class="switch-left switch-sm fs18"><span class="plate-name" id="plate-item-name"></span><span class="plate-arrow"></span></div>
            <div class="switch-right fs16"><img class="weather-icon" src="/vendor/static/picture/weather-qing.png" /><span class="weather-tem"></span> ℃</div>
        </div>
    </div>
    <div class="switch-popup">
        <div class="switch">
            <div class="switch-left switch-big fs18"><span class="plate-name" id="plate-item-name-show"></span><span class="plate-arrow"></span></div>
            <div class="switch-right fs16"><img class="weather-icon" src="" /><span class="weather-tem"></span> ℃</div>
        </div>
        <div class="system system-first system-ios">
            <div class="system-left fs15"><span class="plate-name" id="plate-ios-name"></span>-苹果版</div>
            <div class="system-now system-now-ios fs12"><span>当前</span></div>
        </div>
        <div class="system system-android">
            <div class="system-left fs15"><span class="plate-name" id="plate-andr-name"></span>-安卓版</div>
            <div class="system-now system-now-android fs12"><span>当前</span></div>
        </div>
    </div>
    <div class="index-top-body">
        <div class="top-img swiper-container">
            <!--轮播图-->
            <div class="swiper-wrapper" id="bannerList">

            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="top-text">
            <div class="top-text-icon"></div>
            <!--公告文字-->
            <div class="scroll-text top-text-notice fs14" id="scroll-text">
            </div>
        </div>
        <div class="gonlue-button" onclick="_czc.push(['_trackEvent','攻略入口','首页攻略入口']);"></div>
    </div>
    <!--<div class="index-blank"></div>-->
    <div class="index-middle-body">
        <div class="middle-title mi-title">
            <div class="middle-title-text title-body Optimization bot5-border fs16">赚钱优选</div>
            <div class="middle-title-text title-body Recommed fs16">热门推荐</div>
            <p class="middle-title-count fs14"><span id="checkPeopleNum"></span>人正在试玩</p>
        </div>
        <div class="index-centerman">
        <!--     <div class="listw index-list" id="platformList">
        
        </div> -->
             <div class="listw index-list" id="platformList">
           
            </div>
            <div class="listw index-sentw" >
                <div class="recom-body">
                    <div class="recom-list" id="recommendList">
                        <!--<div class="platform-recom">
                                <div class="platform-icon">
                                    <img src="static/picture/icon.png"/>
                                </div>
                                <div class="platform-title">
                                    <div class="platform-title-text fs17"><span class="platform-name">试玩平台1</span><div class="label label1 fs10">推荐</div></div>
                                    <div class="platform-title-intro fs13">每单试玩奖励1.0到2.2元</div>
                                </div>
                                <div class="platform-line"></div>
                                <div class="platform-buttont fs13">去赚钱</div>
                            </div>-->
                    </div>
                </div>
            </div>

        </div>
        <!--更多赚钱平台正在更新中-->
        <div class="more-plat fs12">
            <div class="more-plat-title">更多赚钱平台正在更新中</div>
            <div class="more-plat-intro">请持续关注哦~</div>
        </div>
    </div>

    <!-- 描述：首页引导-->
    <div class="guide-index">
        <div class="guide-index-text"></div>
        <div class="guide-index-template">

        </div>

    </div>
    <!--底部的添加到桌面-->
    <div class="index-bottom-guide-fa" style="display: none">
        <div class="index-bottom-guide">
            <img id="enterImg" src="" />
            <div class="index-bottom-guide-text">
                <div class="index-bottom-guide-text1" id="enterTitle"></div>
                <div class="index-bottom-guide-text2" id="enterDiscribe"></div>
            </div>
            <div class="index-bottom-guide-button-down">立即安装</div>
            <div class="index-bottom-guide-button-close">以后再说</div>
        </div>
    </div>
    <!--添加到桌面新方式-->
    <div class="add-to-desk-mask">
        <div class="add-to-desk">
            <div class="add-header">
                <div class="add-back"></div>
                <div class="add-title">添加到主屏幕</div>
            </div>
            <div class="add-item">
                <div class="add-item-title">
                    <span class="add-order">1</span>点击底部“ <span class="add-desk-intro"></span> ”按钮
                </div>
                <div class="add-item-img add-item-img1"></div>
            </div>
            <div class="add-item">
                <div class="add-item-title">
                    <span class="add-order">2</span>点击添加到主屏幕
                </div>
                <div class="add-item-img add-item-img2"></div>
            </div>
            <div class="add-item">
                <div class="add-item-title">
                    <span class="add-order">3</span>点击右上角添加
                </div>
                <div class="add-item-img add-item-img3">
                    <div class="add-icon"><img class="add-icon-img" src='' /></div>
                    <div class="add-titles"></div>
                    <div class="add-link"></div>
                </div>
            </div>
            <div class="add-item add-item-b">
                <div class="add-item-img add-item-bottom">
                    <div class="add-icon-little"><img class="add-icon-img" src='' /></div>
                    <div class="add-icon-little-name"></div>
                    <div class="add-finger"></div>
                </div>
            </div>
        </div>
    </div>
    <!--添加到桌面老方式-->
    <div class="add-desk">
        <div class="add-desk-img"></div>
    </div>
    <div class="open-safari">
        <div class="open-safari-img-new"></div>
    </div>
    <!--新手视频教程-->
    <div class="video-button" onclick="_czc.push(['_trackEvent','首页视频','首页视频']);">
        <div class="video-button-close"></div>
    </div>
    <div class="video">
        <div class="video-out">
            <img src="/vendor/static/picture/video-out.png">
        </div>
    </div>
    <!--借你钱-->
    <!--<a href="http://t.cn/EVGyWw5" onclick="_czc.push(['_trackEvent','贷钞','贷钞点击']);"><div class="jieniqian"></div></a>-->
    <!--支付宝红包-->
    <div class="hongbao-button trans"></div>
    <div class="get-hongbao">
        <div class="hongbao-body">
            <div class="hongbao-body-l1 fs13">每次付款前都可以来领一次哦</div>
            <div class="hongbao-body-l2 fs18">您的领取码已生成</div>
            <div class="hongbao-body-code fs20"><span class="hongbao-code"></span></div>
            <div class="hongbao-body-l4 fs14">打开支付宝搜索“<span class="hongbao-code"></span>”</div>
            <div class="hongbao-body-l5 fs14">即可领取红包</div>
            <div class="hongbao-body-l6 fs16">红包线下付款可用</div>
            <div class="hongbao-body-l7 fs16">余额宝支付补贴最大</div>
            <button class="hongbao-body-b1 fs16 shareHongbao" onclick="" id="hongbao" type="button" data-clipboard-target="#copyhongbao" aria-label="复制成功！">一键复制</button>
            <div class="hongbao-body-b2 fs14 open-ali">去支付宝粘贴</div>
            <div class="hongbao-close"></div>
            <input class="copytext" id="copyhongbao" value="">
        </div>
    </div>
    <!--第二次进入主页后，弹出加入探米的弹窗-->
    <!--<div class="join-tanrice">
            <div class="join-tanrice-body">
                <div class="join-tanrice-title fs18">恭喜你</div>
                <div class="join-tanrice-intro fs16">发现优质赚钱平台</div>
                <div class="join-tanrice-button fs17">加入探米</div>
                <div class="join-tanrice-close"></div>
            </div>
        </div>-->
    <a href="https://engine.lvehaisen.com/index/activity?appKey=4N9g1Fx9X1bAnDoNi9JwAz2aeLvf&adslotId=188596" onclick="_czc.push(['_trackEvent','探树推荐','每日抽红包']);" target="_blank">
        <div class="red-bottom"></div>
    </a>
    <div class="footer">
        <div class="navbar">
            <a class="navbar-item navbar-index" onclick="_czc.push(['_trackEvent','导航栏','试玩赚钱导航']);"> <i class="navbar-icon icon-indexs"></i>
                <p class="navbar-descs">
                    试玩赚钱
                </p>
            </a>

            <a class="navbar-item navbar-read" onclick="_czc.push(['_trackEvent','导航栏','阅读赚钱导航']);"> <i class="navbar-icon icon-read"></i>
                <p class="navbar-desc">
                    阅读赚钱
                </p>
            </a>
            <a class="navbar-item navbar-wode" onclick="_czc.push(['_trackEvent','导航栏','我的']);"> <i class="navbar-icon icon-recommend"><em class="xnew"></em></i>
                <p class="navbar-desc">
                    我的
                </p>
            </a>
<!--             <a class="navbar-item navbar-recommend" onclick="_czc.push(['_trackEvent','导航栏','推荐赚钱导航']);"> <i class="navbar-icon icon-recommend"></i>
    <p class="navbar-desc">
        热门推荐
    </p>
</a> -->
        </div>
    </div>
    <div class="load">
        <div class="load-gif"><img src="/vendor/static/picture/loading.gif"></div>
        <div class="load-text">正在加载，请稍后</div>
    </div>
</body>
<div style="display:none">
    <script type="text/javascript" src="/vendor/static/js/z_stat.js"></script>
    <script type="text/javascript">
        var cnzz_protocol = (("https:" == document.location.protocol) ? "https://" : "http://");
        document.write(unescape("%3Cspan id='cnzz_stat_icon_1274770939'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/z_stat.php%3Fid%3D1274770939' type='text/javascript'%3E%3C/script%3E"));
    </script>
</div>
<script type="text/javascript" src="/vendor/static/js/jquery-1.11.0.js"></script>
<script src="/vendor/static/js/clipboard.min.js"></script>
<script type="text/javascript" src="/vendor/static/js/swiper-3.4.1.min.js"></script>
<script type="text/javascript" src="/vendor/static/js/template.js"></script>
<script type="text/javascript" src="/vendor/static/js/config.js"></script>
<script type="text/javascript" src="/vendor/static/js/utils.js"></script>

 
<script type="text/javascript" src="/vendor/static/js/recommend.js"></script>
 
<script type="text/javascript" src="/vendor/static/js/common.js"></script>
<script type="text/javascript" src="/vendor/static/js/index.js"></script>
 
<!-- 滚动公告列表 -->
<script type="text/javascript">
    function autoScroll(obj) {
        $(obj).find("#scroll-text").animate({
            marginTop: "-35px"
        }, 500, function() {
            $(this).css({
                marginTop: "0px"
            }).find(".scroll-auto:first").appendTo(this);
        })
    }
    $(function() {
        setInterval('autoScroll(".top-text")', 2000);
    })
</script>

<!--轮播图模板-->
<script type="text/html" id="t:bannerList">
   <?php foreach ( $list as $v ): ?>
      <a href="" id="<?= $v->id ?>" onclick="" class="banner swiper-slide" style="height: 100%;width: 100%;">
            <img src="<?= $v->images ?>" alt="" width="100%" height="100%">
        </a>
   <?php endforeach; ?> 
</script>


<!--内容列表模板-->
<script type="text/html" id="t:platformList">
    <?php foreach ($info as $v ): ?>

        <a class="platform-a" href="" onclick="_czc.push(['_trackEvent','探树列表']);" data-type="" data-linkUrl="<?= $v->qrcode ?>" data-id="<?= $v->id ?>" data-type="" data-utitle=""
            data-platnum="<?= $v->browse ?>">
            <div class="platform">

                <div class="platform-icon">
                    <img src="<?= $v->images  ?>" />
                </div>
                <div class="platform-title">
                        <?= $v->name ?>
                    <div class="platform-title-intro fs13">
                        <?= $v->tag;?>
                    </div>
                </div>
                <div class="platform-buttont fs14"><a href="">去赚钱</a></div>
            </div>
        </a>
       
        <?php endforeach; ?>
</script>
<script type="text/javascript">
$('.mi-title').on('click','.title-body',function(){
    let index = $(this).index();
    $(this).addClass('bot5-border').siblings().removeClass('bot5-border');
    $('.index-centerman .listw').eq(index).show().siblings().hide();
})
</script>
<!-- 滚动公告列表 -->
<script type="text/javascript">
    $(".platform-recom").on('click', function() {
        //          var $this = $(this);
        window.location.href = "platformDetail2.html";
    });
</script>
<script type="text/html" id="t:recommendList">
    <%for(var i = 0;i < list.length; i++){%>
        <a class="platform-a" href="javascript:;" data-type="<%=list[i].style%>" data-linkUrl="<%=list[i].linkUrl%>" data-id="<%=list[i].id%>" data-type="<%=list[i].style%>" data-utitle="<%=list[i].useTitle%>" data-platnum="<%=list[i].num%>">
                <div class="platform-recom" id="<%=list[i].id%>">
                    <div class="platform-icon">
                        <img src="<%=list[i].img%>" />
                    </div>
                    <div class="platform-title">
                        <div class="platform-title-text fs17"><span class="platform-name"><%=list[i].title%></span>
                        <%if(list[i].tagText == '最佳'){%>
                        <div class="label label1 fs10"><%=list[i].tagText%></div>
                        <%}else if(list[i].tagText == '新手'){%>
                        <div class="label label2 fs10"><%=list[i].tagText%></div>
                        <%}else if(list[i].tagText == '推荐'){%>
                        <div class="label label3 fs10"><%=list[i].tagText%></div>
                        <%}else if(list[i].tagText == '最新'){%>
                        <div class="label label5 fs10"><%=list[i].tagText%></div>
                        <%}else if(list[i].tagText == '必做'){%>
                        <div class="label label4 fs10"><%=list[i].tagText%></div>
                        <%}%>
                        </div>
                        <div class="platform-title-intro fs13"><%=list[i].describe%></div>
                    </div>
                    <div class="platform-line"></div>
                    <div class="platform-buttont fs14">去赚钱</div>
                </div>
            </a>
        <%}%>
</script>
</html>