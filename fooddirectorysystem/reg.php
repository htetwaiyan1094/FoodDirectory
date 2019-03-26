<?php
include("config/config.php");

if(isset($_POST['submitMain'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $cus_phno = $_POST['phno'];
    $uname = $_POST['uname'];
    $pw = $_POST['pw'];
    $password = hash('sha1', $pw);
    do {
      $id='C';
      for($i=0; $i<4; $i++){
        $id .= rand(0,9);
      }
    } while (mysql_num_rows(@mysql_query("select * from le_customer where cus_id = '$id'")) > 0);

    $sql = "INSERT INTO le_customer
    (cus_id, firstname, lastname, gender, dob, email, cus_phno, username, password, date_joined)
    VALUES('$id', '$fname','$lname','$gender','$dob','$email','$cus_phno','$uname','$password', now())";
}
$get_user = @mysql_query("SELECT * FROM le_customer WHERE username='$uname' ");
$num_rows = @mysql_num_rows($get_user);

if ($num_rows > 0){
    echo "<script>alert('Change your username!')</script>";
    echo "<script>window.location='register.php';</script>";
} else {
    mysql_query($sql) or die(mysql_error());
    echo "<script>alert('You are successfully registered!')</script>";
    echo "<script>window.location='login.php';</script>";
}
?>