
<?php

//connect to database
$db = mysqli_connect("localhost", "root", "", "healthcare");
$output = '';
$outputID = '';
$a1 = '';
$a2 = '';
$a3 = '';
$a4 = '';
$a5 = '';

$disease1 = '100001';
$disease2 = '100002';
$disease3 = '100003';
$disease4 = '100004';
$disease5 = '100005';

$sql_alldrug = "SELECT * FROM Drug";
$result_allDrug = mysqli_query($db, $sql_alldrug);

while($row = mysqli_fetch_array($result_allDrug, MYSQLI_ASSOC))
{
	$output .= $row['DrugID'] . ' ' .$row['DrugName'] . '<br>';

	$outputID .=$row['DrugID']. '<br>';

}
		     // echo '<p> ' .$outputID. '</p>';

$sql_diseaseSymp1 = "SELECT * FROM DiseaseHasSymphtom WHERE DiseaseID = '$disease1' ";
$result_diseaseSymp1 = mysqli_query($db, $sql_diseaseSymp1);

while($row_diseaseSymp1 = mysqli_fetch_array($result_diseaseSymp1, MYSQLI_ASSOC))
{
	// $output .= $row['DrugID'] . ' ' .$row['DrugName'] . '<br>';

	$a1 .=$row_diseaseSymp1['SymphtomID']. '<br>';
}

$sql_diseaseSymp2 = "SELECT * FROM DiseaseHasSymphtom WHERE DiseaseID = '$disease2' ";
$result_diseaseSymp2 = mysqli_query($db, $sql_diseaseSymp2);

while($row_diseaseSymp2 = mysqli_fetch_array($result_diseaseSymp2, MYSQLI_ASSOC))
{
	// $output .= $row['DrugID'] . ' ' .$row['DrugName'] . '<br>';

	$a2 .=$row_diseaseSymp2['SymphtomID']. '<br>';
}

$sql_diseaseSymp3 = "SELECT * FROM DiseaseHasSymphtom WHERE DiseaseID = '$disease3' ";
$result_diseaseSymp3 = mysqli_query($db, $sql_diseaseSymp3);

while($row_diseaseSymp3 = mysqli_fetch_array($result_diseaseSymp3, MYSQLI_ASSOC))
{
	// $output .= $row['DrugID'] . ' ' .$row['DrugName'] . '<br>';

	$a3 .=$row_diseaseSymp3['SymphtomID']. '<br>';
}

$sql_diseaseSymp4 = "SELECT * FROM DiseaseHasSymphtom WHERE DiseaseID = '$disease4' ";
$result_diseaseSymp4 = mysqli_query($db, $sql_diseaseSymp4);

while($row_diseaseSymp4 = mysqli_fetch_array($result_diseaseSymp4, MYSQLI_ASSOC))
{
	// $output .= $row['DrugID'] . ' ' .$row['DrugName'] . '<br>';

	$a4 .=$row_diseaseSymp4['SymphtomID']. '<br>';
}

$sql_diseaseSymp5 = "SELECT * FROM DiseaseHasSymphtom WHERE DiseaseID = '$disease5' ";
$result_diseaseSymp5 = mysqli_query($db, $sql_diseaseSymp5);

while($row_diseaseSymp5 = mysqli_fetch_array($result_diseaseSymp5, MYSQLI_ASSOC))
{
	// $output .= $row['DrugID'] . ' ' .$row['DrugName'] . '<br>';

	$a5 .=$row_diseaseSymp5['SymphtomID']. '<br>';
}

     echo '<p> A1: <br>' .$a1. '</p>';
     echo '<p> A2: <br>' .$a2. '</p>';
     echo '<p> A3: <br>' .$a3. '</p>';
     echo '<p> A4: <br>' .$a4. '</p>';
     echo '<p> A5: <br>' .$a5. '</p>';

// if($a1==$a3 || $a2==$a3){

//      echo '<p> A2: <br>' .$a2. '</p>';
//      echo '<p> A3: <br>' .$a3. '</p>';
// }
// else{
// 	     echo '<p> A1: <br>' .$a1. '</p>';

// }

?>