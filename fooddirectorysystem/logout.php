<?php
  session_start();
  unset($_SESSION['user']);
  unset($_SESSION['userid']);
  
  echo "<script>window.location='login.php'</script>";
?>