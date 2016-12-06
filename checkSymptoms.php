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
// var_dump($MedicalRecordNumber);
$sql = "SELECT t1.Description FROM (Symphtom AS t1 INNER JOIN MedicaRecordHasSymphtoms AS t2 ON t1.SymphtomID=t2.SymphtomID) WHERE MedicalRecordNumber='$MedicalRecordNumber'";
$result = $conn->query($sql);
// var_dump($result);
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
	<h1>Symphtoms</h1><br>
	<ul>
		<?php
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				echo "<li>" . $row['Description'] . "</li>";
			}
		}
		$conn->close();
		?>
	</ul>
</body>
</html>