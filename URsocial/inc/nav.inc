    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">UR Social</a>
<?php
$cookie_name = 'phpCookieName';
if(isset($_COOKIE[$cookie_name])) {

print '<p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link">' .$_COOKIE[$cookie_name] .'</a></p>';


print '<p class="navbar-text navbar-right"><button onclick="signOut()">Sign Out</button></p>';





} else {

print '
<form class="navbar-text navbar-right" method="post" action="index.php">
  <p class="navbar-text navbar-right"><button type="submit" formmethod="post" formaction="index.php">Log In!</button>
 </p> <p class="navbar-text navbar-right">Email: <input type="text" name="EmailLogin"></p>
</form>
 
';

}
?>


<script>
function signOut() {
	console.log("Inside SignOut function");
    	var cookie_name = 'phpCookieName';
	delete_cookie(cookie_name);
	location.reload(true);
}

function delete_cookie(name){
	console.log("inside delete function");
	document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/";
}
</script>
        </div>
      </div>
    </nav>