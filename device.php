<?php	
session_start();

if(isset($_GET['PatientID'])||isset($_GET['PrescriptionID'])||isset($_GET['MedicalRecordNumber'])){
$patientID = mysql_real_escape_string($_GET['PatientID']);
$prescriptionID = mysql_real_escape_string($_GET['PrescriptionID']);
$medicalRecordNumber = mysql_real_escape_string($_GET['MedicalRecordNumber']);
$_SESSION['patientID'] = $patientID;
$_SESSION['prescriptionID'] = $prescriptionID;
$_SESSION['medicalRecordNumber'] = $medicalRecordNumber;
}else{
	$patientID = $_SESSION['patientID'];
	$prescriptionID = $_SESSION['prescriptionID'];
	$medicalRecordNumber = $_SESSION['medicalRecordNumber'];

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

$sql = "SELECT * FROM Device";
$device = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		Devices
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
                <h3 class="page-header">All Devices
                    <small> / Details</small>
                </h3>

                <ol class="breadcrumb">
                    <li><a href="processRecords.php">Home</a>
                    </li>
                    <li class="active">Edit Prescription</li>

                </ol>

    <br>
</div>

	<?php 
	    $sql_type = "SELECT * FROM DeviceType";
	    $type = $conn->query($sql_type);
	    echo "<form method='post' action='device.php'>
	    <input type='submit' name = 'select_btn' value='Select'>";
	    if($type ->num_rows > 0){
	    while ($row_type = $type->fetch_assoc()){
	    	echo "<h3>Device Type: ".$row_type['DeviceType']."</h3>";
	    	echo "
	    	<table>
		       <tr>
			      <th>Device ID</th>
			      <th>Price</th>
		       </tr>";
	    	$sql_device = "SELECT * FROM Device WHERE DeviceTypeID = ".$row_type['DeviceTypeID']."";
	    	$devices = $conn->query($sql_device);
	    	if($devices ->num_rows > 0){
	            while ($row_device = $devices->fetch_assoc()){
	            	$deviceID = $row_device['DeviceID'];
	            	echo "<tr>
	            	<td><input type='radio' name='deviceID' value=".$deviceID.">".$deviceID."</td>
	            	<td>".$row_device['Price'].
	            	"<input type ='hidden' name='patientID' value=".$patientID.">
	            	<input type ='hidden' name='prescriptionID' value=".$prescriptionID."></td>
	            	</tr>";
	            	
                }
            }
            echo "</table>";
            echo "<br><br>";
	    }
}
echo "</form>";

if (isset($_POST['select_btn'])){

	    $deviceID = mysql_real_escape_string($_POST['deviceID']);
	    $patientID = mysql_real_escape_string($_POST['patientID']);
	    $prescriptionID = mysql_real_escape_string($_POST['prescriptionID']);

	    $sql_check = "SELECT COUNT(1) AS Count FROM MedicalReordHasTest WHERE MedicalRecordNumber = '$medicalRecordNumber' AND TestNumber IS NOT NULL";
        $result_check = $conn->query($sql_check);
        $row_check = $result_check->fetch_assoc();

        if(intval($row_check['Count']) == 0){
	    $sql_test = "INSERT INTO Test(PatientID, DeviceID, PrescriptionID) VALUES (".$patientID.", ".$deviceID.", ".$prescriptionID.")";
        $conn->query($sql_test);

        $sql_getTest = "SELECT TestNumber FROM Test WHERE PatientID = ".$patientID." AND DeviceID = ".$deviceID." AND PrescriptionID = ".$prescriptionID."";
        $result_getTest = $conn->query($sql_getTest);
        $row_getTest = $result_getTest->fetch_assoc();
        $testNumber = $row_getTest['TestNumber'];
        
        $sql_record = "INSERT INTO MedicalReordHasTest(MedicalRecordNumber, TestNumber) VALUES ('$medicalRecordNumber', '$testNumber')";
        $conn->query($sql_record);

        $time = time();
        $sql_delivery = "INSERT INTO DeviceDelivery(DeviceID, ShipDate) VALUES ('$deviceID','$time')";
        $conn->query($sql_delivery);

        $sql_delete = "DELETE FROM Device WHERE DeviceID = '$deviceID'";
        $conn->query($sql_delete);


}else{
	//test already exists
	}
}

$conn->close();
	?>
<br>
	</div>

		<div ng-include="'footer.html'"></div>

</body>
</html>