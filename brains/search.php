<?php
include 'conn.php';
$sql="select * from books group by bname";
$result=$conn->query($sql);
$i=-1;
while ($row = mysqli_fetch_assoc($result)) {

  $i++;
  $data[$i]=$row;
}
$q = $_REQUEST["q"];
$j=0;
$k[]="";
$hint[]="";
// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  for($i=0;$i<sizeof($data);$i++){

    $name=$data[$i]["bname"];
    $nlen=strlen($name);
    if (stristr($q, substr($name, 0, $len))) {
      if ($len<=$nlen) {
        $hint[$j]=$name;
        $move[]=$data[$i];
        $j++;  # code...
      }
      else{$lp=0; }
    }
  }
  echo $j==0? "none" :json_encode($move);
}

// Output "no suggestion" if no hint was found or output correct values
?>
