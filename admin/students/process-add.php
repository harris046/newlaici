<?php
include "../../functions/connect.php";

extract($_POST);

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
                                   echo '<script language="javascript">';
                                    echo 'alert("Successfully Registered")';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=index.php" />';
                            }



?>