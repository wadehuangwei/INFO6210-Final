
<?php
	session_start();
	//connect to database
	$db = mysqli_connect("localhost", "root", "", "healthcare");

	if (isset($_POST['login_btn'])) {
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);

		$password = md5($password); //remember we hased password before string last time

		$sql = "SELECT * FROM UserAccount WHERE Username ='$username' AND Password ='$password'";
		$result = mysqli_query($db,$sql);
		$row_accType = mysqli_fetch_assoc($result);

		$accountType = $row_accType['AccountType'];

		if(mysqli_num_rows($result) == 1) {
			$_SESSION['message'] = "You are now logged in";
			$_SESSION['username'] = $username;
			
			if($accountType == "Doctor") {
				header("location: processRecords.php");//redirect to home page
			}

			if($accountType =="Patient") {
				header("location: homePage.php");
			}
			// header("location: homePage.php"); //redirect to home page
		} else {
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
	<link rel="stylesheet" type="text/css" href="css/login.css">

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

					<!-- <select>
					<option value="Register">Register</option>
					<a href="register.php"><option value="patient" name ="patient" >As a Patient</option></a>
					<a href="register.php"><option value="doctor" name="doctor" >As a Doctor</option></a></span> -->

				</div>

			</form>
		</div>

	</div>
	<br>
	<br>

	<div ng-include="'footer.html'"></div>


</body>
</html>