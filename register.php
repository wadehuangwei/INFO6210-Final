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

if($password == $password2){
	//create user
$password = md5($password); //hash password before storing for security purposes
$sql = "INSERT INTO UserAccount(username, email, password) VALUES ('$username', '$email', '$password')";
mysqli_query($db, $sql);
$_SESSION['message'] = "Your are now logged in";
$_SESSION['username'] = $username;

header("location: homePage.php");//redirect to home page
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