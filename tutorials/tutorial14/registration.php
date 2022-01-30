<?php

    require 'db.php';
    $id = (isset($_GET['id']))?$_GET['id']:'';
    
    $sql = "select * from books where id='$id'";

    $result = $db->query($sql);
    $row = $result->fetch_assoc();

    $Book_Title="";
    $Author="";
    $Price="";
    $Stock="";
    
    if($id!='')
    {
        $Book_Title=$row['title'];
        $Author=$row['author'];
        $Price=$row['price'];
        $Stock=$row['stock'];
    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Registration</title>
    <style>
        body
            {
                background: #4bb79e;
                background: -webkit-linear-gradient(to right, #184846, #4bb79e);
                background: linear-gradient(to right, #184846, #4bb79e);
            }
    </style>
</head>

<body>
    <div class="container mx-auto">
        <div class="row justify-content-center ">
            <div class="col-sm-6 p-3">
                <form action="book_add.php" method="post" enctype="multipart/form-data">
                <div class="card rounded-3">
                    <h5 class="mt-3 text-center">Book</h5>
                    <div class="card-body">

                    <input type="hidden" name="id" value="<?= $id ?>"/>
                        <div class="row p-2">
                            <div class="col-md-4">
                                Book Title
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Book Title" value="<?=$Book_Title?>">
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                Author
                            </div>
                            <div class="col-md-8">
                                <input type="text" id="author" name="author" class="form-control" placeholder="Author" value="<?=$Author?>">
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-md-4">
                                Price
                            </div>
                            <div class="col-md-8">
                                <input type="number" id="price" name="price" class="form-control" placeholder="Price" value=<?=$Price?>>
                            </div>
                        </div>
                        <div class="row p-2">
                            <div class="col-md-4">
                                Stock
                            </div>
                            <div class="col-md-8">
                                <input type="number" id="stock" name="stock" class="form-control" placeholder="Stock" value=<?=$Stock?>>
                            </div>
                        </div>

                        <div class="row p-2">
                            <div class="col-md-4">
                                Photo
                            </div>
                            <div class="col-md-8">
                                <input id="file"
                                onchange="return fileValidation()"
                                 class="form-control" name="profile" type="file" accept=".jpg,.png,.jpeg,.bmp">
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-grid gap-2 col-6 mx-auto mt-2">
                                <button type="submit" id="register" class="btn btn-success">REGISTER</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>        
    </div>

    <script>
        function fileValidation() {
            var fileInput = 
                document.getElementById('file');
              
            var filePath = fileInput.value;
          
            // Allowing file type
            var allowedExtensions = 
                    /(\.jpg|\.jpeg|\.png|\.bmp)$/i;
              
            if (!allowedExtensions.exec(filePath)) {
                alert('Please Choose a Photo');
                fileInput.value = '';
                return false;
            } 
            else 
            {
              
                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                            'imagePreview').innerHTML = 
                            '<img src="' + e.target.result
                            + '"/>';
                    };
                      
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
    </script>


    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                    alert("Please enter all the values...");
                    return false;
                }
                else
                {
                        alert("Successful...");
                }
            });
        });
    </script>

</body>
</html>
