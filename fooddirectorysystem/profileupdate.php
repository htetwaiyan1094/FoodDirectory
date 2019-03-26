<?php
  include("config/config.php");

  $cusid = $_POST['cusid'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $gen = $_POST['gen'];
  $dob = $_POST['dob'];
  $email = $_POST['email'];
  $phno = $_POST['phno'];
  
  $sql = "UPDATE le_customer 
  SET firstname='$fname', lastname='$lname', gender='$gen', dob='$dob', email='$email', cus_phno='$phno' 
  WHERE cus_id='$cusid' ";
  mysql_query($sql) or die(mysql_error());
  
  echo "<script>alert('Account Details have been Changed sucessfully !!');</script>";
  echo "<script>window.location='profileedit.php';</script>";
?>