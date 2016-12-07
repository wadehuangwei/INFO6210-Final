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

if(isset($_GET['PrescriptionID'])){
	$prescriptionID = mysql_real_escape_string($_GET['PrescriptionID']);
	$_SESSION['prescriptionID'] = $prescriptionID;
}else{
	$prescriptionID = $_SESSION['prescriptionID'];
}

$description = "";

if (isset($_GET['description'])) {
	$description = mysql_real_escape_string($_GET['description']);
	$prescriptionID = mysql_real_escape_string($_GET['prescriptionID']);
	$sql = "UPDATE Prescription SET PrescriptionDescription='$description' WHERE PrescriptionID='$prescriptionID'";
	$result = $conn->query($sql);
	header("location: processRecords.php");
}
$sql = "SELECT PrescriptionDescription FROM Prescription WHERE PrescriptionID ='$prescriptionID'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$description = $row['PrescriptionDescription'];
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
	<h1>Edit Prescription</h1>
	<textarea rows="10" cols="80" name="description" form="inputform"><?php
		if (!empty($description)) {
			echo $description;
		}
		?></textarea>
		<form action="updatePrescription.php" id="inputform">
			<input type="hidden" name="prescriptionID" value="<?php echo $prescriptionID ?>" />
			<input type="submit">
		</form>
	</body>
	</html>