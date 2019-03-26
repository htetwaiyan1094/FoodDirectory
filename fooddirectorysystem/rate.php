<?php
include("config/config.php");
include("userauth.php");

$r1 = $_POST['value1'];
$r2 = $_POST['value2'];
$r3 = $_POST['value3'];
$fsid = $_POST['fsid'];

$query="INSERT INTO store_rating(store_id, rate1, rate2, rate3, cusid)
 VALUES('$fsid', '$r1', '$r2', '$r3', '$cusid' ) ";

 mysql_query($query) or die(mysql_error());

echo "<script>alert('Rating Complete!');</script>";
echo "<script>window.location='storedetail.php?fsid=$fsid';</script>";

?>