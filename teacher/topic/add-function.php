<?php
 include "../../functions/connect.php";
//  date_default_timezone_set("Asia/Taipei");
//                         $datetime=date("Y-m-d h:i:sa");
//    extract($_POST);
//   $sql = mysqli_query($conn, "INSERT INTO `tbl_topic`(`title`, `content`, `datetime_posted`, `cat_Id`) VALUES ('$title','$content','$datetime','$category')");

//   if($sql==true)
//       {
//             echo '<script language="javascript">';
//             echo 'alert("Successfully Added")';
//             echo '</script>';
//             echo '<meta http-equiv="refresh" content="0;url=add.php" />';
//       }

// $upd = isset($_POST['upd']) ? $_POST['upd'] : NULL;
// echo var_dump($upd);

if(isset($_POST['upd'])){
      $maxsize = 500000242880; // 5MB

      $name = $_FILES['content']['name'];
      $target_dir = "../video/";
      $target_file = $target_dir . $_FILES["content"]["name"];

      // Select file type
      $videoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      // Valid file extensions
      $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

      // Check extension
      if( in_array($videoFileType,$extensions_arr) ){

         // Check file size
        //  if(($_FILES['content']['size'] >= $maxsize) ){
        //   echo "File too large. File must be less than 5MB.";
        //  } 
        //  else if(($_FILES["content"]["size"] == 0)) {
        //    echo "No file attached.";
        //  }else{
           // Upload
           if(move_uploaded_file($_FILES['content']['tmp_name'],$target_file)){
                  // Insert record
                  //  $query = "INSERT INTO `tbl_topic`( `content`) VALUES ('$target_file')";

                  //  mysqli_query($conn,$query);
                    date_default_timezone_set("Asia/Taipei");
                              $datetime=date("Y-m-d h:i:sa");
                  extract($_POST);
                  $sql = mysqli_query($conn, "INSERT INTO `tbl_topic`(`title`, `content`, `datetime_posted`, `cat_Id`) VALUES ('$title','$target_file','$datetime','$category')");

                  if($sql==true)
                  {
                        echo '<script language="javascript">';
                        echo 'alert("Successfully Added")';
                        echo '</script>';
                        echo '<meta http-equiv="refresh" content="0;url=add.php" />';
                  }
           }

        //  }

      }else{
         echo "Invalid file extension.";
      }

    }               
                        


?>