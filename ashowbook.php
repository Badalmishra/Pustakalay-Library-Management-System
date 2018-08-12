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
 <meta name="description" content="">
 <meta name="author" content="">

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
     background: steelblue;
   }
   .book:hover{
     cursor: pointer;
     background: skyblue;
   }
 </style>

 <!-- About Section -->
 <div id="about" style="padding-top:5%;">
   <br><br>
   <div class="container-fluid">
     <div class="section-title">
       <h2>Your Search Result</h2>
     </div><br>
<?php
$result=$conn->query($sql);
while($row=$result->fetch_assoc()){

if ($row["stock"]>0) {
  $st="avaiable";
  $bid=$row["bookid"];
  $t="Issue";
}
else {
  $st="Unavaiable";
  $bid="#";
  $t="_----_";
}
 ?>

<div class="well book" style="width:20%;text-align:center;display:inline-block;">
  <h2 class="well" style="color:green;text-transform:uppercase;font-size:120%;margin-top:1%;"><b> <?php echo $row["bname"]; ?> </b></h2>
<div class="container-fluid well" style="text-align:justify;text-decoration:underline;text-transform:uppercase;margin-top:1%;">
  <b>Author: <?php echo $row["author"]; ?></b><br>
  <b>Edition: <?php echo $row["Edition"]; ?></b><br>
  <b>Publication <?php echo $row["publication"]; ?></b><br>
  <b><?php echo $st ;?></b>
</div>
<form class="" action="brains/issuedirect.php" method="post">
  <div class="form-group" style="display:none;">
    <label for="bid">book id:</label>
    <input type="text" class="form-control" id="bid" name="bid" value="<?php echo $bid; ?>">
  </div>
    <input type="text" class="form-control" id="sid" name="sid" placeholder="Student ID">

    <input type="password" class="form-control" id="pass" name="pass" placeholder="password">


    <input type="submit" class="btn btn-primary" style="width:100%;" value="<?php echo $t; ?>">

</form>
<a href="brains/rem.php?q=<?php echo $bid; ?>" class="btn btn-danger" style="width:100%;"> REMOVE</a>
<form action="brains/addstk.php" class="">
  <div class="btn-group">

<input type="text" name="num"class="btn" value="" style="width:70%;" placeholder="Number to stock">
<input type="submit" name="" class="btn btn-success" style="width:30%;" value="ADD ">
</div>
<input type="text" name="bid" value="<?php echo $bid ?>" hidden>
</form>
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
