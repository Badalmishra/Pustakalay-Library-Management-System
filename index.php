<?php
session_start();
if (isset($_SESSION["done"])) {
$msg=$_SESSION["done"];
unset($_SESSION["done"]);
}
else {
  $msg="";
}
if (isset($_SESSION["login"])) {
  if ($_SESSION["ut"]=="admin") {
  header('Location:admin.php');
  die();}
  if ($_SESSION["secret"]=="pp0299387479797") {
    header('Location:profile.php');
  }
  else{
    $onmi="nope";
  }

}

if (isset($_SESSION["err"])) {
$err=$_SESSION["err"];
unset($_SESSION["err"]);
}
else {
  $err="";
}
if (isset($_SESSION["deauth"])) {
$deauth=$_SESSION["deauth"];
unset($_SESSION["deauth"]);
}
else {
  $deauth="";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pustakalay</title>
<meta name="description" content="The Best Library System Ever">
<meta name="author" content="Badal Mishra">
 <meta name="keywords" content="library management System,php, user, best">

<!-- Favicons
    ================================================== -->

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <script src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js">

  </script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="index.html">Pustakalay </a> </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#home" class="page-scroll"><i class="fas fa-home"></i>Home</a></li>
          <li><a href="#about" class="page-scroll"><i class="fas fa-users"></i>About</a></li>
          <li><a href="#trending" class="page-scroll"><i class="fas fa-calendar-alt"></i>Trending</a></li>
          <li><a href="#login" class="page-scroll"><i class="fas fa-users"></i>Login</a></li>
          <li><a href="#contact-section" class="page-scroll"><i class="fas fa-globe"></i>Contact</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>

<!-- Header -->

<header  class="text-center" name="home">

    <div class="intro-text col-sm-12 col-md-6 col-lg-6" style="padding-top:20%;">
      <h1>Welcome to:<span class="color"> Pustakalay</span></h1>

      <p>Reading makes you live on more life</p>

    </div>

  <script type="text/javascript" src="ajax.js">

  </script>
      <div class="but col-sm-12 col-md-6 col-lg-6" style="padding-top:2%;">
        <div class="btn-group se">
          <input class=" btn " id="en" list="browsers" placeholder="search books here ...?" onkeyup="showHint(this.value)"/>
          <datalist id="browsers">

          </datalist>
  <input type="submit" name="" value="Search" class="se btn btn-primary" onclick="k()">
</div>
      <br>
        <a href="#about" class="btn btn-default btn-lg page-scroll">About Us</a>
          <a href="#about-section" class="btn btn-default btn-lg page-scroll">share a Word</a>
      </div>

</header>

<!-- About Section -->
<div id="about" style="padding-top:5%;text-align:center;">
  <br><br>
  <div class="container" >
    <div class="section-title">
      <h2>About Us</h2>

    </div>
    <div  class="space"></div>
    <div class="row texta">
      <div style="text-align:justify;" class="col-md-6">
        <center><h4>Some Words on Us</h4></center>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare diam commodo nibh ante facilisis bibendum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
      </div>
      <div class="col-md-6" style="text-align:justify;">
      <center>  <h4>Why We</h4></center>
        <p>Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare diam commodo nibh ante facilisis bibendum.</p>
      </div>
    </div>
  </div>
</div>
<!-- Services Section -->
<script type="text/javascript" src="mmm.js">

</script>

<!-- Portfolio Section -->
<div class="well container-fluid" id="trending" style="overflow-y:auto;margin-bottom: 0;height:100vh;">
<h1 class="alert alert-success text-center" style="margin-bottom:7%;">Trending Books</h1>
  <?php include 'brains/conn.php';

  $sql="select bid ,count(bid)from transactions group by bid";
  $result=$conn->query($sql);
  while($row=$result->fetch_assoc()){
    $id=$row["bid"];
        $sql1="Select * from books where bookid=$id";
    $result1=$conn->query($sql1);
    while($row1=$result1->fetch_assoc()){
    if ($row1["stock"]>0) {
    $st="avaiable";
    $url="brains/hold.php?q=".$row1["bookid"];
    $t="Hold";
    }
    else {
    $st="Unavaiable";
    $url="#";
    $t="_----_";
    }
    ?>

    <div class="well book" style="width:20%;text-align:center;display:inline-block;">
    <h2 class="well" style="color:green;text-transform:uppercase;font-size:120%;"><b> <?php echo $row1["bname"]; ?> </b></h2>
    <div class="container-fluid well" style="text-align:justify;text-decoration:underline;text-transform:uppercase;">
    <b>Author:: <?php echo $row1["author"]; ?></b><br>
    <b>Edition:: <?php echo $row1["Edition"]; ?></b><br>
    <b>Pub:: <?php echo $row1["publication"]; ?></b><br>
    <b><?php echo $st ;?></b>
    </div>
    <hr style="margin-top:-1%;width:100%; margin-bottom:7%;">
    <a class="btn btn-primary" href="<?php echo $url; ?>"><?php echo $t; ?></a>
    </div>
<?php
}}
 ?>
</div>


<div id="login" >

<form class="well fu fu1" id="fo" action="brains/stu.php" method="post" style="background: black;border:inset 1px solid grey;box-shadow:25px 25px 35px black;">
<center><h1>USER LOGIN</h1></center>
<?php echo $err; ?>
<?php echo $deauth; ?>
<div class="form-group">
<label style="color:white" for="pwd">User:</label>
<input type="text" class="form-control tn-default" placeholder="Enter ID" name="useri">
</div>
<div class="form-group">
<label for="pwd" style="color:white" >Password:</label>

<input type="password" class="form-control tn-default"  placeholder="Enter password" name="passw">

</div>

<input type="submit" class="btn btn-default btn-lg page-scroll" value="Login">
<button type="button"class="btn btn-default btn-lg sw" name="button">Register</button>
</form>


<form class="well fu fu2" style="display:none;background: black;border:inset 1px solid grey;box-shadow:25px 25px 35px black;" id="fo" action="brains/reg.php" enctype="multipart/form-data" method="post" >
<h3>Registration</h3>

<div class="form-group">

<input type="text" class="form-control tn-default" placeholder="Enter name" name="usern">
</div>

<div class="form-group">

<input type="password" class="form-control tn-default"  placeholder="Enter password" name="passw">
</div>
<div class="form-group">

<input type="password" class="form-control tn-default"  placeholder="Confirm password" name="cpassw">
</div>
<div class="form-group">

<input type="file" class="form-control tn-default"  placeholder="Choose a picture" name="image">
</div>

<div class="form-group">

<input type="email" class="form-control tn-default"  placeholder="Enter email id" name="em">
</div>
<input type="submit" class="btn btn-default btn-lg page-scroll" value="Register">
<button type="button" name="button" class="btn btn-default btn-lg sw">Login</button>
</form>


</div>
<script type="text/javascript">
  $('.sw').click(function() {
$('.fu').toggle();
  });
</script>





<!-- Contact Section -->
<div id="contact-section" >
  <div class="container">
    <div class="section-title center" style="text-align:center;">
      <h2 >Contact Us</h2>

    </div>
    <div class=" " style="margin:auto;width:80%;margin-top:5%;">

      <form name="sentMessage" action="connect/save.php" id="contactForm" novalidate>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" id="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" id="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="succes"> <?php echo $msg; ?></div>
        <button type="submit" class="btn btn-default">Send Message</button>
      </form>
    </div>
  </div>
</div>

  <div class="container">
    <p>Copyright &copy; Badal Mishra. Designed by Badal Mishra</p>
  </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Javascripts
    ================================================== -->
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
