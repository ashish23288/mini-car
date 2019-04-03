$(document).ready(function(){
	$('#submitButton').click( function(e) {
		e.preventDefault();
		var fm = $('#createForm');
		var url = fm.attr('action');
		$.post( url , fm.serialize(), function(data) {
			 alert(data.message);
		   },
		   'json' // I expect a JSON response
		);
	});
});