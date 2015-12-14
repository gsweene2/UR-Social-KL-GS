
		$(document).ready(function() {
		    $('select.uLoc').change(function(){
			console.log("Change Detected")
			console.log($('select.uLoc').val());
		        $.ajax({
						type: 'POST',
		                url: 'dashboard.php',
						data: {$mydata:$('select.uLoc').val()},
						success: function(){     
						console.log("POST Success");
						},
						error: function() {
				 		alert( "Sorry, there was a problem!" );
						}
						
		         });
		    });
		});
	