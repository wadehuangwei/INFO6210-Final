<?php 
// echo  "<br>" . $_SESSION['drugName'] ." ";
// echo  "<br>" . $_SESSION['symphtomID'] ." ";
?> 

<?php require 'diseaseArray.php';?>

<?php
session_start();
//connect to database
$db = mysqli_connect("localhost", "root", "", "healthcare");

$username= $_SESSION['username']; 
$symptoms="";
$output = '';

if(isset($_POST["submit"]))
{

$sql = "SELECT UserID FROM UserAccount WHERE Username = '$username'";
$result_userId = mysqli_query($db, $sql);

$row_userId = mysqli_fetch_assoc($result_userId);
$patientID = $row_userId['UserID'];

$sql_addMedicalRecord = "INSERT INTO MedicalRecord(PatientID) VALUES ('$patientID')";
mysqli_query($db, $sql_addMedicalRecord);

$sql_MedicalID = "SELECT MedicalRecordNumber FROM MedicalRecord WHERE PatientID = '$patientID' ";

$result_MedicalID = mysqli_query($db, $sql_MedicalID);
$row_MedicalID = mysqli_fetch_assoc($result_MedicalID); 
$medicalID = $row_MedicalID['MedicalRecordNumber'];  

    if(!empty($_POST["symptoms"]))
   {

    echo '<h3>You have select following symptoms</h3>';        

    foreach($_POST["symptoms"] as $symptoms)                              
    
    {
       // session_start();

       $sql_drugId = "SELECT DrugId FROM Symphtom WHERE Description = '$symptoms' ";     
       $result_drugId = mysqli_query($db, $sql_drugId);
       $row_drugId = mysqli_fetch_assoc($result_drugId); 
       $drugId = $row_drugId['DrugId'];  

       $sql_symphtomID= "SELECT SymphtomID FROM Symphtom WHERE Description = '$symptoms' ";     
       $result_symphtomID = mysqli_query($db, $sql_symphtomID);
       $row_symphtomID = mysqli_fetch_assoc($result_symphtomID); 
       $symphtomID = $row_symphtomID['SymphtomID'];

       $sql_DrugName = "SELECT DrugName FROM Drug WHERE DrugId = '$drugId' ";
       $result_DrugName = mysqli_query($db, $sql_DrugName);
       $row_DrugName = mysqli_fetch_assoc($result_DrugName);
       $drugName = $row_DrugName['DrugName'];    

       $sql_addSymp = "INSERT INTO MedicaRecordHasSymphtoms(MedicalRecordNumber, SymphtomID) VALUES ('$medicalID','$symphtomID')";       
       mysqli_query($db, $sql_addSymp);

       echo '<p> Symptom Id :' .$symphtomID. '</p>';
       echo '<p> Drug Id: ' .$drugId. '</p>';
       echo '<p> Drug Name:' .$drugName. '</p>';

}

       echo '<p> User ID:' .$patientID. '</p>';
       echo '<p> medical ID:' .$medicalID. '</p>';
       // $_SESSION['drugName']= $drugName;
       // $_SESSION['symphtomID']= $symphtomID;
       // header("location: symtest.php");       

$sql_allSy = "SELECT MedicaRecordHasSymphtoms.SymphtomID, Symphtom.Description FROM MedicaRecordHasSymphtoms INNER JOIN Symphtom ON MedicaRecordHasSymphtoms.SymphtomID = Symphtom.SymphtomID WHERE MedicaRecordHasSymphtoms.MedicalRecordNumber = '$medicalID'";
$result_allSy = mysqli_query($db, $sql_allSy);


while($row = mysqli_fetch_array($result_allSy, MYSQLI_ASSOC))
{        
	// $output .= $row['SymphtomID'] . ' ' .$row['Description'] . '<br>';
	$output .= $row['SymphtomID'] . '<br>';
    
    // $outputSymId = $row['SymphtomID'];
}

	// echo '<p> ' .$output. '</p>';

if($output==$a1 || $output==$a2 || $output==$a3 || $output==$a4 ||$output==$a5){

     // echo '<p> A2: <br>' .$a2. '</p>';
     // echo '<p> A3: <br>' .$a3. '</p>';
	 echo '<p> output: <br>' .$output. '</p>';


}

else{
   header("location: sendRequest.php");//redirect to home page
}


}

    else
    
    {
        echo 'please select at least one symptoms';
    }

}


?>

