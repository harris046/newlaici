<?php
include "../../functions/connect.php";
if($_GET['topic_Id'])
{
$id=$_GET['topic_Id'];
 $sql = "DELETE FROM tbl_topic WHERE topic_Id='$id'";
 mysqli_query( $conn, $sql);
}

?>