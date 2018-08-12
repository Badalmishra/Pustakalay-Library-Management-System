<?php
include 'conn.php';
$sql="DELETE FROM users";
if($conn->query($sql)){
header('Location:../#works-section');
}
else{echo "failed";}
 ?>
