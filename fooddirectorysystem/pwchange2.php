<?php
include("config/config.php");
include("userauth.php");

$username = $_POST['username'];
$cusid = $_POST['cusid'];

$get = @mysql_query("SELECT * FROM le_customer WHERE cus_id= '$cusid' ")or die(mysql_error());
$num = @mysql_num_rows($get);
for ($i = 0; $i < $num; $i++) {
    $old_password = @mysql_result($get, $i, 'password');
}
if (isset($_POST['submit'])) {
    $old = hash('sha1', $_POST['oldpw']);
    $password = hash('sha1', $_POST['newpw']);
    if ($old_password == $old) {
        if ($old == $password) {
            echo "<script> alert('Old password and New Password same ,Try Another !!');</script>";
        } else {
            $query = mysql_query("UPDATE le_customer SET password='$password' WHERE cus_id='$cusid' ")
                    or die(mysql_error());
            echo "<script>alert('Password Changed sucessfully !!');</script>";
            echo "<script>  window.location='index_cus.php';</script>";
        }
    } else {
        echo "<script>alert('Old Password is Wrong !!');</script>";
        echo "<script>  window.location='pwchange.php';</script>";
    }
}
?>