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
                chart.write(\"everyonediv\");
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
                chartCat.write(\"categorydiv\");
            });
        </script>";
		
		
		sqlsrv_close( $conn );

		?>
