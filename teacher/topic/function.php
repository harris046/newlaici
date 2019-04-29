<?php


function dbcon(){
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db = "db_elearning";

	$con = mysqli_connect($host,$user,$pwd, $db) or die ("ERROR Connecting to Database");
}

function dbclose(){
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db = "db_elearning";

	$con = mysqli_connect($host,$user,$pwd, $db) or die ("ERROR Connecting to Database");

	mysqli_close($con);
}

function category(){
	$con = dbcon();
	$sel = mysqli_query($con, "SELECT * from tbl_category");

	if($sel==true){
		while($row=mysqli_fetch_assoc($sel)){
			extract($row);
			echo '<option value='.$cat_Id.'>'.$name.'</option>';
		}
	}


	dbclose();
}
function sub(){
	$con = dbcon();
	$sel = mysqli_query($con, "SELECT * from tbl_topic");

	if($sel==true){
		while($row=mysqli_fetch_assoc($sel)){
			extract($row);
			echo '<option value='.$topic_Id.'>'.$title.'</option>';
		}
	}


	dbclose();
}


?>