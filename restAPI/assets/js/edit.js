$(document).ready(function(){
	$('#submitButton').click( function(e) {
		e.preventDefault();
		var fm = $('#updateForm');
		var url = fm.attr('action');
		$.post( url , fm.serialize(), function(data) {
			 alert(data.message);
			 window.location.href = "./index.php";
		   },
		   'json' // I expect a JSON response
		);
	});
});