<?php
session_start();
if (isset($_SESSION["herr"])) {
  $a= $_SESSION["herr"];
  unset($_SESSION["herr"]);
}else {
  $a="";
}
if (isset($_SESSION["suc"])) {
  $b=$_SESSION["suc"];
  unset($_SESSION["suc"]);
}else{
  $b="";
}
 ?>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
 <!-- Include all compiled plugins (below), or include individual files as needed -->
 <script type="text/javascript" src="js/bootstrap.js"></script>
 <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<?php echo $a." ".$b; ?>
