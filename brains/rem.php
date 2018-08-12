<?php

include 'conn.php';
session_start();
if (isset($_SESSION["login"])) {
  if ($_SESSION["ut"]=="admin") {

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

  $id= $_REQUEST["q"];
$sql="UPDATE books set stock =0 where bookid=$id";
$conn->query($sql);
$_SESSION["suc"]="<div class='alert alert-info'>
BOOK Stock Made zero.. any return or release may increse stock again.
<a href='/#login' class='btn btn-primary'>Go Back</a>
</div>";
header('Location:../resp.php');
?>
