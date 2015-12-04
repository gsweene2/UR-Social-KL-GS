<?php
		$serverName = "GARRETTSURFACE"; //serverName\instanceName
		$connectionInfo = array( "Database"=>"URSocial", "UID"=>"sa", "PWD"=>"Ralphie08");
		$conn = sqlsrv_connect( $serverName, $connectionInfo);

		if( $conn ) {
		}else{
     		echo "Connection could not be established.<br /> Please contact the sweet administrative crew.";
     		die( print_r( sqlsrv_errors(), true));
		}
		
		$sqlUpdate = "Select name from Locations";
		$stmt = sqlsrv_query($conn,$sqlUpdate,$params);
		
		if( sqlsrv_fetch( $stmt ) === false) {
     		die( print_r( sqlsrv_errors(), true));
		}
		while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ){ 
        	$b[]= $row['name'];
		}
		

 // get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($b as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
         }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
 echo $hint === "" ? "no suggestion" : $hint;
?>