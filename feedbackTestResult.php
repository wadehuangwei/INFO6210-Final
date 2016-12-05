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
$testResult;

if (isset($_GET['testResult'])) {
	$testResult = mysql_real_escape_string($_GET['testResult']);
	$sql = "UPDATE test SET TestResult='$testResult' WHERE TestNumber='$testNumber'";
	$result = $conn->query($sql);
	header("location: requestRecords.php");
}
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
	<a href='homepage.php'>Home Page</a>  
	<a href='requestRecords.php'>  &lt;&lt;Back</a></br></br>
	<h1>Feedback Test Result</h1>
	<textarea rows="10" cols="80" name="testResult" form="inputform"><?php
			if (isset($testResult)) {
				echo $testResult['TestResult'];
			}
		?></textarea>
	<form action="/info6210-final/feedbackTestResult.php" id="inputform">
		<input type="hidden" name="testNumber" value="<?php echo $testNumber ?>" />
		<input type="submit">
	</form>
	</body>
	</html>