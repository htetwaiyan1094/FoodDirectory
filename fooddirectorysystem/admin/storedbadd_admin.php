<?php
  include("../config/config.php");
  include("adminauth.php");

  do {
    $fsid='FS';
    for($i=0; $i<5; $i++){
      $fsid .= rand(0,9);
    }
  } while (mysql_num_rows(@mysql_query("select * from food_store where store_id = '$fsid'")) > 0);
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

  if($logo) {
  move_uploaded_file($tmp, "../images/stores/$fsid.jpg");
  $logoname = "images/stores/$fsid.jpg";
    $sql = "INSERT INTO food_store
    (store_id, store_name, logo, typeid, pricerng, phno, address, reg_date, location )
    VALUES('$fsid', '$fsname', '$logoname','$fstype','$prng','$phno','$address', now(),'$l' )";
  } else {
    $sql = "INSERT INTO food_store
    (store_id, store_name, logo, typeid, pricerng, phno, address, reg_date, location )
    VALUES('$fsid', '$fsname', 'nologo','$fstype','$prng','$phno','$address', now(),'$l' )";
  }
  
  mysql_query($sql) or die(mysql_error());
  
  echo "<script>alert('Successfully Added!!');</script>";
  echo "<script>window.location='admin_report.php';</script>";
?>