<?php

    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "healthcare";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $patientID = mysql_real_escape_string($_SESSION['username']);
    $sql = "SELECT UserAccount.Street, UserAccount.City, UserAccount.State FROM Patient INNER JOIN UserAccount ON Patient.PatientID = UserAccount.UserID WHERE Patient.PatientID = '$PatientID' LIMIT 1";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $street = $row['Street'];
    $city = $row['City'];
    $state = $row['State'];
    $coordinates1 = get_coordinates($city, $street, $state);

    $sql_wh = "SELECT Warehouse.Street, Warehouse.City, Warehouse.State FROM Patient INNER JOIN Warehouse ON Patient.ClosestWarehouse = Warehouse.WarehouseID WHERE Patient.PatientID = '$PatientID' LIMIT 1";
    $result_wh = $conn->query($sql_wh);
    $row_wh = mysqli_fetch_assoc($result_wh);
    $street_wh = $row_wh['Street'];
    $city_wh = $row_wh['City'];
    $state_wh = $row_wh['State'];
    $coordinates2 = get_coordinates($city_wh, $street_wh, $state_wh);

    function get_coordinates($city, $street, $province)
    {
    $address = urlencode($city.','.$street.','.$province);
    $url = "http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=us";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response);
    $status = $response_a->status;

    if ( $status == 'ZERO_RESULTS' )
    {
        return FALSE;
    }
    else
    {
        $return = array('lat' => $response_a->results[0]->geometry->location->lat, 'long' => $long = $response_a->results[0]->geometry->location->lng);
        return $return;
    }
    }

    //get deviceID from patient
    //get DeliveryDate from device delivery
    //need more queries here

   //clock

   $shipTime = strtotime($shipDate);
   $secondsPast = time() - $shipTime;
   $secondsLeft = 120 - $secondsPast;
   $prop = $secondsPast / 120;
   $midlat = $prop * ($coordinates2['lat'] - $coordinates1['lat']) + $coordinates1['lat'];
   $midlong = $prop * ($coordinates2['long'] - $coordinates1['long']) + $coordinates1['long'];

   $conn->close();

?>



<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Device tracking</title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
    function initialize() {
    var centerLatLng = [
    <?php
    echo 'new google.maps.LatLng('.$midlat.', '.$midlong.')'; 
    ?>
    ];
    var mapOptions = {
    zoom: 12,
    center: centerLatLng,
    mapTypeId: google.maps.MapTypeId.TERRAIN
    };


    var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

    var deliveryCoordinates = [
    <?php
    
    //Echo out the users start location
    echo 'new google.maps.LatLng('.$coordinates1['lat'].', '.$coordinates1['long'].'),'; 

    //echo users ending position
    echo 'new google.maps.LatLng('.$coordinates2['lat'].', '.$coordinates2['long'].')';
    ?>
    ];

    var straightPath = new google.maps.Polyline({
        path: deliveryCoordinates,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
    });
    straightPath.setMap(map);

    var marker = new google.maps.Marker({
        position: centerLatLng,
        map: map,
        title: 'Your device'
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    </head>
    <body>
        <div id="clock">
        	<h3>Your device will be delivered in <?php echo $secondsLeft; ?> seconds.</h3>
        </div>
        <div id="map-canvas"></div>
    </body>
</html>