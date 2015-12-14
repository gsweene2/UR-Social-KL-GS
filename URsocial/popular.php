
		<?php

		$serverName = "GARRETTSURFACE"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"URSocial", "UID"=>"sa", "PWD"=>"Ralphie08");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		if( $conn ) {
		}else{
     		echo "Connection could not be established.<br /> Please contact the sweet administrative crew.";
     		die( print_r( sqlsrv_errors(), true));
		}
		
		

		$sqlUpdate = "Select a.firstname as first, a.lastname as last, b.name as name, RIGHT(dateUpdated,8) as date from Students a inner join Locations b on a.locationID = b.locationID order by dateUpdated desc";
		$stmt2 = sqlsrv_query($conn,$sqlUpdate,$params);
		
		if( sqlsrv_fetch( $stmt2 ) === false) {
     		die( print_r( sqlsrv_errors(), true));
		} else{
		}

		$i = 0;
		echo "<div class=\"panel panel-default\">
		<div class=\"panel-heading\">
		<i class=\"fa fa-bell fa-fw\"></i> Most Recent Updates
		</div>
		<div class=\"panel-body\">";
		while( $row = sqlsrv_fetch_array( $stmt2, SQLSRV_FETCH_ASSOC) ){
		if($i>6){break;}
		echo "<a href=\"#\" class=\"list-group-item\"><i class=\"fa fa-comment fa-fw\"></i>". $row['first']. " ". $row['last'] . " (". $row['name']. ")" . "  <span class=\"pull-right text-muted small\"><em>" . $row['date'] . "</em></span></a>";
		$i=$i+1;
		}
		echo "</div></div>";
		
sqlsrv_close( $conn );

?>
