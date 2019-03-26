<?php
include("../config/config.php");
session_start();

if (isset($_POST['uname']) && isset($_POST['password'])){
$user = $_POST['uname'];
$password = $_POST['password'];

$query = mysql_query("SELECT * FROM staff WHERE username = '$user' AND password = '$password'")
                    or die(mysql_error());
} else {
		echo "<script>window.location='adminlogin.php';</script>";
}
if (isset($_POST['submitMain'])) {
	if (mysql_num_rows($query) > 0) {
		$userid = mysql_result($query, 0, 'stfid');
		$_SESSION['admin'] = $user;
		$_SESSION['stfid'] = $userid;
		echo "<script> alert('login success!')</script>";
		echo "<script>window.location='adminreport.php';</script>";
	} else {
		echo '<script> alert("Username and password not match !!!")</script>';
		echo "<script>window.location='adminlogin.php';</script>";
	}
}
?> 