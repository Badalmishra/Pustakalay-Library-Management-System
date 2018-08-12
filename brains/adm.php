<?php
include 'conn.php';
//check done
$user=$_POST['name'];
$pass=$_POST['pass'];
$sql="select * from users where userid='$user' && password='$pass' && utype='admin'";
$result=$conn->query($sql);
if ($result->num_rows == 1) {
session_start();
while($row = $result->fetch_assoc()) {

    // code...
$_SESSION["login"]="true";
$_SESSION["secret"]="pp0299387479797";
$_SESSION["uid"]=$row["userid"];
$_SESSION["un"]=$row["name"];
  $_SESSION["tt"]="issue";
      $_SESSION["ut"]=$row["utype"];

  header('Location:../admin.php');
}
}
else{
  session_start();
$_SESSION["err"]="<div class='alert alert-danger'>
  Your credentials didn't matched. Please Try Again with valid pairs
  </div>";

  header('Location:../#login');
}

 ?>
