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
$title= isset($_POST['title']) ? $_POST['title']:"";
$author= isset($_POST['author']) ? $_POST['author']:"";
$price= isset($_POST['price']) ? $_POST['price']:"";
$stock= isset($_POST['stock']) ? $_POST['stock']:"";
$profile= isset($_FILES['profile']) ? $_FILES['profile']['name']:"";


$sql="";


if($id!='')
{

    $sql="update books set title='$title', author='$author', price='$price',titleurl='$profile', stock='$stock'where id='$id'";    
    
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

    $sql="insert into books (title,author,price,titleurl,stock) values('$title','$author','$price','$profile','$stock')";

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