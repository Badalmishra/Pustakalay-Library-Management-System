<?php
include 'brains/conn.php';
session_start();
if (isset($_SESSION["login"])) {
  if ($_SESSION["ut"]=="admin") {

  }
  else{
    $_SESSION["deauth"]="<div class='alert alert-info'>
    You Need to Login first.
    </div>";
    header('Location:login.php');
        die();
  }
}
  else {
    $_SESSION["deauth"]="<div class='alert alert-info'> You Need to Login first.</div>";
header('Location:login.php');
      die();
  }
 ?>
<!DOCTYPE html>
 <html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pustakalay</title>
<meta name="description" content="Photography Portfolio">
<meta name="author" content="Badal Mishra">
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/modernizr.custom.js"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<link rel="stylesheet" type="text/css"  href="css/style.css">
</head>
<body>
<!-- Navigation--->
<nav id="menu" class="navbar navbar-default navbar-fixed-top on">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.html">Pustakalay</a> </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin.php" class="page-scroll"><i class="fas fa-home"></i>Admin</a></li>
        <li><a href="#my" class="page-scroll"><i class="fas fa-users"></i>Details</a></li>

        <li><a href="out.php" class="page-scroll">Log Out</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>

<!-- Header -->
<?php
$lolo=$_REQUEST["q"];
$d=0;
$sql="select DATEDIFF (now(),time )-30 as delay,uid as man from transactions where DATEDIFF (now(),time )>30 and uid=$lolo and returned=0";
$result=$conn->query($sql);
while ($row=$result->fetch_assoc()) {
  $d=$d+$row["delay"];
}
 ?>


</div>

  <script type="text/javascript" src="mmm.js">

  </script>
  <div id="my" class="" style="height:100vh;padding-top:6%;">
  <div class=" col-md-12 col-lg-12" style="text-align:center;width: 99.8%;height:100%;">
<h2 class="well" style="background: rgba(0,0,0,0.2);font-size:400%;margin-left:auto;"><b><?php echo $_REQUEST["q"]; ?>'s BOOKS</b></h2>
<h2 class="well" style="background: rgba(0,0,0,0.2);font-size:200%;margin-left:auto;width:30%;"> <b>Total fine is rs : <?php echo $d ?> </b></h2>
<hr style="width:100%;margin-bottom:5%;">

        <?php

        $ui=$_REQUEST["q"];
        $sql="select * from transactions where uid=$ui and returned=0";
      if($result=$conn->query($sql)){
        while($row=$result->fetch_assoc()){

          $b=$row["bid"];
          $sql2="select * from books where bookid='$b'";
        if($zesult=$conn->query($sql2)){
          while($low=$zesult->fetch_assoc()){
            if ($row["t_type"]=="hold") {
              $st="holded";
              $url="brains/ack.php?q=".$row["tid"]."&j=".$_REQUEST["q"];
              $an="issue";
              $co="skyblue";
            }
            else{
              $st="Issued";
              $url="brains/rec.php?q=".$row["tid"]."&r=".$row["bid"]."&s=".$row["uid"];
              $an="recieve";
              $co="lightgreen";
            }
?>
<div class="well bd btn btn-primary col-md-2 col-lg-2 " style="margin-left: 2%;text-align:center;display:inline-block;background-color:<?php echo $co ?>;">
  <h2 class="well" style="color:green;text-transform:uppercase;font-size:120%;"><b> <?php echo $low["bname"]; ?> </b></h2>
<div class="container-fluid well" style="text-align:justify;text-decoration:underline;text-transform:uppercase;color:black;">
  <b><?php echo $low["author"]; ?></b><br>
  <b><?php echo $low["Edition"]; ?></b><br>
  <b><?php echo $low["publication"]; ?></b><br>
  <b><?php echo $st; ?></b>
</div>
<hr style="margin-top:-1%;width:100%; margin-bottom:7%;">
<a class="btn btn-primary" href="<?php echo $url; ?>"><?php echo $an ?></a>
</div>

<?php }}}}else {
  echo "lol";
} ?>
       </div>
  <div class="well col-md-6 col-lg-6" style="text-align:center;margin-top:10%;">
  </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/SmoothScroll.js"></script>
  <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
  <script type="text/javascript" src="js/jquery.isotope.js"></script>
  <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
  <script type="text/javascript" src="js/contact_me.js"></script>

  <!-- Javascripts
      ================================================== -->]

</body>
</html>
