$(document).ready(function(){ 
 	$('#AnswerAddForm').submit(function(event){ 
		var fid=$('form').attr('id');
   		var formData = $('#'+fid).serialize();
  		$.ajax({
    		type : 'POST',
    		url : '/answers/add',
    		data: formData,
    		success : function(response) {
    			var response1=jQuery.parseJSON(response);
    			console.log(response1);
    			for (var i = 0; i < outputfromserver.length; i++) {
            		// outputfromserver[i] can be used to get each value
            		alert(outputfromserver[i]);
            		console.log(outputfromserver[i]);
        		}
    		},
    		error: function(e) {
                  console.log(e);
                  console.log(formData);
            }
    	});
		console.log(formData);
		event.preventDefault();
    	return false;
	});
});

