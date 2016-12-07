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
$MedicalRecordNumber = mysql_real_escape_string($_GET['MedicalRecordNumber']);
$sql = "SELECT DrugName FROM Drug WHERE DrugID IN (SELECT t1.DrugID FROM (Symphtom AS t1 INNER JOIN MedicaRecordHasSymphtoms AS t2 ON t1.SymphtomID=t2.SymphtomID) WHERE MedicalRecordNumber='$MedicalRecordNumber')";
$DrugName = $conn->query($sql);
$sql = "SELECT t1.PrescriptionDescription FROM (Prescription AS t1 INNER JOIN MedicalRecord AS t2 ON t1.PrescriptionID=t2.PrescriptionID) WHERE MedicalRecordNumber='$MedicalRecordNumber'";
$PrescriptionDescription = $conn->query($sql);
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
	<h1>Prescription:</h1><br>
	<ul>
		<?php
		if ($PrescriptionDescription->num_rows > 0) {
			while ($row = $PrescriptionDescription->fetch_assoc()) {
				echo "<p>" . $row['PrescriptionDescription'] . "</p>";
			}
		}
		echo "<h3>Drugs:</h3>";
		if ($DrugName->num_rows > 0) {
			while ($row = $DrugName->fetch_assoc()) {
				echo "<li>" . $row['DrugName'] . "</li>";
			}
		}
		$conn->close();
		?>
	</ul>
</body>
</html>