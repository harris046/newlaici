<?php
    session_start();
	
	include '../functions/connect.php';

	$username = $_POST['uname'];
    $password = $_POST['pwd'];
	$pwd = md5($password);

	$username = mysqli_real_escape_string($conn, $_POST['uname']);
    $password = mysqli_real_escape_string($conn, $_POST['pwd']);

    $query = "SELECT * FROM tbl_teacher WHERE uname = '$username' AND pwd = '$pwd' LIMIT 1";
    $result = mysqli_query($conn, $query) or die ("Verification error");
    $array = mysqli_fetch_array($result, MYSQLI_ASSOC);

    echo "username => " . $username ;
    echo "<br>";
    echo "array => " . $array['uname'];
    
    if ($array['uname'] == $username){
        $_SESSION['uname'] = $username;
        // header("Location:home.php");
    }
    
    else{
    	// echo '<script language="javascript">';
        // echo 'alert("Incorrect username or password")';
        // echo '</script>';
        // echo '<meta http-equiv="refresh" content="0;url=index.php" />';
    }


?>
