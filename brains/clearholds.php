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

$sql="select * from transactions where t_type='hold'";
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){
   $bid=$row["bid"];
   $sql1="update books set stock = stock +1 where bookid= $bid";
   $conn->query($sql1);
   $sql2="update transactions set returned = 1 where bid= $bid";
   $conn->query($sql2);
   echo "haha";
   $_SESSION["clr"]="<div class='alert alert-warning text-center' style='width:50%!important;font-size:150%;text-decoration:underline;'> All Holds Released.</div>";
   header('Location:../admin.php');
}
 ?>
