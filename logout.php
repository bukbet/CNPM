<?php
  session_start();
  // session_unset("username");
 unset($_SESSION["username"]);
  header("location:index.php");
?>