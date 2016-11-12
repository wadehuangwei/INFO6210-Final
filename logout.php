<?php

session_start();
session_destroy();
unset($_SESSION['username']);
$_SESSION['message'] = "Your are now logged out";
header("location: login.php");

?>

<?php

    if (isset($_SESSION['message'])) {
    	echo "<div id='error_msg'>" .$_SESSION['message']."</div>";
    	unset($_SESSION['message']);
    }
 
?>