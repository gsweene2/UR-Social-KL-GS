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

        </style>

        <link rel="stylesheet" href="css/bootstrap-theme.min.css">

        <link rel="stylesheet" href="css/main.css">



        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>

    </head>

    <body>

<?php include "inc/nav.inc" ?>

        

				<div id="chartdiv" style="width: 100%; height: 0px;"></div>
          <h1 class="page-header">Dashboard</h1>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	
	<script src="amcharts/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="amcharts/amcharts/pie.js" type="text/javascript"></script>

        
		
		<?php
		
		
		$serverName = "GARRETTSURFACE"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"URSocial", "UID"=>"sa", "PWD"=>"Ralphie08");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		if( $conn ) {
		}else{
     		echo "Connection could not be established.<br /> Please contact the sweet administrative crew.";
     		die( print_r( sqlsrv_errors(), true));
		}
		
		
		$cookie_email = 'email';
		if(isset($_COOKIE[$cookie_email])) {

		
		$sql1 = "SELECT * FROM STUDENTS WHERE email= $cookie_email";
		$stmt = sqlsrv_query($conn,$sql1,$params);
		
		if( sqlsrv_fetch( $stmt ) === false) {
     		die( print_r( sqlsrv_errors(), true));
		}
		
		$email = sqlsrv_get_field( $stmt, 0);
		}
			
		?>
		
		<form>
		<select name="locations" onchange="changeLocation(this.value)">
		<option value="">Where'd you go?:</option>\
		<option value="1">Mex</option>
		<option value="2 ">Daily</option>
		<option value="3">Old Toad</option>
		</select>
		</form>


    </body>

</html>



