<?php
  

  if (isset($_COOKIE['username']) && (isset($_COOKIE['password'])))
  {
      $username=$_COOKIE['username'];
      $password=$_COOKIE['password'];
      $remember=$_COOKIE['remember'];

      unset($_COOKIE['username']);
      unset($_COOKIE['password']);
      unset($_COOKIE['remember']);

  }
  session_start();

  echo "<script>alert('Logout Successful');</script>";
  //session_destroy();   // function that Destroys Session 
  header("Location: login.php");
?>
