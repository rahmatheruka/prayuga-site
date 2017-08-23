(function ($){

	$("#form-clasifiy").click(function(e){
		var text = $("#the-text").val();
		$.ajax({
			type: 'GET',
			url : BASE_URL_API+'?kalimat='+text,
			beforeSend: function(){
				$("#form-clasifiy").text("Analyzing...");
				$("#form-clasifiy").prop('disabled', true);
			},
			success: function(data){
				$("#form-clasifiy").text("Analyze");
				$("#form-clasifiy").prop('disabled', false);
				$(".result").html(data);
				$(".result").fadeIn();
			},
			error: function(data){
	        	swal("Oops...", "Something went wrong!", "error");
	        },
		});
		
		// e.preventDefault();
	});

})(jQuery);