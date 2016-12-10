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
                <h3 class="page-header">Edit Prescription
                    <small> / Details</small>
                </h3>

                <ol class="breadcrumb">
                    <li><a href="processRecords.php">Home</a>
                    </li>
                    <li class="active">Edit Prescription</li>

                </ol>

    <br>
</div>


<div class="col-lg-2 text-left">
</div>

<div class="col-lg-8 text-left">
   <div class="panel-group">  
    <div class="panel panel-info">
      <div class="panel-heading">Please input your feedback</div>
      <div class="panel-body">


<div class="control-group form-group">
      <div class="controls">

      	<textarea class="form-control" rows="5" cols="80" name="description" form="inputform"><?php
			if (!empty($description)) {
				echo $description;
			}
		?></textarea>
		<br>
	<form action="updatePrescription.php" id="inputform">
		<input type="hidden" name="prescriptionID" value="<?php echo $prescriptionID ?>" />
		<input class="btn btn-primary" type="submit">
	</form>
	
</div>
   </div>
</div>
	      </div>
    </div>

  </div>

	</div>
	<div ng-include="'footer.html'"></div>

	</body>
	</html>