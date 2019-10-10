$(document).ready(function(){
	initButton();
	userCenterData();
})

function initButton(){

	$(".high-entrance").on('click',function(){//鐐瑰嚮楂橀浠诲姟璺宠浆楂橀鍒楄〃
		
		window.location.href='highTask.html?act='+get_query_val("act")+'&timestamp='+timestamp();

	});

	$(".account-main").on('click','.cout-ico',function(){//鐐瑰嚮澶村儚璺宠浆涓汉涓績

		window.location.href='Personalcenter.html?act='+get_query_val("act")+'&timestamp='+timestamp();

	});

	$(".cash-out").on('click',function(){//鐐瑰嚮鎻愮幇璺宠浆鎻愮幇

		window.location.href='cashcenter.html?act='+get_query_val("act")+'&timestamp='+timestamp();

	});

}

function userCenterData(){

	var userToken = localStorage.getItem('userToken');

	var _data = JSON.stringify({

		token: userToken

	});

	$.ajax({

		type: 'POST',

		contentType: "application/json",

		url:USER_CENTER,

		data: _data,

		success: function(res) {

			if(res.code == "10000") {

				yeslogin(res);
				
			}else if(res.code == "10014"){//鐢ㄦ埛鏈櫥褰�

				nologin(res);
			}
		},
		error: function(res) {}
	});
	
	function yeslogin(res){//鐧诲綍

 		if(res.res.avatar =='' || res.res.avatar == null){

		 	$('.cout-ico').html('<img class="cout-img" src="img/laotou.png">');

		 }else{

		 	$('.cout-ico').html('<img class="Pinfo-img" src="'+res.res.avatar+'">');

		 }

		$('.cout-name-title').html(res.res.nickName);

		$('.cout-name-id').html("ID"+res.res.id);

		$('.accountmoney').html(res.res.money);

		$('.A-come').html(res.res.totalMoney);

		$('.D-come ').html(res.res.todayMoney);


	};
	function nologin(res){//鏈櫥褰�

		$('.cout-name-title').html('鐧诲綍/娉ㄥ唽');

		$('.cout-name-id').html('');

		$('.cout-ico').click(function(){

			window.location.href='loginphone.html?act='+get_query_val("act")+'&timestamp='+timestamp();
		})
		$('.cash-out').click(function(){

			window.location.href='loginphone.html?act='+get_query_val("act")+'&timestamp='+timestamp();
		})
		$('.cout-name-title').click(function(){

			window.location.href='loginphone.html?act='+get_query_val("act")+'&timestamp='+timestamp();
		})
	};

}

/*------errMsg鎻愮ず妗�--------*/
function errMsg(message) {//errMsg鎻愮ず妗�

	if(message == "" || message == null) {
		
		return false
	}

	$(".err-msg").fadeIn(10);

	$(".err-msg-text").html(message);

	setTimeout(function() {

		$(".err-msg").fadeOut(10)

	}, 2000)
}
 