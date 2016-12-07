<?php
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

$testNumber = mysql_real_escape_string($_GET['testNumber']);

$sql = "SELECT TestResult FROM Test WHERE TestNumber = '$testNumber'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$testResult = $row['TestResult'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		Test Result
	</title>
	<style>
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #dddddd;
	}
	</style>
</head>
<body>
	<a href='homepage.php'>Home Page</a>  
	<a href='processRecords.php'>  &lt;&lt;Back</a></br></br>
	<h1>Test Result</h1>
    <textarea rows="3" cols="20">
    <?php
        echo $testResult; 
    ?>
    </textarea>
</body>
</html>
