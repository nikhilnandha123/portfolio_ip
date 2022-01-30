<?php

require('db.php');

session_start();

//echo "<pre>";
//print_r($_POST);
//echo "</pre";


    $basepath="pic/";  
    $topath=$basepath.$_FILES['profile']['name'];
    $frompath=$_FILES['profile']['tmp_name'];

    move_uploaded_file($frompath, $topath);

$id=$_POST['id'];
$username= isset($_POST['username']) ? $_POST['username']:"";
$password= isset($_POST['password']) ? $_POST['password']:"";
$age= isset($_POST['age']) ? $_POST['age']:"";
$dob= isset($_POST['dob']) ? $_POST['dob']:"";
$country= isset($_POST['country']) ? $_POST['country']:"";
$state= isset($_POST['state']) ? $_POST['state']:"";
$city= isset($_POST['city']) ? $_POST['city']:"";
$profile= isset($_FILES['profile']) ? $_FILES['profile']['name']:"";
$note= isset($_POST['note']) ? $_POST['note']:"";


$sql="";


if($id!='')
{

    $sql="update users set username='$username', password='$password', age='$age', DOB='$dob', country='$country', state='$state', city='$city', profile='$profile', note='$note' where id='$id'";    
    
    if($db->query($sql))
    {
        $_SESSION['message']="Record Updated";
    }
    else
    {
        $_SESSION['message']="Updation Failed";    
    }
}
else
{

    $sql="insert into users (username,password,age,DOB,country,state,city,profile,note) values('$username','$password','$age','$dob','$country','$state','$city','$profile','$note')";

    if($db->query($sql))
    {
        $_SESSION['message']="Record Inserted";
    }
    else
    {
        $_SESSION['message']="Insertion Failed";    
    }
}

header("location:index.php");

?>