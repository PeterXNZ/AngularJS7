<?php
require 'connect.php';

 $postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  $request = json_decode($postdata);
  
  // Sanitize.
  $fName = mysqli_real_escape_string($con, trim($request->full_name));
  $cDate = mysqli_real_escape_string($con, trim($request->created_date));
  $email = mysqli_real_escape_string($con, $request->email);
   $DOB = mysqli_real_escape_string($con, $request->DOB);
  

  // Store.
  $sql = "INSERT INTO `students`(
     `fName`,
     `cDate`,
     `email`,
     `DOB`

 ) VALUES
  ('{$fName}',
  '{$cDate}',
  '{$email}',
  '{$DOB}')
  ";

  if(mysqli_query($con,$sql))
  {
    http_response_code(201);
  }
  else
  {
    http_response_code(422);
  }
}