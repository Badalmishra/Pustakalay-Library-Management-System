<?php
session_start();
include 'conn.php';
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
include 'conn.php';

$name=$_POST["bname"];
$auth=$_POST["auth"];
$stock=$_POST["stock"];
$pub=$_POST["pub"];
$edition=$_POST["edition"];
$price=$_POST["price"];

$sql="INSERT into books (bname ,author,stock,publication,Edition,price) values('$name','$auth',$stock,'$pub','$edition','$price')";
if ($conn->query($sql)) {
  $_SESSION["suc"]="<div class='alert alert-info'>
  BOOK ADDED SUCCESSFULLY.
  <a href='admin.php#my' class='btn btn-primary'>Go Back</a>
  </div>";
  header('Location:../resp.php');// code...
}


?>
