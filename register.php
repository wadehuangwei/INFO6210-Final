<?php
session_start();

//connect to database
$db = mysqli_connect("localhost", "root", "", "authentication");
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
$sql = "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')";
mysqli_query($db, $sql);
$_SESSION['message'] = "Your are now logged in";
$_SESSION['username'] = $username;

header("location: home.php");//redirect to home page
}
else{
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
<body>


<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Quant University</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="lessonsHome.html">Courses</a>
                    </li>
                    <li>
                        <a href="WhitePaperHome.html">White Papers</a>
                    </li>
                    <li>
                        <a href="presentationHome.html">Presentations</a>
                    </li>
                    

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-home-1.html">Blog Home 1</a>
                            </li>
                            
<!--                             <li>
                                <a href="blog-home-2.html">Blog Home 2</a>
                            </li> -->
                            <li>
                                <a href="blog-post.html">Blog Post</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<br>
<br>
<div class="container">
    <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Account
                    <small>Register</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a>
                    </li>
                    <li class="active">Register</li>
                </ol>
            </div>
        </div>

<div class="col-md-3">
</div>

<div class="col-md-6">  

<?php

    if (isset($_SESSION['message'])) {
        echo "<div id='error_msg'>" .$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
 
?>

<form method="post" action="register.php">


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
</body>
</html>