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
	<h1>My Requests</h1><br>
	<table>
		<tr>
			<th>Medical Record No.</th>
			<th>Date of Request</th>
			<th>Patient ID</th>
			<th>Symphtoms</th>
			<th>Need test?</th>
			<th>Test No. (Device Tracking)</th>
			<th>Feedback Test Result</th>
			<th>Prescription ID</th>
			<th>Feedback Treatment Result</th>
		</tr>
		<?php
		if ($mdResult->num_rows > 0) {
			// output data of each row
			while($row = $mdResult->fetch_assoc()) {
				$sql = "SELECT EXISTS(SELECT TestNumber FROM MedicalReordHasTest WHERE MedicalRecordNumber=" . $row['MedicalRecordNumber']. ")";
				$needTest = $conn->query($sql);
				$testNumber = -1;
				if ($needTest) {
					$sql = "SELECT * FROM MedicalReordHasTest WHERE MedicalRecordNumber = " . $row['MedicalRecordNumber'];
					$result = $conn->query($sql);
					$testNumberArray = $result->fetch_assoc();
					$testNumber = $testNumberArray['TestNumber'];
				}

				echo 	"<tr>
				<td>" . $row['MedicalRecordNumber'] . "</td>
				<td>" . $row['DateofRequest'] . "</td>
				<td>" . $row['PatientID'] . "</td>";

				// Symphtoms collum
				$sql = "SELECT DiseaseID FROM Prescription WHERE PrescriptionID=" . $row['PrescriptionID'];
				$result = $conn->query($sql);
				$diseaseID = $result->fetch_assoc();
				echo "<td><a href='/INFO6210-Final/symphtoms.php?MedicalRecordNumber=" . $row['MedicalRecordNumber'] . "'>Details</a></td>";

				// Need test? collum
				if ($needTest) {
					echo "<td>Yes</td>";
				} else {
					echo "<td>No</td>";
				}

				// Test No. (Device Tracking) collum
				$sql = "SELECT DeviceID from Test WHERE TestNumber='$testNumber'";
				$result = $conn->query($sql);
				$deviceID = $result->fetch_assoc();
				if ($needTest) {
					// TODO: add tracking page
					echo "<td><a href='/INFO6210-Final/deviceTracking.php?deviceID=" . $deviceID['DeviceID'] . "'>GO</a></td>";
				} else {
					echo "<td>N/A</td>";
				}

				// test result collum
				// TODO: add feedbackTestResult page
				echo "<td><a href='/INFO6210-Final/feedbackTestResult.php?testNumber=" . $testNumber . "'>GO</a></td>";

				// Prescription ID collum
				// TODO: add prescription page
				echo "<td><a href='/INFO6210-Final/prescription.php?PrescriptionID=>" . $row['PrescriptionID'] . "'>" . $row['PrescriptionID'] . "</td>";

				// treatment result collum
				// TODO: add feedbackTreatmentResult page
				if ((!isset($row['treatmentresult']) || trim($row['treatmentresult'])==='')) {
					echo "<td><a href='/INFO6210-Final/feedbackTreatmentResult.php?testNumber=" . $testNumber . "'>GO</a></td>";
				} else {
					echo "<td>" . $row['treatmentresult'] . "</td></tr>";
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