
<?php
session_start();
//connect to database
$db = mysqli_connect("localhost", "root", "", "healthcare");

if (isset($_POST['login_btn']))
{
  $username = mysql_real_escape_string($_POST['username']);
  $password = mysql_real_escape_string($_POST['password']);

    $password = md5($password); //remember we hased password before string last time
    $sql = "SELECT * FROM useraccount WHERE username ='$username' AND password ='$password'";
    $result = mysqli_query($db,$sql);

    if(mysqli_num_rows($result) == 1){
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['username'] = $username;

        header("location: homePage.php"); //redirect to home page

    } else
    {

        $_SESSION['message'] = "Username/password combination incorrect";

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

<style>
body{
/*  background-color: #f1f1f1;
*/}
form {
    border: 3px solid #f1f1f1;
    background-color: white;
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

footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

</style>

<body>

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

<form method="post" action="login.php">

                    <div class="container1">
                     <img src="register.jpg" alt="Avatar" class="avatar" height="200" >
                    </div>

                    <div class="container1">  
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Username:</label>
                            <input type="text" class="form-control" name="username" required data-validation-required-message="Please enter your name.">
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
                    </div>
                                     
                    <div class="container1" style="background-color:#f1f1f1">
                    <input type="submit" name="login_btn" class="btn btn-primary" value="Login" >
                    <span class="psw">New User? |<a href="register.php">  Register</a></span>
                    </div>

</form>
</div>

</div>
<br>
<br>

<footer class="container-fluid text-center">
  <p>Online Store Copyright</p>  
  
</footer>

</body>
</html>