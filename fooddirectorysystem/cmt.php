<?php
include("config/config.php");
$fsid = $_POST['fsid'];
$cusid = $_POST['cusid'];
$com = $_POST['comment'];
$date = date('Y/m/d H:i:s', time());
$addquery= "insert into commenting (cus_id, foodstore_id, comment, cmttime) values ('$cusid', '$fsid', '$com', '$date') ";
mysql_query($addquery) or die(mysql_error());

echo "<script>window.location='storedetail.php?fsid=$fsid';</script>";
?>