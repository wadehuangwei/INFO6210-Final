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

$sql = "SELECT DateofRequest, MedicalRecordNumber, PatientID, PrescriptionID, treatmentresult FROM MedicalRecord";
$mdResult = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		Process Records
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
	<h1>All Requests</h1><br>
	<table>
		<tr>
			<th>Medical Record No.</th>
			<th>Date of Request</th>
			<th>Patient ID</th>
			<th>Prescription ID</th>
			<th>Need test?</th>
			<th>Test No. (Device Tracking)</th>
		</tr>
		<?php
		if ($mdResult->num_rows > 0) {
			// output data of each row
			while($row = $mdResult->fetch_assoc()) {
				$sql = "EXISTS (SELECT * FROM MedicalRecordHasTest WHERE MedicalRecordNumber = " . $row['MedicalRecordNumber']. ")";
				$needTest = $conn->query($sql);
				$testNumber = -1;
				if ($needTest) {
					$sql = "SELECT * FROM MedicalRecordHasTest WHERE MedicalRecordNumber = " . $row['MedicalRecordNumber'];
					$testNumber = $conn->query($sql);
				}
				// TODO: add prescription.php page
				echo 	"<tr>
				<td>" . $row['MedicalRecordNumber'] . "</td>
				<td>" . $row['DateofRequest'] . "</td>
				<td><a href='/INFO6210-Final/patient.php?PatientID=" . $row['PatientID'] . "'>" . $row['PatientID'] . "</td>
				<td><a href='/INFO6210-Final/prescription.php?PrescriptionID=" . $row['PrescriptionID'] . "'>" . $row['PrescriptionID'] . "</td>";

				// Need test? collum
				if ($needTest) {
					echo "<td>Yes</td>";
				} else {
					echo "<td>No</td>";
				}

				// Test No. (Device Tracking) collum
				if ($needTest) {
					// TODO: add tracking page
					echo "<td><a href='/INFO6210-Final/tracking.php?testNumber=" . $testNumber . "'>GO</a></td>";
				} else {
					echo "<td>N/A</td>";
				}
				
			}
		} else {
			echo "<tr>
			<td>0 Results</td>
			</tr>";
		}
		$conn->close();
		?>
	</table>
</body>
</html>