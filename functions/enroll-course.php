<?php
    define("headless", true);
    include "connect.php";

    //get passed data
    $user_Id = isset($_REQUEST["user_Id"]) ? $_REQUEST["user_Id"] : NULL;
    $cat_Id = isset($_REQUEST["cat_Id"]) ? $_REQUEST["cat_Id"] : NULL;

    //process data
    $sql = "INSERT INTO user_category (user_Id, cat_Id) VALUES ($user_Id, $cat_Id)";
    $result = mysqli_query($conn, $sql);

    if($result==true){
        $arr = array (
            "success" => "success",
        );
        echo json_encode($arr);
    }
?>