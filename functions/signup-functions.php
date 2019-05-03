<?php
define("headless", true);
include "connect.php";

//get passed data
$fname = isset($_REQUEST["fname"]) ? $_REQUEST["fname"] : NULL;
$mname = isset($_REQUEST["mname"]) ? $_REQUEST["mname"] : NULL;
$lname = isset($_REQUEST["lname"]) ? $_REQUEST["lname"] : NULL;
$dob = isset($_REQUEST["dob"]) ? $_REQUEST["dob"] : NULL;
$gender = isset($_REQUEST["gender"]) ? $_REQUEST["gender"] : NULL;
$course = isset($_REQUEST["course"]) ? $_REQUEST["course"] : NULL;
$yrlvl = isset($_REQUEST["yrlvl"]) ? $_REQUEST["yrlvl"] : NULL;
$username = isset($_REQUEST["email"]) ? $_REQUEST["email"] : NULL;
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : NULL;

//process data
$fname = str_replace("'","`",$fname); 
$fname = mysqli_real_escape_string($conn, $fname);

$lname = str_replace("'","`",$lname); 
$lname = mysqli_real_escape_string($conn, $lname); 
		
$username = str_replace("'","`",$username); 
$username = mysqli_real_escape_string($conn, $username); 

$password = str_replace("'","`",$password); 
$password = mysqli_real_escape_string($conn, $password);
$password = md5($password);

$sql = "INSERT INTO `tbl_user`(`fname`, `mname`, `lname`, `dob`, `gender`, `course`, `yrlvl`, `username`, `password`) VALUES  ('$fname','$mname','$lname','$dob','$gender','$course','$yrlvl','$username','$password')";
$result = mysqli_query($conn, $sql);

 if($result==true)
                            {
								$arr = array (
									"success" => "success",
								  );
						
								  echo json_encode($arr);
                            }



?>