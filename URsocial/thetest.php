<html>
<head>
<link rel="stylesheet" type="text/css" href="select_style.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">

<script type="text/javascript" src="jquery.js"></script>
<script>
    $(document).ready(function(){
        $('#mySelect').change(function(){
            myform.submit();
        });
    });

function fetch_select(val)
{
   $.ajax({
     type: 'post',
     url: 'thetest.php',
     data: {
       get_option:val
     },
     success: function (response) {
       console.log("Damn youre good at PHP")
     }
   });
}

</script>

    </head>

   <body>
     <p id="heading">Dynamic Select Option Menu Using Ajax and PHP</p>
	 <center>
	   <div id="select_box">

								<select id="select" class="uLoc" name="uLoc">
									<option value="0">Where'd you go?:</option>
									<option value="1">Mex</option>
									<option value="2">Daily</option>
									<option value="3">Old Toad</option>
								</select>
								
								<form action="thetest.php" method="POST">
								    <select name="myselect" id="myselect" onchange="this.form.submit()">
								        <option value="1">One</option>
								        <option value="2">Two</option>
								        <option value="3">Three</option>
								        <option value="4">Four</option>
								    </select>
								</form>
								
								<body>
								<form method="post" action="thetest.php" name="myform">
								    <select name="x" id="mySelect">
								        <option value="y">y</option>
								        <option value="z">z</option>
								    </select>
								</form>
								</body>
	  
       </div>     
	 </center>
	 
	 <?php 
	 if (isset($_POST("x"))){
	 	echo "Youve been an idiot this whole time";
	 }
	 ?>
	  
   
   </body>
</html>