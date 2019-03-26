<?php
session_start();

if (isset($_SESSION['user']) && isset($_SESSION['userid'])) {
    $username = $_SESSION['user'];
    $cusid = $_SESSION['userid'];
} else {
    ?>
    <script>
        alert('You Are Not Logged In !! Please Login to access this page');
        alert(window.location = 'login.php');
    </script>
    <?php
}
?>