<?php
require 'db.php';

session_start();
if(isset($_SESSION['message']))
{
    echo $_SESSION['message'];
    unset($_SESSION['message']);    
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
	<div class="container mt-4">
    <h2 class="text-danger" align="center">Book's Details</h2>        
             
        <div class="row p-1">
            <div class="col-md-9">
                <a class="link-primary" href="registration.php"><h5>Insert Data</h5></a>
            </div>
            <div class="col-md-3">
                <form action="" method="post" class="form-inline">    
                        <input type="text" name="search" class="form bg-light">
                        <input type="submit" name="btnsearch" class="form btn-success" value="Search">
                </form>
            </div>
        </div>
        
        <table class="table table-dark table-striped">
    		<thead>
        	<tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Action</th>

            </tr>
            </thead>
            <?php

            $search=isset($_POST['search'])?$_POST['search']:'';

            $sql="";
            if($search!="")
            {
                $sql = "select * from books where id like '%$search%' OR title like '%$search%' or author like '%$search%' OR price like '%$search%' OR stock like '%$search%'";    
            }
            else
            {
                $sql = "select id,title,author,price,stock,titleurl from books";
            }
            $result = $db->query($sql);
            $count=1;

            if($result->num_rows<=0)
            {   
            ?>
                <tbody class="table-light text-center">
                    <td colspan="8"><h5>No Records Found</h5></td>
                </tbody>
            <?php
            }
            while ($row = $result->fetch_assoc()) 
            {      
                 //print_r($row);
                
            ?>
            
            <tbody class="table-light">
            <tr>
                    <td><?=$count++;?></td>
                    <td><img src="pic/<?=$row['titleurl'];?>" width="50" height="40"></td>
                    <td><?=$row['title']?></td>
                    <td><?=$row['author']?></td>
                    <td><?=$row['price']?></td>
                    <td><?=$row['stock']?></td>
                    <td>
                        <button class="btn btn-primary"><a class="text-white" href="registration.php?id=<?php echo $row['id'];?>">Edit</a></button>
                        <button class="btn btn-danger"><a class="text-white" href="book_delete.php?id=<?php echo $row['id'];?>" onclick=" return confirm('Are You Sure..?')">Delete</a></button>
                    </td>
            </tr>
        </tbody>
            <?php
            	}
            ?>
      
    	</table>

</div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>