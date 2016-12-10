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
$time = time() - 15;
$sql = "UPDATE `DeviceDelivery` SET `ShipDate`='$time' WHERE DeviceID = '500001'";
$conn->query($sql);

$sql = "SELECT DateofRequest, MedicalRecordNumber, PatientID, PrescriptionID, treatmentresult FROM MedicalRecord";
$mdResult = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		Request Records
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
                <h3 class="page-header">My Request
                    <small> / History</small>
                </h3>
                
                <ol class="breadcrumb">
                    <li><a href="homePage.php">Home</a>
                    </li>
                    <li class="active">My Request</li>
                </ol>

    <br>
    </div>

	<table>
		<tr>
			<th>Medical Record No.</th>
			<th>Date of Request</th>
			<th>Patient ID</th>
			<th>Symphtoms</th>
			<th>Need test?</th>
			<th>Device No. (Device Tracking)</th>
			<th>Feedback Test Result</th>
			<th>Prescription</th>
			<th>Feedback Treatment Result</th>
		</tr>
		<?php
		if ($mdResult->num_rows > 0) {
			// output data of each row
			while($row = $mdResult->fetch_assoc()) {
				$sql = "SELECT EXISTS(SELECT TestNumber FROM MedicalReordHasTest WHERE MedicalRecordNumber=" . $row['MedicalRecordNumber']. ") AS nt";
				$result = $conn->query($sql);
				$needTest = $result->fetch_assoc();
				$testNumber = -1;
				if ($needTest['nt']) {
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
				// $sql = "SELECT DiseaseID FROM Prescription WHERE PrescriptionID=" . $row['PrescriptionID'];
				// $result = $conn->query($sql);
				// $diseaseID = $result->fetch_assoc();
				echo "<td><a href='/INFO6210-Final/checkSymptoms.php?MedicalRecordNumber=" . $row['MedicalRecordNumber'] . "'>Details</a></td>";

				// Need test? collum
				if ($needTest['nt']) {
					echo "<td>Yes</td>";
				} else {
					echo "<td>No</td>";
				}

				// Device No. (Device Tracking) collum
				$sql = "SELECT DeviceID from Test WHERE TestNumber='$testNumber'";
				$result = $conn->query($sql);
				$deviceID = $result->fetch_assoc();
				if ($needTest['nt']) {
					echo "<td><a href='/INFO6210-Final/deviceTracking.php?deviceID=" . $deviceID['DeviceID'] . "'>". $deviceID['DeviceID'] ."</a></td>";
				} else {
					echo "<td>N/A</td>";
				}

				// test result collum
				if ($needTest['nt']) {
					$sql = "SELECT TestResult FROM test WHERE TestNumber='$testNumber'";
					$result = $conn->query($sql);
					$testResult = $result->fetch_assoc();
					if ((!isset($testResult['TestResult']) || trim($testResult['TestResult'])==='')) {
						echo "<td><a href='/INFO6210-Final/feedbackTestResult.php?testNumber=" . $testNumber . "'>Go</a></td>";
					} else {
						echo "<td><a href='/INFO6210-Final/feedbackTestResult.php?testNumber=" . $testNumber . "'>Update</a></td>";
					}
				} else {
					echo "<td>N/A</td>";
				}

				// Prescription ID collum
				$PrescriptionID = $row['PrescriptionID'];
				$sql = "SELECT DiseaseID FROM Prescription WHERE PrescriptionID='$PrescriptionID'";
				$result = $conn->query($sql);
				$diseaseID = $result->fetch_assoc();
				$isAuto = intval($diseaseID['DiseaseID']) != 0;

				$sql = "SELECT PrescriptionDescription FROM Prescription WHERE PrescriptionID='$PrescriptionID'";
				$result = $conn->query($sql);
				$pd = $result->fetch_assoc();

				if (!$isAuto && (!isset($pd['PrescriptionDescription']) || trim($pd['PrescriptionDescription'])==='')) {
					echo "<td>Pending</td>";
				} else {
					echo "<td><a href='/INFO6210-Final/checkPrescription.php?MedicalRecordNumber=" . $row['MedicalRecordNumber'] . "'>Check</a></td>";
				}

				// treatment result collum
				if ((!isset($row['treatmentresult']) || trim($row['treatmentresult'])==='')) {
					echo "<td><a href='/INFO6210-Final/feedbackTreatmentResult.php?medicalRecordNumber=" . $row['MedicalRecordNumber'] . "'>Go</a></td>";
				} else {
					echo "<td><a href='/INFO6210-Final/feedbackTreatmentResult.php?medicalRecordNumber=" . $row['MedicalRecordNumber'] . "'>Update</a></td>";
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
<br>
<br>
	</div>

	<div ng-include="'footer.html'"></div>

</body>
</html>