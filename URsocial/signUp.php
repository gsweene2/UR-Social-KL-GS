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

    <div class="container">
	
	<div class="fieldset">
<form method="POST" action="signUp.php" id="form">
<div class="fieldsetheader">Register for URSocial!</div>
<br/>

<div class="form-group">
    <label for="name">First Name:</label>
    <input type="text" class="form-control" name="fname" id="fname" placeholder="First Name">
 </div>
 
 <div class="form-group">
    <label for="name">Last Name:</label>
    <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name">
 </div>
 
 <div class="form-group">
    <label for="name">Age:</label>
    <input type="text" class="form-control" name="age" id="age" placeholder="Age">
 </div>
 
  <div class="form-group">
    <label for="name">Email:</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="Valid Email">
 </div>
 
  <div class="form-group">
    <label for="name">School ID:</label>
    <input type="text" class="form-control" name="sID" id="sID" placeholder="Enter 1 for UR">
 </div>

<input type="submit" name="submit" id="submit" value="Submit">
</form>

<?php

/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */
if(isset($_POST['fname']))
{


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$email = $_POST['email'];
$sID = $_POST['sID'];


$serverName = "GARRETTSURFACE"; //serverName\instanceName
$connectionInfo = array( "Database"=>"URSocial", "UID"=>"sa", "PWD"=>"Ralphie08");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
}else{
     echo "Connection could not be established.<br /> Please contact the sweet administrative crew.";
     die( print_r( sqlsrv_errors(), true));
}


$tsql = "INSERT INTO Students (firstname,lastname,email,age,schoolID,locationID) VALUES (?,?,?,?,?,?)";

/* Set parameter values. */
$params = array($fname,$lname,$email,$age,$sID,1);

/* Prepare and execute the query. */
$stmt = sqlsrv_query( $conn, $tsql, $params);
if( $stmt )
{
     echo "Row successfully inserted.\n";
}
else
{
     echo "Row insertion failed.\n";
     die( print_r( sqlsrv_errors(), true));
}

/* Free statement and connection resources. */
sqlsrv_free_stmt( $stmt);
sqlsrv_close( $conn);







echo "Welcome ".$fname."! Your account has been successfully created";

$cookie_name = 'phpCookieName';
$cookie_value = $fname;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), '/');

}
?>



<script>
function signOut() {
	console.log("Inside SignOut function");
    var cookie_name = 'phpCookieName';
	delete_cookie(cookie_name);
}

function delete_cookie(name){
	console.log("inside delete function");
	document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
}

</script>

</div>

      <footer>

        <p>&copy; URsocial 2015</p>

      </footer>

    </div> <!-- /container -->        
</body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

</html>



