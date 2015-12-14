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
			
			#chartdiv{
				display: inline-block;
				width: 100%;
				 height: 500px;
				 
			}
			
			#categoryView{
				display: inline-block;
				width: 100%; 
				height: 500px;
			}
			
			.sweetFlex{
				display: inline-block;
				vertical-align: top;
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
		<?php include "inc/googlemaps.inc"; ?>

    </head>

    <body>

<?php 
include "inc/nav.inc";
?>

        <br/>
		<br/>
		
		
<!-- chart 1 -->
          <h1 class="page-header">River Campus Map</h1>

				<div class="main-column sweetFlex">
					<div id="googleMap" style="width:100%;height:600px;"></div>
				</div>
				<div class="side-column sweetFlex">

					<div class="individual sweetFlex">
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

					</div>
					


			
						<script>
						console.log("script run")
						var everybodyChart = document.getElementById('chartdiv');
						var barsChart = document.getElementById('categoryView');

						document.getElementById("everyoneNav").onclick = function () {
							console.log("everyone clicked");
							var display = document.getElementById("chartdiv");
							var dontdisplay = document.getElementById("categoryView");

							console.log("Display name:");

							for(var i=0, n= display.length; i<n; ++i){
														console.log(display.length);

							display[i].id = "chartdiv";	
							console.log(display[i].id);	
							window.location.reload(true);
							
							dontdisplay.style.display = 'block';
							display.style.display = 'none';						
							}
						};
						document.getElementById("barsNav").onclick = function () {
							console.log("bars clicked");
							console.log("Display name:");

							var display = document.getElementById("chartdiv");
							var dontdisplay = document.getElementById("categoryView");

							for(var i=0, n= display.length; i<n; ++i){
							console.log(display.length);
							display[i].id = "categoryView";	
							console.log(display[i].id);	
							window.location.reload(true);
							
							dontdisplay.style.display = 'none';
							display.style.display = 'block';						
							
							}
						};




						</script>




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

		

<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "gethint.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

<script>
function getPeople(str) {
    if (str.length == 0) { 
        document.getElementById("peopleHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("peopleHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "getPeople.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

<body>


</body>

		
		<script>
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
		</script>
		
		<?php
		$serverName = "GARRETTSURFACE"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"URSocial", "UID"=>"sa", "PWD"=>"Ralphie08");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		if( $conn ) {
		}else{
     		echo "Connection could not be established.<br /> Please contact the sweet administrative crew.";
     		die( print_r( sqlsrv_errors(), true));
		}
		
		

		//going to have to make this something else to generate number of locations
		$locations = array("1","2","3","4","5","6","7","8");
		$locationValues = array();
        foreach($locations as $value){
		$sql1 = "SELECT COUNT(*) FROM STUDENTS WHERE locationID= $value";
		$stmt = sqlsrv_query($conn,$sql1,$params);
		
		if( sqlsrv_fetch( $stmt ) === false) {
     		die( print_r( sqlsrv_errors(), true));
		}
		
		$name = sqlsrv_get_field( $stmt, 0);
		$locationValues[]=$name;

		}	
		
		$a= $locationValues[0];
		$b= $locationValues[1];
		$c= $locationValues[2];
		$d= $locationValues[3];
		$e= $locationValues[4];
		$f= $locationValues[5];
		$g= $locationValues[6];
		$h= $locationValues[7];
		
		
		echo "<script>
            var chart;
            var legend;

            var chartData = [
                {
                    \"country\": \"Mex\",
                    \"value\": $a,
                },
                {
                    \"country\": \"Daily\",
                    \"value\": $b,
                },
				                {
                    \"country\": \"Gleason\",
                    \"value\": $c,
                },
				                {
                    \"country\": \"PRR\",
                    \"value\": $d,
                },
				                {
                    \"country\": \"Stacks\",
                    \"value\": $e,
                },
				                {
                    \"country\": \"Off-Campus\",
                    \"value\": $f,
                },
				                {
                    \"country\": \"One\",
                    \"value\": $g,
                },
				                {
                    \"country\": \"Pearl\",
                    \"value\": $h,
                }
            ];

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartData;
                chart.titleField = \"country\";
                chart.valueField = \"value\";
                chart.outlineColor = \"black\";
                chart.outlineAlpha = 0.8;
                chart.outlineThickness = 2;
                chart.balloonText = \"[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>\";
                chart.depth3D = 15;
                chart.angle = 30;

                // WRITE
                chart.write(\"chartdiv\");
            });
        </script>";
		
		$catlocs = array("1","2","3","4");
		$catlocsValues = array();
        foreach($catlocs as $catvalue){
		$sqlloccat = "Select Count(*) from LocCategories a inner join Locations b on a.categoryID = b.categoryID inner join Students c on c.locationID = b.locationID where b.categoryID = $catvalue";
		$stmtGetCats = sqlsrv_query($conn,$sqlloccat,$params);
		
		if( sqlsrv_fetch( $stmtGetCats ) === false) {
     		die( print_r( sqlsrv_errors(), true));
		}
		
		$categoryNames = sqlsrv_get_field( $stmtGetCats, 0);
		$catlocsValues[]=$categoryNames;

		}
		
		$bar = $catlocsValues[0];
		$library = $catlocsValues[1];
		$other = $catlocsValues[2];
		$barparty = $catlocsValues[3];
		
				echo "<script>
            var chartCat;
            var legend;

            var chartDataCat = [
                {
                    \"country\": \"Bars\",
                    \"value\": $bar,
                },
                {
                    \"country\": \"Library\",
                    \"value\": $library,
                },
				                {
                    \"country\": \"Other\",
                    \"value\": $other,
                },
				                {
                    \"country\": \"Bar Party\",
                    \"value\": $barparty,
                }
            ];

            AmCharts.ready(function () {
                // PIE CHART
                chartCat = new AmCharts.AmPieChart();
                chartCat.dataProvider = chartDataCat;
                chartCat.titleField = \"country\";
                chartCat.valueField = \"value\";
                chartCat.outlineColor = \"black\";
                chartCat.outlineAlpha = 0.8;
                chartCat.outlineThickness = 2;
                chartCat.balloonText = \"[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>\";
                chartCat.depth3D = 15;
                chartCat.angle = 30;

                // WRITE
                chartCat.write(\"categoryView\");
            });
        </script>";
		
		?>
		


    </body>

</html>



