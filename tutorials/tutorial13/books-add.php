<?php
session_start();
require "db.php";
$id = isset($_POST['id'])?$_POST['id']:"";
$title = isset($_POST['title'])?$_POST['title']:"";
$author = isset($_POST['author'])?$_POST['author']:"";
$price = isset($_POST['price'])?$_POST['price']:"";
$stock = isset($_POST['stock'])?$_POST['stock']:"";

$filename=$_FILES['bookimage']['name'];
$tempname=$_FILES['bookimage']['tmp_name'];
$fname=date('d-m-Y_H-i-s');
$pname=$fname."_".$filename;
$folder="images/".$pname;
$filetype=$_FILES['bookimage']['type'];
$filesize=$_FILES['bookimage']['size'];

if($filename=="")
{
    $_SESSION['imagefile']="Select Image";
    header("location:books-insert.php?id=$id");
    exit;
}

if($filetype!="image/png" && $filetype!="image/jpeg" && $filetype!="image/jpg")
{
    $_SESSION['imagetype']="File must be Image";
    header("location:books-insert.php?id=$id");
    exit;
}

if($filesize>=50000)
{
    $_SESSION['imagesize']="50kb";
    header("location:books-insert.php?id=$id");
    exit;
}

move_uploaded_file($tempname,$folder);
if($id=="")
{
    $sql = "insert into books (title, author, price, stock, titleurl) values ('$title', '$author', '$price', '$stock', '$folder')";
}
else
{
    $sql = "update books set title='$title', author='$author', price='$price', stock='$stock', titleurl='$folder' where id=$id";
}

if($db->query($sql))
{
    $_SESSION['status'] = ($id=="")?"Insertion Successful":"Update Successful";
}
else
{
    $_SESSION['status'] = ($id=="")?"Insertion Failed":"Update Failed";
}
header("location:index.php");

?>