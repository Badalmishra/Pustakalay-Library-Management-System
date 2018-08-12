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

  $tid=$_REQUEST["q"];
  $u=$_SESSION["uid"];
  $sql="select * from transactions where tid=$tid and returned=0 and t_type='hold'";
  $lol=$conn->query($sql);
  while($row = $lol->fetch_assoc()) {
$j=$_REQUEST["j"];

    $sql2="UPDATE transactions SET t_type = 'issue' WHERE tid = '$tid'";
    $result2=$conn->query($sql2);

    if(isset($result2)){
      $_SESSION["suc"]="<div class='alert alert-info'>
      BOOK ISSUED SUCCESSFULLY.

      <a href='showstudent.php?q=$j' class='btn btn-primary'>Go Back</a>
      </div>";
      header('Location:../resp.php');
    }
    else {
      $_SESSION["suc"]="<div class='alert alert-danger'>
      ERROR in connection

      </div>";
      header('Location:../resp.php');
    }






  }

  ?>
