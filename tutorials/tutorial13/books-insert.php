<?php
session_start();
require 'db.php';
$msg = isset($_SESSION['status'])?$_SESSION['status']:"";
$imagefile = isset($_SESSION['imagefile'])?$_SESSION['imagefile']:"";
$imagetype = isset($_SESSION['imagetype'])?$_SESSION['imagetype']:"";
$imagesize = isset($_SESSION['imagesize'])?$_SESSION['imagesize']:"";
$id = isset($_GET['id'])?$_GET['id']:"";

if($imagetype != "")
{
    echo "<script>alert('File must be Image');</script>";
    unset($_SESSION['imagetype']);
}

if($imagesize != "")
{
    echo "<script>alert('Image must be less than 50KB');</script>";
    unset($_SESSION['imagesize']);
}

if($imagefile != "")
{
    echo "<script>alert('Select Image');</script>";
    unset($_SESSION['imagefile']);
}

if($id=="")
{
    $title = "";
    $author = "";
    $price = "";
    $stock = "";
}
else
{
    $sql = "select * from books where id=$id";
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $author = $row['author'];
    $price = $row['price'];
    $stock = $row['stock'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid mt-5">
        <div class="row justify-content-center">
        <div class="col-md-8 alert alert-primary">
        <form action="books-add.php" method="post" enctype="multipart/form-data" id="register">
        <input type="hidden" name="id" value="<?=$id?>">
            
            <div class="row p-2">
                <div class="col-md-4">
                    Book Title
                </div>
                <div class="col-md-8">
                    <input type="text" name="title" placeholder="Title" value="<?=$title?>" class="form-control" id="title">
                </div>
            </div>
            
            <div class="row p-2">
                <div class="col-md-4">
                    Book Author
                </div>
                <div class="col-md-8">
                    <input type="text" name="author" placeholder="Author" value="<?=$author?>" class="form-control" id="author">
                </div>
            </div>

            <div class="row p-2">
                <div class="col-md-4">
                    Book Price
                </div>
                <div class="col-md-8">
                    <input type="text" name="price" placeholder="Price" value="<?=$price?>" class="form-control" id="price">
                </div>
            </div>

            <div class="row p-2">
                <div class="col-md-4">
                    Book Stock
                </div>
                <div class="col-md-8">
                    <input type="text" name="stock" value="<?=$stock?>" placeholder="Stock" class="form-control" id="stock">
                </div>
            </div>

            <div class="row p-2">
                <div class="col-md-4">
                    Book Image
                </div>
                <div class="col-md-8">
                    <input type="file" name="bookimage" class="form-control" id="image" accept=".jpg,.png,.jpeg,.bmp,.jfif">
                </div>
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-center m-3">
                <input type="submit" value="Sumbit" class="btn btn-primary" required>
            </div>
        </form>
        </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>

<script>
        $(document).ready(function(){
            $('#register').click(function(){
                $title = $('#title').val().toString();
                $author = $('#author').val().toString();
                $price = $('#price').val().toString();
                $stock = $('#stock').val().toString();
                
                if($title == "" | $author == "" | $price == "" | $stock == "")
                {
                    alert("Please Fill All Values");
                    return false;
                }
            });
        });
    </script>
</body>
</html>