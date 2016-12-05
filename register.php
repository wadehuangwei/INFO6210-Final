<?php
session_start();
//connect to database
$db = mysqli_connect("localhost", "root", "", "healthcare");


if (isset($_POST['register_btn']))
{
	session_start();

	$username = mysql_real_escape_string($_POST['username']);
	$email = mysql_real_escape_string($_POST['email']);
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
$sql_addr = "INSERT INTO Address(Street, City, State, Zipcode) VALUES ('$street', '$city', '$state', '$zipcode')";
mysqli_query($db, $sql_addr);


$sql_addrID = "SELECT * FROM Address WHERE Street = '$street' AND City = '$city' AND State = '$state' AND Zipcode = '$zipcode' LIMIT 1";

$result_addrID = mysqli_query($db, $sql_addrID);

$row_addrID = mysqli_fetch_assoc($result_addrID);
$addressID = $row_addrID['AddressID'];


$sql_user = "INSERT INTO UserAccount(Username, Email, Password, AddressID, AccountType) VALUES ('$username', '$email', '$password', '$addressID','$accountType')";
mysqli_query($db, $sql_user);

$_SESSION['message'] = "Your are now logged in";
$_SESSION['username'] = $username;

// header("location: login.php");//redirect to home page

if($accountType == "Doctor"){
 header("location: register.php");//redirect to home page
} 

if($accountType =="Patient"){
header("location: homePage.php");
}

}

else
{
	//failed;
	$_SESSION['message'] = "The two passwords do not match";

}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register, login and logout user php mysql</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    <link rel="stylesheet" type="text/css" href="css/login.css">
     
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</head>


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

                    <div class="form-group">
                        <div class="controls">
                            <label for="exampleSelect1">Registered As</label>
                            <select class="form-control" id="exampleSelect1" name="accountType">
                            <option>Patient</option>
                            <option>Doctor</option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Street:</label>
                            <input type="text" class="" name="street" required data-validation-required-message="Please enter your name.">
                            <p class="help-block"></p>
                        </div>
                    </div>

                    <div class="control-group form-group">
                    <div class="controls">
                    <div class="row">
                         <div class="col-xs-4">
                            <label>State</label>
                             <input type="text" class="" name="state" placeholder="">
                         </div>
                         <div class="col-xs-4 ">
                            <label >City</label>
                            <input type="text" class="" name="city" placeholder="">
                         </div>
                         <div class="col-xs-4">
                            <label>Zip Cpde</label>
                            <input type="text" class="" name="zipcode" placeholder="">
                         </div>
                    </div>
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
    <span class="psw">Already Have? |<a href="login.php"> Log In</a></span>
</div>

</form>
</div>
</div>

<br>
<br>
<div ng-include="'footer.html'"></div>


</body>
</html>