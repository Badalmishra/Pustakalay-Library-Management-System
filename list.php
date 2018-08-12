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
    header('Location:index.php#login');
        die();
  }
}
  else {
    $_SESSION["deauth"]="<div class='alert alert-info'> You Need to Login first.</div>";
  header('Location:index.php#login');
      die();
  }
 ?>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pustakalay</title>
<meta name="description" content="The Best Library System Ever">
<meta name="author" content="Badal Mishra">
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
<link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/modernizr.custom.js"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<link rel="stylesheet" type="text/css"  href="css/style.css">
</head>
<body style="background-image:url('css/lololo.png');padding-top:10%;">
<!-- Navigation--->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.html">Pustakalay</a> </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin.php" class="page-scroll"><i class="fas fa-home"></i>Admin</a></li>
        
        <li><a href="pendings" class="page-scroll">pendings</a></li>
        <li><a href="#contact-section" class="page-scroll">Contact</a></li>

        <li><a href="out.php" class="page-scroll">Log Out</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>

<!-- Header -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <?php

  $d=0;
  $sql="select DATEDIFF (now(),time )-30 as delay,uid,bid from transactions where DATEDIFF (now(),time )>30 and returned=0";
  $result=$conn->query($sql);
  while ($row=$result->fetch_assoc()) {
    $d=$d+$row["delay"];
    $u=$row["uid"];
    $b=$row["bid"];
    $sql="select pic from users where userid='$u'";
    $esult=$conn->query($sql);
    while ($low=$esult->fetch_assoc()) {
      $pic="brains/upload/".$low["pic"];

   ?>
  <div class="alert alert-info" style="width:70%;margin:auto;height:30%;">
<div class="container-fluid">

    <div class="col-md-3 col-lg-3" style="height:100%;">
      <img src="<?php echo $pic ?>" class="img-thumbnail" alt="" style="height:100%;">

    </div>
    <div class="col-lg-7 col-md-7" >
      <h1> User ID : <?php echo "".$u; ?>
for
<?php echo "Bookid ".$b; ?>
</h1></div>
<div class="col-lg-2 col-md-2 well" >
<b>Fine of</b>
<h1>
<b><?php echo " Rs. ".$d ?></b></h1>
<b></b>
    </div>

  </div>
  </div>
<?php }} ?>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="js/SmoothScroll.js"></script>
  <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
  <script type="text/javascript" src="js/jquery.isotope.js"></script>
  <script type="text/javascript" src="js/jqBootstrapValidation.js"></script>
  <script type="text/javascript" src="js/contact_me.js"></script>

  <!-- Javascripts
      ================================================== -->
  <script type="text/javascript" src="js/main.js"></script>

</body>
</html>
