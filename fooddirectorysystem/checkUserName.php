<?php
include("config/config.php");

$user = $_REQUEST['user'];
$get_user = @mysql_query("SELECT * FROM le_customer WHERE username='$user' ");
$num_rows = @mysql_num_rows($get_user);
?>
<input type="hidden" name="noofrows" id="noofrows" value="<?php echo $num_rows; ?>" />
<?php
if ($num_rows > 0 && $user != "") {
    echo "Username Already Exists";
}
if ($num_rows == 0 && $user != "") {
    ?><font color="#0D9213"> <?php echo "Username Is Available"; ?> </font> <?php
}
?>