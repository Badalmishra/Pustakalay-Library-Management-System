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
  $bid=$_REQUEST["r"];
  $uid=$_REQUEST["s"];
  echo $tid." ".$bid." ".$uid;
  $sql="select * from transactions where tid=$tid and bid=$bid and uid=$uid";
  $result=$conn->query($sql);
while ($row=$result->fetch_assoc()) {
  if ($row["t_type"]=="issue") {
    // code...
    $sql1="UPDATE books SET stock = stock + 1 WHERE bookid = $bid";
    $result1=$conn->query($sql);
    $sql2="update transactions set returned = 1 where tid=$tid";
    $result2=$conn->query($sql2);
    $sql3="UPDATE users SET credit = credit - 1 WHERE userid = $uid";
    $result3=$conn->query($sql3);
    if(isset($result3) and isset($result2) and isset($result1)){
      $_SESSION["suc"]="<div class='alert alert-info'>
      BOOK Recieved SUCCESSFULLY.
      <a href='showstudent.php?q=$uid' class='btn btn-primary'>Go Back</a>
      </div>";
      header('Location:../resp.php');
    }
    else {
      $_SESSION["suc"]="<div class='alert alert-danger'>
      ERROR in connection

      </div>";
      header('Location:../resp.php');
    }
  }else {
    $_SESSION["suc"]="<div class='alert alert-danger'>
    ERROR in parameters, dont attemp this.

    </div>";
    header('Location:../resp.php');
  }
}
 ?>
