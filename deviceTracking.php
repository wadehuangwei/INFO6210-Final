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
    //$patientID = 1;
    $sql_addr = "SELECT Address.Street, Address.City, Address.State FROM Address INNER JOIN UserAccount ON Address.AddressID = UserAccount.AddressID WHERE UserAccount.UserID = '$patientID' LIMIT 1";
    $result_addr = $conn->query($sql_addr);
    $row_addr = mysqli_fetch_assoc($result_addr);
    $street = $row_addr['Street'];
    $city = $row_addr['City'];
    $state = $row_addr['State'];
    $coordinates1 = get_coordinates($city, $street, $state);

    $sql_wh = "SELECT NearestWarehouseID FROM Patient WHERE PatientID = '$patientID'";
    $result_wh = $conn->query($sql_wh);
    $row_wh = mysqli_fetch_assoc($result_wh);
    $nearestWarehouseID = $row_wh['NearestWarehouseID'];

    $sql_whaddr = "SELECT Address.Street, Address.City, Address.State FROM Address INNER JOIN Warehouse ON Warehouse.AddressID = Address.AddressID WHERE Warehouse.WarehouseID = '$nearestWarehouseID' LIMIT 1";
    $result_whaddr = $conn->query($sql_whaddr);
    $row_whaddr = mysqli_fetch_assoc($result_whaddr);
    $street_whaddr = $row_whaddr['Street'];
    $city_whaddr = $row_whaddr['City'];
    $state_whaddr = $row_whaddr['State'];
    $coordinates2 = get_coordinates($city_whaddr, $street_whaddr, $state_whaddr);

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

    
    $deviceID = mysql_real_escape_string($_GET['deviceID']);
    //$deviceID = 1;
    $sql_device = "SELECT ShipDate FROM DeviceDelivery WHERE DeviceID = '$deviceID'";
    $result_device = $conn->query($sql_device);
    $row_device = mysqli_fetch_assoc($result_device);
    $shipDate = $row_device['ShipDate'];

   //clock

    $shipTime = strtotime($shipDate);
    //$shipTime = time() - 120;
    //$nowTime = time();
    //$secondsPast = 120;
    //$secondsLeft = 60;

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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzQBsXRx_FJMRAIF1CbTv7-58baFTWjH8&v=3.exp"></script>
    <script>
    function initialize() {

    var mapOptions = {
    zoom: 12,
    center: {lat: <?php echo $midlat; ?>, lng: <?php echo $midlong; ?>},
    mapTypeId: google.maps.MapTypeId.TERRAIN
    };


    var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

    var straightPath = new google.maps.Polyline({
        path: [{lat: <?php echo $coordinates1['lat']; ?>, lng: <?php echo $coordinates1['long']; ?>},
        {lat: <?php echo $coordinates2['lat']; ?>, lng: <?php echo $coordinates2['long']; ?>}],
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 2
    });
    straightPath.setMap(map);

    var marker = new google.maps.Marker({
        position: {lat: <?php echo $midlat; ?>, lng: <?php echo $midlong; ?>},
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