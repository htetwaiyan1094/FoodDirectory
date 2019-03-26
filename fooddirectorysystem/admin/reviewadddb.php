<?php
include("../config/config.php");
include("adminauth.php");

$stfid = $_POST['stfid'];
$title = $_POST['title'];
$desc = $_POST['desc'];
    do {
      $revid='rev';
      for($i=0; $i<4; $i++){
        $revid .= rand(0,9);
      }
    } while (mysql_num_rows(@mysql_query("select * from review where revid = '$revid'")) > 0);
$photo = $_FILES['rphoto']['name'];
$tmp = $_FILES['rphoto']['tmp_name'];

$photon = "images/reviews/$revid.jpg";

$query = "INSERT INTO review(revid, t_rev, b_rev, photo, revtime, stfid, views)
 VALUES('$revid', '$title', '$desc', '$photon', now(), '$stfid', 0 ) ";

mysql_query($query) or die(mysql_error());
move_uploaded_file($tmp, "../images/reviews/$revid.jpg");

echo "<script>alert('Successfully Added!');</script>";
echo "<script>window.location='reviewadd.php';</script>";

?>