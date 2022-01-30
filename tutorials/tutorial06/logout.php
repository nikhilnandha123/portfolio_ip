<?php
 session_start();

  echo '<script type="text/javascript"> alert("Logout Successfully... ");</script>';
  session_destroy();   // function that Destroys Session 
  header("Location: login.php");
?>
