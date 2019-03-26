<?php
session_start();

if (isset($_SESSION['admin']) && isset($_SESSION['stfid'])) {
    $admin = $_SESSION['admin'];
    $stfid = $_SESSION['stfid'];
} else {
    ?>
    <script>
        alert('You Are Not Logged In !! Please Login to access this page');
        alert(window.location = 'adminlogin.php');
    </script>
    <?php
}
?>