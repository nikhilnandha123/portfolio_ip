<?php
  

  if (isset($_COOKIE['username']) && (isset($_COOKIE['password'])))
  {
      $username=$_COOKIE['username'];
      $password=$_COOKIE['password'];
      $remember=$_COOKIE['remember'];

      setcookie('username',$username,time()-1);
      setcookie('password',$password,time()-1);
      setcookie('remember',$remember,time()-1);
  }
  session_start();

  echo "<script>alert('Logout Successful');</script>";
  session_destroy();   // function that Destroys Session 
  header("Location: login.php");
?>
