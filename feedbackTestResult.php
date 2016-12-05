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
$sql = "SELECT TestResult FROM test WHERE TestNumber='$testNumber'";
$result = $conn->query($sql);
$testResult = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		Request Records
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
	<a href='homepage.php'>Home Page</a></br>
	<textarea rows="4" cols="50" name="comment" form="inputform">
		<?php
			echo $testResult;
		?>
	</textarea>
	<form action="/info6210-final/feedbackTestResult.php" id="inputform">
		<input type="submit">
	</form>
	</body>
	</html>