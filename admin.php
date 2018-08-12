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
  if (isset($_SESSION["clr"])) {
    $clr=$_SESSION["clr"];
    unset($_SESSION["clr"]);
  }
  else {
    $clr="";
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



<link rel="stylesheet" type="text/css"  href="css/style.css">
</head>
<style media="screen">
  header{overflow: hidden;}
</style>
<body>
  <script type="text/javascript" src="aaa.js">

  </script>
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
        <li><a href="#home" class="page-scroll"><i class="fas fa-home"></i>Admin</a></li>
        <li><a href="#my" class="page-scroll"><i class="fas fa-users"></i>Add Books</a></li>
        <li><a href="list.php" class="page-scroll">Pendings</a></li>
        <li><a href="#contact-section" class="page-scroll">Contact</a></li>
        <li><a href="out.php" class="page-scroll">Log Out</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>

<!-- Header -->

<header class="text-center rows-12" name="home" style="">

<style media="screen">
@keyframes mymove {
    from {left:500px;}
    to {left: 0;}
}
  .adbt{
    font-size: 400%;
  }
  .intro-text{
    padding-left: 2%;
    margin-top: 1%;
  }
  .box{
    animation: mymove 1s ;
    box-shadow:15px 15px 35px black;
  }
</style>
      <div class="text-center intro-text col-sm-12 col-md-6 col-lg-6 ">
<?php echo $clr; ?>
        <div class="btn-group-vertical box">
          <a href="brains/clearholds.php" title="Clear All holds made today." class="adbt btn btn-danger">Clear Holds</a>
          <button class="adbt btn btn-primary" title="Recover accounts which holded books with recieving them." onclick="bb()">Recover</button>
          <a href="clearholds.php" class="adbt btn btn-info">Reset</a>
          <a href="clearholds.php" class="adbt btn btn-success">Support</a>
        </div>
      </div>
      <script type="text/javascript">
        function bb() {
          var x=prompt("Enter User Id");
          var url="brains/recover.php?q="+x;
          location.href=url;
        }
      </script>
      <script type="text/javascript" src="ajax.js"></script>
        <div class="but col-sm-12 col-md-6 col-lg-6">
          <div class="btn-group se">
            <input class=" btn " id="stt" list="browsers" placeholder="search students here ...?" />
            <datalist id="browsers">

            </datalist>
      <input type="button" name="" value="Search" class="se btn btn-primary" onclick="k()">
      </div>
          <br>
          <div class="btn-group se">
            <input class=" btn " id="en" list="browsers" placeholder="search books here ...?" onkeyup="showHint(this.value)"/>
            <datalist id="browsers">

            </datalist>
      <input type="button" name="" value="Search" class="se btn btn-primary" onclick="l()">
      </div>
            <br>
          <a href="#about-section" class="btn btn-default btn-lg page-scroll">About Us</a>
            <a href="#about-section" class="btn btn-default btn-lg page-scroll">share a Word</a>
        </div>

</header>

</div>
<script type="text/javascript" src="js/jquery.js">

</script>

  <div id="my" class="" style="height:100vh;padding-top:3%;">
<h3 class="well" style="margin-top: 0;background:rgba(0,0,0,0.2);font-size:400%;text-align:center;position:relative;"><b>ADD BOOKS</b></h3>
<form class="well" style="position:relative!important; margin-top:3%;text-align:center;" id="fo" action="brains/add.php" enctype="multipart/form-data" method="post" >
<h2 style="color:black;"><b> Add Books </b></h2>
<div class="form-group">
<input type="text" class="form-control" placeholder="Enter name" name="bname">
</div>
<div class="form-group">
<input type="text" class="form-control" placeholder="Enter Author" name="auth">
</div>
<div class="form-group">
<input type="text" class="form-control"  placeholder="Enter stock" name="stock">
</div>
<div class="form-group">
<input type="text" class="form-control"  placeholder="publication" name="pub">
</div>
<div class="form-group">
<input type="text" class="form-control"  placeholder="Enter Edition" name="edition">
</div>
<div class="form-group">
<input type="text" class="form-control"  placeholder="Enter price" name="price">
</div>
<input type="submit" class="btn btn-default btn-lg page-scroll" value="ADD BOOK">
</form>

       </div>


  <!-- Javascripts
      ================================================== -->
  <script type="text/javascript" src="js/main.js"></script>

</body>
</html>
