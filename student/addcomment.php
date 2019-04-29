<?php
		include "../functions/connect.php";
        $comment = mysqli_real_escape_string($conn, $_POST['comment']);
        $userid = $_POST['userid'];
        $postid = $_POST['postid'];
        date_default_timezone_set("Asia/Taipei");
        $datetime=date("Y-m-d h:i:sa");
        $comment = mysqli_query($conn, "Insert into tbl_comment (comment,sub_Id,user_Id,datetime) values ('$comment','$postid','$userid','$datetime') ");
        $sql = mysqli_query($conn, "SELECT * from tbl_comment as c join tbl_user as u on c.user_Id=u.user_Id where sub_Id='$postid' and c.user_Id='$userid' 
        					and c.datetime='$datetime'");

	 while($row=mysqli_fetch_assoc($sql)){
                    echo "<label>Comment by: </label> ".$row['fname']." ".$row['lname']."<br>";
                     echo '<label class="pull-right">'.$row['datetime'].'</label>';
                     echo "<p class='well'>".$row['comment']."</p>";
              }



              ?>