
<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
if(isset($_POST['EmailLogin']))
{


$emailLog = $_POST['EmailLogin'];

$serverName = "GARRETTSURFACE"; //serverName\instanceName
$connectionInfo = array( "Database"=>"URSocial", "UID"=>"sa", "PWD"=>"Ralphie08");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
}else{
     echo "Connection could not be established.<br /> Please contact the sweet administrative crew.";
     die( print_r( sqlsrv_errors(), true));
}


$sql = "SELECT firstname FROM STUDENTS WHERE email = '$emailLog'";
$stmt = sqlsrv_query($conn,$sql,$params);
		if( sqlsrv_fetch( $stmt ) == false) {
     		die( print_r( sqlsrv_errors(), true));
		}
		
		$name = sqlsrv_get_field($stmt, 0);

$cookie_name = 'phpCookieName';
$cookie_value = $name;
$_COOKIE['phpCookieName'] = $name;

$cookie_Email = 'email';
$cookie_Emailvalue = $emailLog;
$_COOKIE['email'] = $name;

setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');
setcookie($cookie_Email, $cookie_Emailvalue, time() + (86400 * 30), '/');
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
        </style>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
<?php include "inc/nav.inc"; ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Get Social!</h1>
        <p>Connect and interact with your student body at popular social locations off campus! UR Social allows you to see how your student body is spending its time on Social nights.</p>
        <p><a class="btn btn-primary btn-lg" href="signUp.php" role="button">Register Now &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>View Friends Destinations</h2>
          <p>Instantly view your friends social plans and real-time locations as the night progresses. Meet up with those who you may not have contact with on the regular! </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Student Body Activity</h2>
          <p>UR Social gives you the ability to see how your fellow students are spending the night; rather it be in the library, bars, or simply off campus. </p>
          <p><a class="btn btn-default" href="dashboard.php" role="button">See Student Body &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Check-in</h2>
          <p>Check-in at any point during the night to update the live student body feed and allow your close friends to see where you're going!</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>




<script>
document.getElementById("othercookiename").innerHTML=localStorage.getItem("displaynameCookie");
</script>
      <footer>
        <p>&copy; Company 2015</p>
      </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>
    </body>
</html>

