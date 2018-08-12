<?php
session_start();
if (isset($_SESSION["login"])) {
  if ($_SESSION["secret"]=="pp0299387479797") {


  }
  else{
    $_SESSION["deauth"]="<div class='alert alert-info'>
    You Need to Login first.
    </div>";
    header('Location:#login');
    die();
  }
}
  else {
    $_SESSION["deauth"]="<div class='alert alert-info'> You Need to Login first.</div>";
  header('Location:index.php#login');
  die();}
$q=$_REQUEST["q"];
include 'brains/conn.php';
$sql="select * from books where bname LIKE '$q%'";
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Pustakalay</title>
 <meta name="description" content="The Best Library System Ever">
 <meta name="author" content="Badal Mishra">
 <meta name="keywords" content="library management System,php, user">

 <!-- Favicons
     ================================================== -->

 <!-- Bootstrap -->
 <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
 <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">


 <link rel="stylesheet" type="text/css"  href="css/style.css">
 <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
 <link href='http://fonts.googleapis.com/css?family=Lato:400,700,900,300' rel='stylesheet' type='text/css'>
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
 <script type="text/javascript" src="js/modernizr.custom.js"></script>


 </head>
 <body>
       <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>


 <!-- Header -->
<style media="screen">
  #about{
    text-align: center;


  }
  .book{
    transition: background 400ms,margin 400ms;
    background: black;
  }
  .book:hover{
    background: darkgrey;
  }
</style>

 <!-- About Section -->
 <div id="about" style="padding-top:5%;background:url('css/lololo.png')">
   <br><br>
   <div class="container-fluid">
     <div class="section-title">
       <h2 style="color:white">Your Search Result</h2>
     </div><br>
<?php
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){

if ($row["stock"]>0) {
  $st="avaiable";
  $url="brains/hold.php?q=".$row["bookid"];
  $t="Hold";
}
else {
  $st="Unavaiable";
  $url="#";
  $t="_----_";
}
 ?>

<div class="well book" style="width:20%;text-align:center;display:inline-block;">
  <h2 class="well" style="color:green;text-transform:uppercase;font-size:120%;"><b> <?php echo $row["bname"]; ?> </b></h2>
<div class="container-fluid well" style="text-align:justify;text-decoration:underline;text-transform:uppercase;">
  <b><small>Author : </small><?php echo $row["author"]; ?></b><br>
  <b><small>Edition : </small><?php echo $row["Edition"]; ?></b><br>
  <b><small>Pub:  </small><?php echo $row["publication"]; ?></b><br>
  <b><?php echo $st ;?></b>
</div>
<hr style="margin-top:-1%;width:100%; margin-bottom:7%;">
<a class="btn btn-primary" href="<?php echo $url; ?>"><?php echo $t; ?></a>
</div>
<?php } ?>

     </div>
   </div>


 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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
     ================================================== -->
 <script type="text/javascript" src="js/main.js"></script>
 </body>
 </html>
