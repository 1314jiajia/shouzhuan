$(document).ready(function() {
	weaterShow();
	recommendList()
})
//试玩平台列表
function recommendList() {
	$('.load').show();
	$.ajax({
		url: PLATFORM_RE_LIST,
		contentType: "application/json",
		type: "get",
		data:{
			act:_act,
			type:systemType
		},
		dataType: 'json',
		success: function(res) {
			$('.load').hide();
//			console.log(res)
			var data = res;
			$('#recommendList').html(template('t:recommendList', {
				list: data
			}));
			$(".platform-recom").on("touchstart",function(){
				$(this).css("background-color","#f5f5f5");
			});
			$(".platform-recom").on("touchend",function(){
				$(this).css("background-color","#fff");
			});
		 	clickToPlatformDetail()
		},
		error: function(res) {

		}
	});
}
//点击跳转平台详情页面
function clickToPlatformDetail() {
    $('.platform-a').on('click', function () {
        var $this = $(this);
        var style = $this.attr('data-type');//style：1、跳转Safari；2、分享赚钱；3、立即赚钱；4、分享+立即
        var linkUrl = $this.attr('data-linkUrl');
        var platformid = $this.attr('data-id');
        var utitle = $this.attr('data-utitle');
        var trueTitle = $this.attr('data-trueTitle');
        var platnum = $this.attr('data-platnum');
        if (style == 1) {
            window.location.href = linkUrl;
        }else {
            if (utitle == 0) {
                window.location.href = 'platformDetail2.html?platformid=' + platformid + '&platnum=' + platnum+ '&act=' + get_query_val("act")+'&timestamp='+timestamp();
            } else {
                window.location.href = 'platformDetail2.html?platformid=' + platformid+ '&act=' + get_query_val("act")+'&timestamp='+timestamp();
            }

        }
        return false;
    })
}