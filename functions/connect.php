<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "db_elearning";

// $con = mysqli_connect($host,$user,$password) or die("Could not connect to database");
// mysqli_select_db($db,$con) or die("No database selected");

// Create connection
$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";

?>


