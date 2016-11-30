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

$sql = "SELECT MedicalRecordNumber, DateOfDiagnosis, Treatmentresult FROM MedicalRecord";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>
        Request Records
    </title>
</head>
<body>
    <a href='homepage.php'>Home Page</a>
    <h1>My Requests</h1><br>
    <p>Records</p>
    <?php
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " - MedicalRecordNumber: " . $row["MedicalRecordNumber"] . "<br>" . " - DateOfDiagnosis: " . $row["DateOfDiagnosis"] . "<br>" . " - Treatmentresult:" . $row["Treatmentresult"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
    ?>
    <form action="">
    </form>
</body>
</html>