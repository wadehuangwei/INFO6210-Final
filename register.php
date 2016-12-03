<?php
session_start();
//connect to database
$db = mysqli_connect("localhost", "root", "", "healthcare");
if (isset($_POST['register_btn']))
{
	session_start();
	$username = mysql_real_escape_string($_POST['username']);
	$email = mysql_real_escape_string($_POST['email']);
    $phone = mysql_real_escape_string($_POST['phone']);
	$password = mysql_real_escape_string($_POST['password']);
	$password2 = mysql_real_escape_string($_POST['password2']);
    $street = mysql_real_escape_string($_POST['street']);
    $city = mysql_real_escape_string($_POST['city']);
    $state = mysql_real_escape_string($_POST['state']);
    $country = mysql_real_escape_string($_POST['country']);
    $zipcode = mysql_real_escape_string($_POST['zipcode']);
    $accountType = mysql_real_escape_string($_POST['accountType']);



if($password == $password2){
	//create user
$password = md5($password); //hash password before storing for security purposes
$sql_addr = "INSERT INTO Address(Street, City, State, Country, Zipcode) VALUES ('$street', '$city', '$state', '$country', '$zipcode')";
mysqli_query($db, $sql_addr);

$sql_addrID = "SELECT AddressID FROM Address WHERE Street = '$street' AND City = '$city' AND State = '$state' AND Country = '$country' AND Zipcode = '$zipcode' LIMIT 1";
$result_addrID = mysqli_query($db, $sql_addrID);
$row_addrID = mysqli_fetch_assoc($result_addrID);
$addressID = $row_addrID['AddressID'];

$sql_user = "INSERT INTO UserAccount(Username, Email, Password, Phone, AddressID, AccountType) VALUES ('$username', '$email', '$password', '$phone', '$addressID', '$accountType')";
mysqli_query($db, $sql_user);

$sql_userID = "SELECT UserID FROM UserAccount WHERE Email = '$email'";
$result_userID = mysqli_query($db, $sql_userID);
$row_userID = mysqli_fetch_assoc($result_userID);
$userID = $row_userID['UserID'];

$_SESSION['message'] = "Your are now logged in";
$_SESSION['username'] = $username;

//find the nearest warehouse
if($accountType == "patient"){
$max = 0;
$maxID = '';
$sql_wh = "SELECT WarehouseID, Street, City, State FROM Warehouse";
$result_wh = mysqli_query($db, $sql_wh);
while($row_wh = mysqli_fetch_assoc($result_wh)){
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
        }
        if($max < $dist['distance']){
           $max = $dist['distance'];
           $maxID = $warehouseID;
        }
}
        if(!empty($maxID)){
            $maxID = mysql_real_escape_string($maxID);
            $sql_update = "UPDATE Patient SET ClosestWarehouseID = '$maxID' WHERE PatientID = '$userID'";
            $result_update = mysqli_query($db, $sql_update);
        }
    }

header("location: homePage.php");//redirect to home page
}

else
{
	//failed;
	$_SESSION['message'] = "The two passwords do not match";
}	
}

//googlemaps distance matrix api
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

<!DOCTYPE html>
<html>
<head>
	<title>Register, login and logout user php mysql</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>     
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>

<style type="text/css">
    
form {
    border: 3px solid #f1f1f1;
}

input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}
/*
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}*/

img.avatar {
    width: 100%;
/*    border-radius: 10%;
*/}

.container1 {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}


/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>

<body ng-app="">

<div class="jumbotron">
  <div class="container text-center">
    <h1>Intelligent Healthcare Guiding System</h1>      
    <p>Mission, Vission & Values</p>
  </div>
</div>

<div class="container">

<div class="col-md-3">
</div>

<div class="col-md-6">  

<?php

    if (isset($_SESSION['message'])) {
        echo "<div id='error_msg'>" .$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
 
?>
<br>
<form method="post" action="register.php">

<!-- <div class="container1">
    <img src="register.jpg" alt="Avatar" class="avatar" height="200" >
</div> -->

<div class="container1">
<br>
	                <div class="control-group form-group">
                        <div class="controls">
                            <label>Username:</label>
                            <input type="text" class="form-control" name="username" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email Address:</label>
                            <input type="email" class="form-control" name="email" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="password" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Password Aagain:</label>
                            <input type="password" class="form-control" name="password2" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>
                                     
                    </div>

<div class="container1" style="background-color:#f1f1f1">

    <input type="submit" name="register_btn" class="btn btn-primary" value="Register" >
    <span class="psw">Already Have? |<a href="login.php">  Log In</a></span>
</div>

</form>
</div>
</div>

<br>
<br>
<div ng-include="'footer.html'"></div>


</body>
</html>