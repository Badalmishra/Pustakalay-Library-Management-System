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

$bid=$_POST["bid"];
$ui=$_POST["sid"];
$pass=$_POST["pass"];
if (empty($pass)) {
  die("password was empty");
}
$sql="select * from users where userid=$ui && password='$pass'";
$result=$conn->query($sql);
if ($result->num_rows == 1) {
echo "mar gayi";
}
  else {
    $_SESSION["suc"]="<div class='alert alert-danger'>
    Students Credentials didnt matched
<a href='admin.php' class='btn btn-primary'>Go Back</a>
    </div>
    ";
    header('Location:../resp.php');
die();
  }

$sql="select * from transactions where uid='$ui' and returned=0";
$lol=$conn->query($sql);
while($row = $lol->fetch_assoc()) {
  if($row["bid"]==$bid){
    $_SESSION["herr"]="<div class='alert alert-warning'>
    You already have this book.
<a href='admin.php' class='btn btn-primary'>Go Back</a>
    </div>";
    header('Location:../resp.php');
    die();
  }
}
$sql="select * from books where bookid='$bid'";
$lol=$conn->query($sql);
while($row = $lol->fetch_assoc()) {
  if($row["stock"]<1){
    $_SESSION["herr"]="book out of stock";
    header('Location:../resp.php');
    die();
  }
}
$sql="select * from users where userid='$ui'";
$lol=$conn->query($sql);
while($row = $lol->fetch_assoc()) {
  if($row["credit"]>4){
    $_SESSION["herr"]="credit limit reached, you might like to release some books firsts <br> <a href='profile.php' class='btn btn-primary'>Go Back</a>";
    header('Location:../resp.php');

    die();
  }
}
  $sql1="UPDATE books SET stock = stock - 1 WHERE bookid = $bid";
  $result1=$conn->query($sql1);
  $sql2="INSERT INTO transactions (bid, uid, t_type) VALUES ($bid, '$ui','$type')";
  $result2=$conn->query($sql2);
  $sql3="UPDATE users SET credit = credit + 1 WHERE userid = '$ui'";
  $result3=$conn->query($sql3);
  if(isset($result3) and isset($result2) and isset($result1)){
    $_SESSION["suc"]="<div class='alert alert-info'>
    BOOK ISSUED SUCCESSFULLY.
    <a href='admin.php' class='btn btn-primary'>Go Back</a>
    </div>";
    header('Location:../resp.php');
  }
  else {
    $_SESSION["suc"]="<div class='alert alert-danger'>
    ERROR in connection

    </div>";
    header('Location:../resp.php');
  }


 ?>
