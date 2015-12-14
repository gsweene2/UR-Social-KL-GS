
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


echo "<script
src=\"http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false\">
</script>

<script>
x=43.129771;
y=-77.621311;
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(x,y),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };

  var map=new google.maps.Map(document.getElementById(\"googleMap\"), mapProp);
var imageG='http://vignette2.wikia.nocookie.net/adventuretimewithfinnandjake/images/0/04/Cute_bee_free_avatar_by_klizzy-d5k4ort.gif/revision/latest?cb=20121110012000'
var imageM='http://orig13.deviantart.net/97b1/f/2012/320/5/8/free_bee_icon_by_pinku_ribbon-d5l5k7h.gif'
var imageP='http://a.deviantart.net/avatars/g/r/gravitybee.gif?8'
var imageR='http://i531.photobucket.com/albums/dd354/tinkerbell_0001/Minigifjes1/105.gif'
var imageS='http://orig14.deviantart.net/8cff/f/2009/064/d/5/bee___nuechan_by_pixel_artists.gif'
var imageD='http://a.deviantart.net/avatars/q/u/quirkydoodle.gif?2'
var imageU='http://orig13.deviantart.net/dd48/f/2013/129/c/1/___at_icon_3_3_____shiba_inu_dog______by_emily_the_wolf-d64njqa.gif'

var markerM=new google.maps.Marker({
   position:new google.maps.LatLng(43.154466, -77.595097),
   map: map,
   icon: imageM,
   draggable:true,
});//Mex
var markerP=new google.maps.Marker({
   position:new google.maps.LatLng(43.1437138,-77.610072),
   map: map,
   icon: imageP,
   draggable:true,
});//Pearl
var markerG=new google.maps.Marker({
   position:new google.maps.LatLng(43.128401, -77.628255),
   map: map,
   icon: imageP,
   draggable:true,
});//Gleason
var markerR=new google.maps.Marker({
   position:new google.maps.LatLng(43.128722, -77.628415),
   map: map,
   icon: imageR,
   draggable:true,
});//PRR
var markerS=new google.maps.Marker({
   position:new google.maps.LatLng(43.128333, -77.628778),
   map: map,
   icon: imageS,
   draggable:true,
});//Stacks
var markerD=new google.maps.Marker({
   position:new google.maps.LatLng(43.154289, -77.595068),
   map: map,
   icon: imageD,
   draggable:true,
});//Daily
var markerU=new google.maps.Marker({
   position:new google.maps.LatLng(x, y),
   map: map,
   icon: imageU,
   draggable:true,
});//Daily



    var infowindowG = new google.maps.InfoWindow({
   content: 'Gleason: Fun Library ($c)'
 });
    var infowindowM = new google.maps.InfoWindow({
   content: 'Mex: Student college bar ($a)'
 });
    var infowindowP = new google.maps.InfoWindow({
   content: 'Pearl: Bar Barty (High Class) ($h)'
 });

    var infowindowR = new google.maps.InfoWindow({
   content: 'PRR: Periodical Reading Room ($d)'
 });
    var infowindowD = new google.maps.InfoWindow({
   content: 'Daily: Middle-aged bar ($b)'
 });
     var infowindowS = new google.maps.InfoWindow({
   content: 'Stacks: Deep inside Rush Rhees ($e)'
 });
      var infowindowU = new google.maps.InfoWindow({
   content: 'You are here'
 });


  makeInfoWindowEvent(map, infowindowG, markerG);
  makeInfoWindowEvent(map, infowindowM, markerM);
  makeInfoWindowEvent(map, infowindowP, markerP);
  makeInfoWindowEvent(map, infowindowR, markerR); 
  makeInfoWindowEvent(map, infowindowD, markerD);
  makeInfoWindowEvent(map, infowindowS, markerS);
  makeInfoWindowEvent(map, infowindowU, markerU);
 
 
 }

 function makeInfoWindowEvent(map, infowindow, marker) {
   google.maps.event.addListener(marker, 'click', function() {
 infowindow.open(map, marker);
   });
   

}

google.maps.event.addDomListener(window, 'load', initialize);
</script>"

?>
