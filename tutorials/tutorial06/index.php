<?php   

    session_start();

?>

<html>
  <head>
       <title> Home </title>
  </head>
<body>

<?php

      if(!isset($_SESSION['username'])) // If session is not set then redirect to Registration Page
       {
           header("Location:login.php");  
       }
       else
       {
            echo 'Welcome To Home Page...'.$_SESSION['username'];

          //echo '<script type="text/javascript"> alert("Login Successfully..."); </script>';

            echo "</br><a href='logout.php'>Click Here To Logout</a> "; 
       }

        
?>
</body>
</html>