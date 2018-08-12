<?php
session_start();
include 'conn.php';
if (isset($_SESSION["login"])) {
  if ($_SESSION["secret"]=="pp0299387479797") {

if ($_SESSION["ut"]=="admin") {
  $type="issue";
}
else {
  $_SESSION["deauth"]="<div class='alert alert-info'>
  You Need to Login first.
  </div>";
  header('Location:../index.php#login');
      die();

}

  }
  else{
    $_SESSION["deauth"]="<div class='alert alert-info'>
    You Need to Login first.
    </div>";
    header('Location:../index.php#login');
        die();
  }
}
  else {
    $_SESSION["deauth"]="<div class='alert alert-info'> You Need to Login first.</div>";
  header('Location:../index.php#login');
      die();
  }
$id=$_REQUEST["q"];
$sql="select * from transactions where uid =$id and returned=0";
$result=$conn->query($sql);
$ac=$result->num_rows;
$nc=0+$ac;
$sql="update users set credit=$nc where userid=$id";
$conn->query($sql);
$_SESSION["clr"]="<div class='alert alert-warning text-center' style='width:50%!important;font-size:150%;text-decoration:underline;'>ACCOUNT REVISED AND RECOVERED</div>";
header('Location:../admin.php');
?>
