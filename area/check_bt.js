$(document).ready(function () {

	$('#add_area_bt').click(function () {
		var email = $('#add_area').val();
		if (email == '') {
			alert("提醒: \r\n 未輸入防護區域名稱!");
			return false;
		}
	});

	$(document).on('click', '.delfence', function () {
		var fence_id = $(this).val()
		//alert(uuid)
		var email = $('#del_fence_list_' + fence_id).val();
		//alert(email)
		if (email == '選擇Pi代號') {
			alert("提醒: \r\n 未選擇欲刪除之Pi代號!");
			return false;
		}
	});



	$('#del_area_bt').click(function () {
		var email = $('#del_area').val();
		if (email == '防護區域名稱') {
			alert("提醒: \r\n 未選擇欲刪除之防護區域!");
			return false;
		}
	});

	$('#add_fence_bt').click(function () {
		var email = $('#add_fence').val();
		if (email == '') {
			alert("提醒: \r\n 未輸入圍籬名稱!");
			return false;
		}
	});

	/*$('#del_fence_bt').click(function () {
		var email = $('#del_fence_list').val();
		if (email == '選擇圍籬代號') {
			alert("提醒: \r\n 未選擇欲刪除之圍籬!");
			return false;
		}
	});
	*/
});