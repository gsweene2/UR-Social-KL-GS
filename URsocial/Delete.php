
		<?php
		
		
		$serverName = "GARRETTSURFACE"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"URSocial", "UID"=>"sa", "PWD"=>"Ralphie08");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		if( $conn ) {
		}else{
     		echo "Connection could not be established.<br /> Please contact the sweet administrative crew.";
     		die( print_r( sqlsrv_errors(), true));
		}
		
		$cookie_name = 'email';
		if(isset($_COOKIE[$cookie_name])) {

		$cookievalue = $_COOKIE[$cookie_name];
		
		/* Set up the parameterized query. */
		$tsql = "DELETE FROM Students WHERE email= '$cookievalue'";

		/* Assign literal parameter values. */
		$params = array( 5, 10);

		/* Execute the query. */
		if( sqlsrv_query( $conn, $tsql, $params))
		{
		      echo "Statement executed.\n";
		} 
		else
		{
		      echo "Error in statement execution.\n";
		      die( print_r( sqlsrv_errors(), true));
		}
		
		}

		/* Free connection resources. */
		sqlsrv_close( $conn);
			
		?>
		



