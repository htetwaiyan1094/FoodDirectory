<?php
include("../config/config.php");
include("adminauth.php");

$fsid = $_GET['fsid'];

$query = "DELETE FROM food_store WHERE store_id='$fsid' ";

mysql_query($query) or die(mysql_error());

echo "<script>alert('Deleted!');</script>";
echo "<script>window.location='storemanage.php';</script>";

?>