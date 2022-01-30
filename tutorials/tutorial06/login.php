<?php

  session_start();  


  if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
  {
       $user = $_POST['username'];
       $pass = $_POST['password'];


       if(isset($_SESSION['username']))   // Checking whether the session is already there or not
       {
            $valuser=$_SESSION['username'];
            $valpass=$_SESSION['password'];
            
            if(($user == $valuser)  && ($pass == $valpass))
            {

                //echo '<script type="text/javascript"> window.open("index.php","_blank");</script>';    //  On Successful Login redirects to index.php
	header("location:index.php");
            }
            else
            {
                echo '<script type="text/javascript"> alert("Invalid Username Or Password");</script>';        
            }
        }
        else
        {
                echo '<script type="text/javascript">
                           alert("Please Registration First");
                           window.open("registration.php","_blank");
                      </script>';             
        }
      
}
 ?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Login</title>
  <style>
        body
            {
                background: #4bb79e;
                background: -webkit-linear-gradient(to right, #184846, #4bb79e);
                background: linear-gradient(to right, #184846, #4bb79e);
            }
    </style>
</head>

<body class="bg-success p-2 page-wrapper bg-dark p-t-100 p-b-50" >
  

  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <form action="login.php" method="post">
        <div class="card rounded-3 text-center">
          <div class="card-header">
            <h4 style="text-align: center;">Login</h4>
          </div>
          <div class="card-body">
            
            <div class="row">
              <div class="col-md-4 p-2">
                Username
              </div>
              <div class="col-md-8 p-2">
                <input type="email" class="form-control" name="username" placeholder="Username@example.com">
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-4 p-2">
                Password
              </div>
              <div class="col-md-8 p-2">
                <input type="password" name="password" class="form-control" placeholder="Password">
              </div>
            </div>
            
            <div class="row">
                <div class="col p-2">
                  <button type="submit" name="login" class="btn btn-primary">Login</button>
                </div>
            </div>
            <div class="row">
              <div class="col p-2">
                <p>Don't Have an Account? <a href="registration.php">Register</a></p>
              </div>
          </div>
          </div>
          <!-- </div> -->
          </form>
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>

</body>

</html>