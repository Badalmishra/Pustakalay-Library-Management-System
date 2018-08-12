<?php
$now = new DateTime();
$mins = $now->getOffset() / 60;
$sgn = ($mins < 0 ? -1 : 1);
$mins = abs($mins);
$hrs = floor($mins / 60);
$mins -= $hrs * 60;
$offset = sprintf('%+d:%02d', $hrs*$sgn, $mins);
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
$a=1234556677;
}
$conn->query("SET time_zone='$offset';");
?>
