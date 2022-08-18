<?php
require 'connect.php';

// Get the posted data.

$postdata = file_get_contents("php://input");

//print_r($postdata);

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
  

  // Sanitize.
  $id = mysqli_real_escape_string($con, (int)$_GET['id']);
  $fName = mysqli_real_escape_string($con, trim($request->fName));
  $cDate = mysqli_real_escape_string($con, trim($request->cDate));
  $email = mysqli_real_escape_string($con, $request->email);
  $DOB = mysqli_real_escape_string($con, $request->DOB);
  // Update.
   $sql = "UPDATE `students` SET `fName`='$fName',`DOB`='$DOB',`cDate`='$cDate',`email`='$email' WHERE `sId` = '{$id}' LIMIT 1";

  if(mysqli_query($con, $sql))
  {
    http_response_code(204);
  }
  else
  {
    return http_response_code(422);
  }  
}
