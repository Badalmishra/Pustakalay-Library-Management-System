<?php
session_start();
include 'conn.php';
if (isset($_SESSION["login"])) {
  if ($_SESSION["secret"]=="pp0299387479797") {
$ui=$_SESSION["uid"];
if ($_SESSION["ut"]=="student") {
  $type="hold";
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
include 'conn.php';

  $tid=$_REQUEST["q"];
  $u=$_SESSION["uid"];
  $sql="select * from transactions where tid=$tid and returned=0 and t_type='hold'";
  $lol=$conn->query($sql);
  while($row = $lol->fetch_assoc()) {
    $bid=$row["bid"];
    if($row["uid"]==$u){
    echo "things can be done";
    $sql1="UPDATE books SET stock = stock + 1 WHERE bookid = $bid";
    $result1=$conn->query($sql1);
    $sql2="UPDATE transactions SET returned = 1 WHERE tid = '$tid'";
    $result2=$conn->query($sql2);
    $sql3="UPDATE users SET credit = credit - 1 WHERE userid = $u";
    $result3=$conn->query($sql3);
    if(isset($result3) and isset($result2) and isset($result1)){
      $_SESSION["suc"]="<div class='alert alert-info'>
      BOOK released SUCCESSFULLY.

      <a href='profile.php#my' class='btn btn-primary'>Go Back</a>
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
    else {
      echo "bro dont hack";
    }
  }

  ?>
