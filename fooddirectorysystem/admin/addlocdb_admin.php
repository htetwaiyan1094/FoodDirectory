<?php
include("../config/config.php");
include("adminauth.php");

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

mysql_query($query);

echo "<script>alert('Successfully!');</script>";
echo "<script>window.location='storeedit_admin.php';</script>";

?>