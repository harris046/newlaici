<?php 
    define("headless", true);
    include 'connect.php';

    //get data
    $username = isset($_REQUEST["email"]) ? $_REQUEST["email"] : NULL;

    //hashed password
    $pwd = md5($password);

    session_start();
    
    $username = mysqli_real_escape_string($conn, $username);

    $query = "SELECT * FROM tbl_user WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($conn, $query) or die ("Verification error");
    $array = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if ($array['username'] == $username){
        $_SESSION['username'] = $username;
        $_SESSION['fname'] = $array['fname'];
        $_SESSION['lname'] = $array['lname'];
        $_SESSION['user_Id'] = $array['user_Id'];
        // header("Location: ../student/home.php");

        $arr = array (
            "success" => "success",
        );

        echo json_encode($arr);
    }
    
    else{
        $arr = array (
            "success" => "fail",
        );

        echo json_encode($arr);
    }
   
?>