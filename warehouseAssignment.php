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
$sql = "SELECT UserAccount.Street, UserAccount.City, UserAccount.State FROM Patient INNER JOIN UserAccount ON Patient.PatientID = UserAccount.UserID WHERE Patient.PatientID = '$PatientID'";
$result = $conn->query($sql);

if(mysqli_num_rows($result) == 1){
        $row = mysql_fetch_array($result);
        $street = $row['Street'];
        $city = $row['City'];
        $state = $row['State'];
        $max = 0;
        $maxID = '';

        $sql_wh = "SELECT WarehouseID, Street, City, State FROM Warehouse";
        $result_wh = $conn->query($sql_wh);
        while($row_wh = mysql_fetch_array($result_wh)){
        	$street_wh = $row_wh['Street'];
            $city_wh = $row_wh['City'];
            $state_wh = $row_wh['State'];
            $warehouseID = $row_wh['WarehouseID'];

            $coordinates1 = get_coordinates($city, $street, $state);
            $coordinates2 = get_coordinates($city_wh, $street_wh, $state_wh);
            if ( !$coordinates1 || !$coordinates2 ){
               echo 'Bad address.';
            }
            else{
               $dist = GetDrivingDistance($coordinates1['lat'], $coordinates2['lat'], $coordinates1['long'], $coordinates2['long']);
               echo 'Distance: <b>'.$dist['distance'].'</b><br>Travel time duration: <b>'.$dist['time'].'</b>';
            }
            if($max < $dist['distance']){
            	$max = $dist['distance'];
            	$maxID = $warehouseID;
            }
        }
        if(!empty($maxID)){
        	$sql_update = "UPDATE Patient SET ClosestWarehouse = '$maxID' WHERE PatientID = '$patientID'";
        	$result_update = $conn->query($sql_update);
        }
        
    } else
    {
        $_SESSION['message'] = "User address doesn't exist.";
    }

$conn->close();

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

function GetDrivingDistance($lat1, $lat2, $long1, $long2)
{
    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat1.",".$long1."&destinations=".$lat2.",".$long2."&mode=driving&language=en";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    $response = curl_exec($ch);
    curl_close($ch);
    $response_a = json_decode($response, true);
    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
    $time = $response_a['rows'][0]['elements'][0]['duration']['text'];

    return array('distance' => $dist, 'time' => $time);
}
?>