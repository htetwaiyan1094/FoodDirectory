<?php
include("config/config.php");
session_start();

if (isset($_POST['uname']) && isset($_POST['password'])){
$user = $_POST['uname'];
$password = $_POST['password'];
$pw = hash('sha1', $password);

$query = mysql_query("SELECT * FROM le_customer WHERE username = '$user' AND password = '$pw'")
                    or die(mysql_error());
} else {
		echo "<script>window.location='login.php';</script>";
}
if (isset($_POST['submitMain'])) {
	if (mysql_num_rows($query) > 0) {
		$userid = mysql_result($query, 0, 'cus_id');
		$_SESSION['user'] = $user;
		$_SESSION['userid'] = $userid;
		echo "<script> alert('login success!')</script>";
		echo "<script>window.location='index_cus.php';</script>";
	} else {
		echo '<script> alert("Username and password not match !!!")</script>';
		echo "<script>window.location='login.php';</script>";
	}
}
?> 