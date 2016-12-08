$(document).ready(function(){
	$("#uid").on('change',function(){
		console.log($(this).val());  // works here
		$.post("ajax.php",{"checkName": $(this).val()},function(result)
			{
			//	console.log($(this).val());  // fails here
				$("#result").text(result);
				//alert(result);
			});
		
	});
	
});