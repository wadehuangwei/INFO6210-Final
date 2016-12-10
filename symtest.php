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

$disease0='';
$last_id2 = '';
$last_id ='';

$phptime=time();
$mysqlitime = date ("Y-m-d H:i:s", $phptime);


if(isset($_POST["submit1"]))
{

$sql = "SELECT UserID FROM UserAccount WHERE Username = '$username'";
$result_userId = mysqli_query($db, $sql);

$row_userId = mysqli_fetch_assoc($result_userId);
$patientID = $row_userId['UserID'];

$sql_addPri = "INSERT INTO Prescription(DiseaseID) VALUES ('$disease0') ";       
       // mysqli_query($db, $sql_addAutoPri);
       if(mysqli_query($db, $sql_addPri))      
       {
        $last_id2 = mysqli_insert_id($db);
        echo "lst insert Id PriscriptionID is: " . $last_id2;

       }

$sql_addMedicalRecord = "INSERT INTO MedicalRecord(PatientID,PrescriptionID,DateOfRequest) 
VALUES ('$patientID','$last_id2','$mysqlitime') ";

if(mysqli_query($db, $sql_addMedicalRecord))
{ 

  $last_id = mysqli_insert_id($db);
  echo "last insert Id is: " . $last_id;


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

       $sql_addSymp = "INSERT INTO MedicaRecordHasSymphtoms(MedicalRecordNumber, SymphtomID) VALUES ('$last_id','$symphtomID')";      
       mysqli_query($db, $sql_addSymp);

       echo '<p> Symptom Id :' .$symphtomID. '</p>';
       echo '<p> Drug Id: ' .$drugId. '</p>';
       echo '<p> Drug Name:' .$drugName. '</p>';      

}

       echo '<p> User ID:' .$patientID. '</p>';
       echo '<p> medical ID:' .$last_id. '</p>';
       // $_SESSION['drugName']= $drugName;
       // $_SESSION['symphtomID']= $symphtomID;
       // header("location: symtest.php");       

$sql_allSy = "SELECT MedicaRecordHasSymphtoms.SymphtomID, Symphtom.Description FROM MedicaRecordHasSymphtoms INNER JOIN Symphtom ON MedicaRecordHasSymphtoms.SymphtomID = Symphtom.SymphtomID WHERE MedicaRecordHasSymphtoms.MedicalRecordNumber = '$last_id'";
$result_allSy = mysqli_query($db, $sql_allSy);


while($row = mysqli_fetch_array($result_allSy, MYSQLI_ASSOC))
{        
	// $output .= $row['SymphtomID'] . ' ' .$row['Description'] . '<br>';
	$output .= $row['SymphtomID'] . '<br>';
  $outputSym .= $row['Description'] . '<br>';
    
    // $outputSymId = $row['SymphtomID'];
}


	// echo '<p> ' .$output. '</p>';
if($output==$a1 || $output==$a2 || $output==$a3 || $output==$a4 ||$output==$a5)

{

  if($output==$a1)
  {

       $sql_addAutoPri = "UPDATE Prescription SET  DiseaseID = '$disease1' WHERE PrescriptionID = '$last_id2' " ;       
       mysqli_query($db, $sql_addAutoPri);

       $sql_allDrug = "SELECT Drug.DrugName FROM Drug 
       INNER JOIN Symphtom ON Drug.DrugID = Symphtom.DrugID 
       INNER JOIN DiseaseHasSymphtom ON DiseaseHasSymphtom.SymphtomID = Symphtom.SymphtomID 
       WHERE DiseaseHasSymphtom.DiseaseID = '$disease1'";
       $result_allDrug = mysqli_query($db, $sql_allDrug);

      while($row = mysqli_fetch_array($result_allDrug, MYSQLI_ASSOC))
       {        
          $outputDrug .= $row['DrugName'] . '<br>';
    
       }
         
       header("location: mailAutoReults.php");//redirect to  page

  }

if($output==$a2)
  {

    $sql_addAutoPri = "UPDATE Prescription SET  DiseaseID = '$disease2' WHERE PrescriptionID = '$last_id2' " ;       
       mysqli_query($db, $sql_addAutoPri);


       $sql_allDrug = "SELECT Drug.DrugName FROM Drug 
       INNER JOIN Symphtom ON Drug.DrugID = Symphtom.DrugID 
       INNER JOIN DiseaseHasSymphtom ON DiseaseHasSymphtom.SymphtomID = Symphtom.SymphtomID 
       WHERE DiseaseHasSymphtom.DiseaseID = '$disease2'";
       $result_allDrug = mysqli_query($db, $sql_allDrug);

      while($row = mysqli_fetch_array($result_allDrug, MYSQLI_ASSOC))
       {        
          $outputDrug .= $row['DrugName'] . '<br>';
    
       }

       header("location: mailAutoReults.php");//redirect to  page
}

if($output==$a3)
  {

    $sql_addAutoPri = "UPDATE Prescription SET  DiseaseID = '$disease3' WHERE PrescriptionID = '$last_id2' " ;       
       mysqli_query($db, $sql_addAutoPri);

       $sql_allDrug = "SELECT Drug.DrugName FROM Drug 
       INNER JOIN Symphtom ON Drug.DrugID = Symphtom.DrugID 
       INNER JOIN DiseaseHasSymphtom ON DiseaseHasSymphtom.SymphtomID = Symphtom.SymphtomID 
       WHERE DiseaseHasSymphtom.DiseaseID = '$disease3'";
       $result_allDrug = mysqli_query($db, $sql_allDrug);

      while($row = mysqli_fetch_array($result_allDrug, MYSQLI_ASSOC))
       {        
          $outputDrug .= $row['DrugName'] . '<br>';
    
       }

       header("location: mailAutoReults.php");//redirect to  page

  }

  if($output==$a4)
  {

    $sql_addAutoPri = "UPDATE Prescription SET  DiseaseID = '$disease4' WHERE PrescriptionID = '$last_id2' " ;       
       mysqli_query($db, $sql_addAutoPri);

       $sql_allDrug = "SELECT Drug.DrugName FROM Drug 
       INNER JOIN Symphtom ON Drug.DrugID = Symphtom.DrugID 
       INNER JOIN DiseaseHasSymphtom ON DiseaseHasSymphtom.SymphtomID = Symphtom.SymphtomID 
       WHERE DiseaseHasSymphtom.DiseaseID = '$disease4'";
       $result_allDrug = mysqli_query($db, $sql_allDrug);

      while($row = mysqli_fetch_array($result_allDrug, MYSQLI_ASSOC))
       {        
          $outputDrug .= $row['DrugName'] . '<br>';
    
       }

       header("location: mailAutoReults.php");//redirect to  page

  }

  if($output==$a5)
  {

    $sql_addAutoPri = "UPDATE Prescription SET  DiseaseID = '$disease5' WHERE PrescriptionID = '$last_id2' " ;       
       mysqli_query($db, $sql_addAutoPri);
       $sql_allDrug = "SELECT Drug.DrugName FROM Drug 
       INNER JOIN Symphtom ON Drug.DrugID = Symphtom.DrugID 
       INNER JOIN DiseaseHasSymphtom ON DiseaseHasSymphtom.SymphtomID = Symphtom.SymphtomID 
       WHERE DiseaseHasSymphtom.DiseaseID = '$disease5'";
       $result_allDrug = mysqli_query($db, $sql_allDrug);

      while($row = mysqli_fetch_array($result_allDrug, MYSQLI_ASSOC))
       {        
          $outputDrug .= $row['DrugName'] . '<br>';
    
       }

       header("location: mailAutoReults.php");//redirect to  page

  }

	 echo '<p> output: <br>' .$output. '</p>';

     echo '<p> output: <br>' .$outputSym. '</p>';
          echo '<p> output: <br>' .$outputDrug. '</p>';


   $_SESSION['output'] = $output;
   $_SESSION['description'] = $outputSym;
   $_SESSION['outputDrug'] = $outputDrug;
}

else
{  
   header("location: sendRequest.php");//redirect to  page
}


}

    else
    
    {
        echo 'please select at least one symptoms';
    }

}

}

?>




