$(document).ready(function () {
	$("#fence_edit_show").hide();



	$('#select_area_bt').click(function () {



		var email = $('#select_area').val()
		if (email == '選擇防護區域') {
			alert("提醒: \r\n 未選擇防護區域!")
			return false
		} else {
			//隱藏增加的防護區域
			$("#add_area_show").hide();
			//隱藏刪除的防護區域
			$("#del_area_show").hide();

			$("#fence_edit_show").show();

			getalarm(function () {
				fn_del_fence_list()
			});
		}

	});
});

function getalarm(on_success) {
	$.ajax({
		type: 'POST', //GET or POST
		url: "http://" + ip + "/Electronic_fence/area/select_area.php", //請求的頁面
		data: {
			select_area: $('#select_area').val()
		},
		cache: false, //是否使用快取
		dataType: 'html',
		success: function (result) { //處理回傳成功事件，當請求成功後此事件會被呼叫
			//alert(result);
			//$('#title').text(result);
			$('#select_area_show').html(result);
			on_success();
		},
		error: function (result) { //處理回傳錯誤事件，當請求失敗後此事件會被呼叫
			//your code here
			alert("發生錯誤");
			console.log(result);
		},
	});
}

function fn_del_fence_list() {
	$.ajax({
		type: 'POST', //GET or POST
		url: "http://" + ip + "/Electronic_fence/area/del_fence_list.php", //請求的頁面
		data: {
			select_area: $('#select_area').val()
		},
		cache: false, //是否使用快取
		dataType: 'html',
		success: function (result) { //處理回傳成功事件，當請求成功後此事件會被呼叫
			//alert(result);
			//$('#title').text(result);
			$('#del_fence_list').html(result);

		},
		error: function (result) { //處理回傳錯誤事件，當請求失敗後此事件會被呼叫
			//your code here
			alert("發生錯誤");
			console.log(result);
		},
	});
}