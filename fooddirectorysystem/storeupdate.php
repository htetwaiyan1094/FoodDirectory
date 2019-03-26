<?php
  include("config/config.php");
  include("userauth.php");

  $fsid = $_POST['fsid'];
  $fsname = $_POST['fsname'];
  $fstype = $_POST['fstype'];
  $prng = $_POST['prng'];
  $phno = $_POST['phno'];
  $address = $_POST['address'];
  $loc = $_POST['loc'];
  if($loc=="mdy"){ $l="Mandalay";}
  else if($loc=="ygn"){ $l="Yangon";}
  else if($loc=="npt"){ $l="Nay Pyi Taw";}
  $logo = $_FILES['logo']['name'];
  $tmp = $_FILES['logo']['tmp_name'];
  $logoname = "images/stores/$fsid.jpg";

  if($logo) {
    if(file_exists("images/stores/$fsid.jpg")){
      unlink("images/stores/$fsid.jpg");
    }
    move_uploaded_file($tmp, "images/stores/$fsid.jpg");
  }
  $sql = "UPDATE food_store SET
   store_name='$fsname', typeid='$fstype', pricerng='$prng', logo='$logoname', 
   phno='$phno', address='$address', up_date=now(), location='$l' WHERE store_id='$fsid' ";
  
  mysql_query($sql) or die(mysql_error());
  
  echo "<script>alert('Updated!!');</script>";
  echo "<script>window.location='storeedit.php';</script>";
?>