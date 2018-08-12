<?php
include 'conn.php';
//check done
session_start();

if(isset($_FILES['image'])){
   $errors= array();
   $file_name = $_FILES['image']['name'];
   $file_size =$_FILES['image']['size'];
   $file_tmp =$_FILES['image']['tmp_name'];
   $file_type=$_FILES['image']['type'];
   $file_name=strtolower($file_name);
   $info=explode('.',$file_name);
   $file_ext=strtolower(end($info));

   $expensions= array("jpeg","jpg","png");
   if(in_array($file_ext,$expensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   }



   if(empty($errors)==true){
      move_uploaded_file($file_tmp,"upload/".$file_name);
      echo "Success for ".$file_name;
      $name=$_POST["usern"];
      $p=$_POST["passw"];
      $c=$_POST["cpassw"];
      $em=$_POST["em"];
      $name=mysqli_real_escape_string($conn,$name);
      $p=mysqli_real_escape_string($conn,$p);
      if ($p==$c) {
            // code...
          $id=0;
          $sql="INSERT INTO users (name, password, utype, email, pic) VALUES ('$name','$p','','$em','$file_name')";
          if($conn->query($sql)){
                $ui=$conn->insert_id;
                $_SESSION["suc"]="<div class='alert alert-info'>
                Account created with id <b> $ui </b>
                <a href='index.php#login' class='btn btn-primary'>Go Back</a>
                </div>";
                header('Location:../resp.php');
          }
          else{
            echo "failed".$conn->error;
          }
    }

      else {
        echo "password mismatch";
      }













   }else{
      echo $errors;
   }
}
else {
  echo "garbar";
}
 ?>
