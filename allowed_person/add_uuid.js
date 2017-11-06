$(document).ready(function () {
	$('#add_uuid_bt').click(function () {


		var uuid = $('#add_UUID').val()
		var name = $('#add_user_name').val()
		var user_ID = $('#add_user_ID').val()
		var Phone = $('#add_Phone').val()
		var Vendor = $('#add_Vendor').val()

		if (uuid == '' || name == '' || user_ID == '' || Phone == '' || Vendor == '') {
			alert("提醒: \r\n 資料輸入不全!")
			return false
		} else {




			fn_add_uuid(function () {

				//下面這是再select_area.js裡面的fn
				fn_del_uuid_list()
				getalarm()
			})
		}
	});
});

function fn_add_uuid(on_success) {
	$.ajax({
		type: 'POST', //GET or POST
		url: "http://" + ip + "/Electronic_fence_advanced/allowed_person/add_uuid.php", //請求的頁面
		data: {
			select_area: $('#select_area').val(),
			add_user_name: $('#add_user_name').val(),
			add_user_ID: $('#add_user_ID').val(),
			add_Phone: $('#add_Phone').val(),
			add_Vendor: $('#add_Vendor').val(),
			add_UUID: $('#add_UUID').val()
		},
		cache: false, //是否使用快取
		dataType: 'html',
		success: function (result) { //處理回傳成功事件，當請求成功後此事件會被呼叫
			console.log(result);
			//alert(result);
			//$('#title').text(result);
			//$('#select_area_show').html(result);

			//$('#user_content').html(result);
			on_success();
		},
		error: function (result) { //處理回傳錯誤事件，當請求失敗後此事件會被呼叫
			//your code here
			alert("發生錯誤");
			console.log(result);
		},
	});
}