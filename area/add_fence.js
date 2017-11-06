$(document).ready(function () {
	$('#add_fence_bt').click(function () {

		alert($('#add_fence').val())

	});
});



function fn_add_fence(on_success) {
	$.ajax({
		type: 'POST', //GET or POST
		url: "http://" + ip + "/Electronic_fence/area/add_fence.php", //請求的頁面
		data: {
			select_area: $('#select_area').val(),
			add_fence: $('#add_fence').val()
		},
		cache: false, //是否使用快取
		dataType: 'html',
		success: function (result) { //處理回傳成功事件，當請求成功後此事件會被呼叫
			console.log(result);
			if (result != "") {
				alert(result);
			}

			//$('#title').text(result);
			//$('#select_area_show').html(result);
			on_success();
		},
		error: function (result) { //處理回傳錯誤事件，當請求失敗後此事件會被呼叫
			//your code here
			alert("發生錯誤");
			console.log(result);

		},

	});
}

function fn_del_fence_list_afteradd() {
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