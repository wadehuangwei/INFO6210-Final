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

$medicalRecordNumber = mysql_real_escape_string($_GET['medicalRecordNumber']);
$treatmentresult;

if (isset($_GET['treatmentresult'])) {
	$treatmentresult = mysql_real_escape_string($_GET['treatmentresult']);
	$sql = "UPDATE MedicalRecord SET Treatmentresult='$treatmentresult' WHERE MedicalRecordNumber='$medicalRecordNumber'";
	$result = $conn->query($sql);
	header("location: requestRecords.php");
}
$sql = "SELECT Treatmentresult FROM MedicalRecord WHERE MedicalRecordNumber='$medicalRecordNumber'";
$result = $conn->query($sql);
$treatmentresult = $result->fetch_assoc();
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
	<h1>Feedback Treatment Result</h1>
	<textarea rows="10" cols="80" name="treatmentresult" form="inputform"><?php
			if (isset($treatmentresult)) {
				echo $treatmentresult['Treatmentresult'];
			}
		?></textarea>
	<form action="/info6210-final/feedbackTreatmentResult.php" id="inputform">
		<input type="hidden" name="medicalRecordNumber" value="<?php echo $medicalRecordNumber ?>" />
		<input type="submit">
	</form>
	</body>
	</html>