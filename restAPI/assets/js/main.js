$(document).ready(function(){
    
	// $.get("./api/post/read.php", function(data, status){
		// alert("Data: " + data + "\nStatus: " + status);
		//use this when use front end framework
	// });
	
	$('.deleteButton').click( function(e) {
		var id = $(this).attr('id');
		$.post( './api/post/Delete.php' , {id:id}, function(data) {
				$('#'+id).parents('tr').remove();
				alert(data.message);
		   },
		   'json' // I expect a JSON response
		);
	});
});