
						console.log("script run")
						var everybodyChart = document.getElementById('chartdiv');
						var barsChart = document.getElementById('categoryView');

						document.getElementById("everyoneNav").onclick = function () {
							console.log("everyone chart button clicked");
							$('#categorydiv').hide();
							$('#everyonediv').show();
							};
						
						document.getElementById("categoryNav").onclick = function () {
							console.log("category chart button clicked");
							
							$('#categorydiv').show();
							$('#everyonediv').hide();

							};
							$('#categorydiv').show();
							$('#everyonediv').show();

						

				
