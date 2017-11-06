$(document).ready(function () {
	$('#del_uuid_bt').click(function () {
		//先跑第一個，再跑第二個
		//fn_del_uuid(function () {
		//	getalarm()
		//})
		getalarm()
		alert("GG123")
	});
	$(document).on('click', '.delbtntest', function () {
		//alert($('#select_area').val() + $(this).val())
		var uuid = $(this).val()
		var area = $('#select_area').val()
		//alert(uuid + area)
		//window.open("del.php?del_uuid=" + uuid + "&select_area=" + area)

		fn_del_uuid(uuid, function () {
			getalarm()
		})
	});
});


function fn_del_uuid(uuid, on_success) {

	$.ajax({
		type: 'POST', //GET or POST
		url: "http://" + ip + "/Electronic_fence_advanced/allowed_person/del_uuid.php", //請求的頁面
		data: {
			select_area: $('#select_area').val(),
			//select_area: $area,
			del_uuid_list: uuid
			//del_uuid_list: $('#del_uuid_list').val()

		},
		cache: false, //是否使用快取
		dataType: 'html',
		success: function (result) { //處理回傳成功事件，當請求成功後此事件會被呼叫
			//alert(result);
			//$('#title').text(result);
			//$('#del_uuid_list').html(result);
			on_success();
		},
		error: function (result) { //處理回傳錯誤事件，當請求失敗後此事件會被呼叫
			//your code here
			alert("發生錯誤");
			console.log(result);

		},

	});
}