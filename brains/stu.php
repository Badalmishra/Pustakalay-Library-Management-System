<?php
include 'conn.php';
//check done
$user=$_POST['useri'];
$pass=$_POST['passw'];
$sql="select * from users where userid=$user && password='$pass'";
$result=$conn->query($sql);
if ($result->num_rows == 1) {
session_start();
while($row = $result->fetch_assoc()) {
$_SESSION["login"]="true";
$_SESSION["secret"]="pp0299387479797";
$_SESSION["uid"]=$row["userid"];
$_SESSION["un"]=$row["name"];
$_SESSION["pic"]=$row["pic"];
  $_SESSION["tt"]="hold";
  $_SESSION["ut"]="student";
  if ($row["utype"]=="admin") {
      $_SESSION["ut"]="admin";
  }
  header('Location:../profile.php');
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
