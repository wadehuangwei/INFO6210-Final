<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("location: login.php");
}
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

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>   
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/aboutUs.css">

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

<body ng-app="">
<div ng-include="'navBar.php'"></div>     

<div class="container">

<div class="col-lg-12 text-left">
                <h3 class="page-header">Process Records
                    <small> / Details</small>
                </h3>
                
                <ol class="breadcrumb">
                    <li><a href="processRecords.php">Home</a>
                    </li>
                    <li class="active">Process Records</li>
                </ol>

    <br>
</div>


	<table>
		<tr>
			<th>Medical Record No.</th>
			<th>Date of Request</th>
			<th>Patient ID</th>
			<th>Symphtoms</th>
			<th>Prescription ID</th>
			<th>Need test?</th>
			<th>Test Result</th>
		</tr>
		<?php
		if ($mdResult->num_rows > 0) {
			// output data of each row
			while($row = $mdResult->fetch_assoc()) {
				$PrescriptionID = $row['PrescriptionID'];
				$sql = "SELECT DiseaseID FROM Prescription WHERE PrescriptionID='$PrescriptionID'";
				$result = $conn->query($sql);
				$diseaseID = $result->fetch_assoc();
				$isAuto = intval($diseaseID['DiseaseID']) != 0;
				if (!$isAuto) {
					// TODO: add prescription.php page
					echo 	"<tr>
					<td>" . $row['MedicalRecordNumber'] . "</td>
					<td>" . $row['DateofRequest'] . "</td>
					<td><a href='http://localhost/INFO6210-Final/healthRecords.php'>Check</a></td>";

					// Symphtoms collum
					$sql = "SELECT DiseaseID FROM Prescription WHERE PrescriptionID=" . $row['PrescriptionID'];
					$result = $conn->query($sql);
					$diseaseID = $result->fetch_assoc();
					echo "<td><a href='/INFO6210-Final/checkSymptoms.php?MedicalRecordNumber=" . $row['MedicalRecordNumber'] . "'>Details</a></td>";

					// PresccriptionID collum
					$sql_prescription = "SELECT PrescriptionDescription FROM Prescription WHERE PrescriptionID=" . $row['PrescriptionID'];
					$result_prescription = $conn->query($sql_prescription);
					$row_prescription = $result_prescription->fetch_assoc();
					if ((!isset($row_prescription['PrescriptionDescription']) || trim($row_prescription['PrescriptionDescription'])==='')) {
						echo "<td><a href='updatePrescription.php?PrescriptionID=" . $row['PrescriptionID'] . "'>Create</a></td>";
					} else {
						echo "<td><a href='updatePrescription.php?PrescriptionID=" . $row['PrescriptionID'] . "'>Update</a></td>";
					}

					// Need test? collum
					
					echo "<td><a href='device.php?PrescriptionID=" . $row['PrescriptionID'] . "&PatientID=" . $row['PatientID'] . "&MedicalRecordNumber=" . $row['MedicalRecordNumber'] . "'>Yes</a></td>";
					
					// Test Result collum
					$sql = "SELECT COUNT(1) AS Count FROM MedicalReordHasTest WHERE MedicalRecordNumber = " . $row['MedicalRecordNumber']. "";
					$needTest = $conn->query($sql);
					$needTest = $needTest->fetch_assoc();
					$testNumber = -1;
					if (intval($needTest['Count']) ==1) {
						$sql = "SELECT * FROM MedicalReordHasTest WHERE MedicalRecordNumber = " . $row['MedicalRecordNumber'];
						$testNumber = $conn->query($sql);
						$testNumber = $testNumber->fetch_assoc();
						$testNumber = $testNumber['TestNumber'];
						echo "<td><a href='/INFO6210-Final/checkTestResult.php?testNumber=".$testNumber."'>View</a></td>";
					}else{
						echo "<td>N/A</td>";
					}
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
<br><br>
	</div>
	
	<div ng-include="'footer.html'"></div>

</body>
</html>