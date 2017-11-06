$(function(){
	setInterval(getalarm,100)
	
})

function getalarm (){
	$.ajax({
	  type: 'GET',                     //GET or POST
	  url: "http://127.0.0.1/Electronic_fence/echo.php",  //請求的頁面
	  cache: false,   //是否使用快取
	  dataType : 'text',
	  success: function(result){   //處理回傳成功事件，當請求成功後此事件會被呼叫
		//alert(result);
		//$('#title').text(result);
		$('#alarm').text(result);
	  },
	  error: function(result){   //處理回傳錯誤事件，當請求失敗後此事件會被呼叫
		//your code here
		alert("發生錯誤");
		console.log(result);

	  },
	  
	});
	
	
}