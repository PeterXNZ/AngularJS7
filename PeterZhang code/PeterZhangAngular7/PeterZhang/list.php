<?php
require 'connect.php';
error_reporting(E_ERROR);
$students = [];
$sql = "SELECT * FROM  students";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $students[$cr]['sId']    = $row['sId'];
    $students[$cr]['fName'] = $row['fName'];
    $students[$cr]['cDate'] = $row['cDate'];
    $students[$cr]['email'] = $row['email'];
    $students[$cr]['DOB'] = $row['DOB'];
    $cr++;
  }
    
    //print_r($students);

  echo json_encode($students);
}
else
{
  http_response_code(404);
}
?>