<?php
include("config/config.php");
include("userauth.php");

$fsid = $_POST['fsid'];
$lat = $_POST['lat'];
$lng = $_POST['lng'];

$num = mysql_num_rows(mysql_query("SELECT * FROM store_map where foodstore_id='$fsid' "));

if($num<1){
	$query = "INSERT INTO store_map(foodstore_id, lat, lng)
 	 VALUES( '$fsid', '$lat', '$lng' )";
} else {
	$query = "UPDATE store_map SET 
	 lat='$lat', lng='$lng' WHERE foodstore_id='$fsid' ";
}

mysql_query($query) or die(mysql_error());

echo "<script>alert('Successful!');</script>";
echo "<script>window.location='storeedit.php';</script>";

?>