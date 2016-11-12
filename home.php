<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		register
	</title>
</head>logout
<body>

<?php

    if (isset($_SESSION['message'])) {
    	echo "<div id='error_msg'>" .$_SESSION['message']."</div>";
    	unset($_SESSION['message']);
    }
 
?>
<div>register successfully</div>
<div><h4>welcome <?php echo $_SESSION['username']; ?></h4></div>
<div><a href="logout.php"> Logout</a></div>
</body>
</html>