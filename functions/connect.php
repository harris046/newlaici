<?php
$host = "localhost";
$user = "laici";
$password = "laici";
$db = "db_elearning";

$con = mysqli_connect($host,$user,$password) or die("Could not connect to database");
mysqli_select_db($db,$con) or die("No database selected");

?>


