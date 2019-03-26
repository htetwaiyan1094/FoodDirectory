<?php
  session_start();
  unset($_SESSION['admin']);
  unset($_SESSION['stfid']);
  
  echo "<script>window.location='index.php'</script>";
?>