


<?php 

if(!isset($_COOKIE['email'])){
header("Location: index.php");
}

?>

<!doctype html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title></title>

        <meta name="description" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">



        <link rel="stylesheet" href="css/bootstrap.min.css">

        <style>

            body {

                padding-top: 50px;

                padding-bottom: 20px;

            }
			
			#everyonediv{

				width: 100%;
				 height: 500px;
				 
			}
			
			#categorydiv{

				width: 100%; 
				height: 500px;
			}
			
			.sweetFlex{
				display: inline-block;
				vertical-align: top;
			}
			
			.displayChartDiv{
				display: inline-block;
			}
			
			.individual{
				width:100%;
			}
			
			.main-column{
				width: 75%;
			}
			
			.side-column{
				width: 24%;
			}

        </style>

        <link rel="stylesheet" href="css/bootstrap-theme.min.css">

        <link rel="stylesheet" href="css/main.css">



        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
		
				<script src="js/jquery.js"></script>
				
				<script
src="http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false">
</script>

    </head>

    <body>

<?php 
include "inc/nav.inc";
?>

        <br/>
		<br/>
		
		
<!-- chart 1 -->
          <h1 class="page-header">Dashboard</h1>

				<div class="main-column sweetFlex">
					<div id="everyonediv" class="displayChartDiv sweetFlex"><h1>Everybody!</h1></div>
					<div id="categorydiv" class="displayChartDiv sweetFlex"><h1>Categories!</h1></div>
				</div>
				<div class="side-column sweetFlex">
					<div class="panel panel-default">
							<div class="panel-heading">
		                            <i class="fa fa-bell fa-fw"></i> Location Charts
		                     </div>
				          <ul class="nav nav-sidebar">
				            <li id="categoryNav"><a href="#">Category View</a></li>
				            <li id="everyoneNav"><a href="#">Everyone View</a></li>							
				            <li id="barsNav"><a href="#">Bars View</a></li>
				            <li id="libNav"><a href="#">Libraries View</a></li>
				            <li id="otherNav"><a href="#">Other View</a></li>
				          </ul>
					</div>

					<div id="individualUpdates" class="individual sweetFlex">
							<div class="panel panel-default">
		                        <div class="panel-heading">
		                            <i class="fa fa-bell fa-fw"></i> Most Recent Updates
		                        </div>
		                        <!-- /.panel-heading -->
		                        <div class="panel-body">

		                            <!-- /.list-group -->
									
																	<?php include "inc/popular.inc"; ?>
																			                            <a href="#" class="btn btn-default btn-block">View All</a>

																	
		                        </div>

		                        <!-- /.panel-body -->
		                    </div>
		                    <!-- /.panel -->
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
		                    <i class="fa fa-bell fa-fw"></i> Search Logistics
		                 </div>

						<p>Search for Locations</p>
						<form> 
						Name: <input type="text" onkeyup="showHint(this.value)">
						</form>
						<p>Suggestions: <span id="txtHint"></span></p>
						</body>

						<p>Search for People</p>
						<form> 
						Name: <input type="text" onkeyup="getPeople(this.value)">
						</form>
						<p>People: <span id="peopleHint"></span></p>
					</div>
						<div class="panel panel-default">
							<div class="panel-heading">
			                    <i class="fa fa-bell fa-fw"></i> Update Location
			                 </div>

								<button class="locationbutton btn btn-primary" value="1">Mex</button>
								<button class="locationbutton btn btn-primary" value="2">Daily</button>
								<button class="locationbutton btn btn-primary" value="3">Gleason</button>
								<button class="locationbutton btn btn-primary" value="4">PRR</button>
								<button class="locationbutton btn btn-primary" value="5">Stacks</button>
								<button class="locationbutton btn btn-primary" value="6">Off-Campus</button>
								<button class="locationbutton btn btn-primary" value="7">One</button>
								<button class="locationbutton btn btn-primary" value="8">Pearl</button>

						</div>
						<div class="panel panel-default">
						<div class="panel-heading">
		                    <i class="fa fa-bell fa-fw"></i> Account Options
		                 </div>

								<button class="deletebutton btn btn-primary" value="8">DELETE</button>
					
					</div>
					</div>
					

					<script>
					    $('.deletebutton').click(function(){
						console.log("delete button clicked");
						var newloc = $(this).val();
				        $.ajax({
				            type: "POST",
				            url: "Delete.php",
							data: {"value":newloc},
				            success: function(data){

						    console.log("deleting a success!");
							console.log("THIS IS WHAT WE GOT BACK, OUR ECHO COMENTS: ");
							console.log(data);
				            },
				            error: function(XMLHttpRequest, textStatus, errorThrown){
				                addmsg("error", textStatus + " (" + errorThrown + ")");
				                setTimeout(
				                    getRecentUpdates,
				                    1000);
						console.log("Error updating location!");
				            }
				        });
						
						})
				    
					</script>
					
					<script>
					    $('.locationbutton').click(function(){
						console.log("CHANGE button clicked");
						var newloc = $(this).val();
				        $.ajax({
				            type: "POST",
				            url: "Update.php",
							data: {"value":newloc},
				            success: function(data){
							console.log("NEW LOCATION VALUE: ");
							console.log(newloc);
						    console.log("updating a success!");
							console.log("THIS IS WHAT WE GOT BACK, OUR ECHO COMENTS: ");
							console.log(data);
				            },
				            error: function(XMLHttpRequest, textStatus, errorThrown){
				                addmsg("error", textStatus + " (" + errorThrown + ")");
				                setTimeout(
				                    getRecentUpdates,
				                    1000);
						console.log("Error updating location!");
				            }
				        });
						
						})
				    
					</script>
					
					


			


    <script src="js/showgraphs.js"></script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	
	<script src="amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="amcharts/amcharts/pie.js" type="text/javascript"></script>

		

    <script src="js/getlocations.js"></script>

    <script src="js/getpeople.js"></script>


    <ul id="messages"></ul>
    <form action="">
      <input id="m" autocomplete="off" /><button>Send</button>
    </form>

<script src="/socket.io/socket.io.js"></script>
<script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.js"></script>
<script>
var socket = io();
  var socket = io();
  $('form').submit(function(){
    socket.emit('chat message', $('#m').val());
    $('#m').val('');
    return false;
  });
  socket.on('chat message', function(msg){
    $('#messages').append($('<li>').text(msg));
  });
</script>
		
    <script src="js/updatealocation.js"></script>
	<div id="eatmorepie">
	<?php include "generatepie.php"	?>	
	</div>
	<script src="js/longpolling.js"></script>
	
	<div id="messages">Messages go here:</div>



    </body>

</html>



