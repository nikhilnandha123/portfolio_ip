<?php
session_start();
require 'db.php';
if(!isset($_SESSION['username']))
{
    header("Location:login.php");
}
$msg = isset($_SESSION['status'])?$_SESSION['status']:"";
unset($_SESSION['status']);
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
<body class="alert-primary">
	<div class="container mt-4">
        <div class="row text-center alert bg-primary">
            <h2 class="text-light">Books Management</h2>
        </div>
        <form action="index.php" method="post">
            <div class="navbar-nav mr-auto">
                <div class="col d-grid gap-2 d-md-flex justify-content-end nav-item">
                    <input class="form-control bg-transparent border-secondary w-25" placeholder="Search" type="text" name="search">
                    <input class="btn btn-success text-light nav-link p-2" value="Search" type="submit">
                    <a class="btn border-success text-success p-2" href="books-insert.php">+</a>
                    <a class="btn btn-success text-light p-2" href="logout.php">LOGOUT</a>
                </div>
            </div> 
        </form>
            <p class="text-success fw-bold"><?=$msg?></p>
    	<table class="table table-dark">
    		<thead>
        	<tr>
                    <th>SrNo</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>IssueCount</th>
                    <th>Action</th>
            </tr>
            </thead>
			<tbody class="table">
            <?php

            $search = isset($_POST['search'])?$_POST['search']:"";
            if($search == "")
            {
                $sql = "select 
            b.*,count(bi.bookid) as issuecount 
            from 
            books as b LEFT JOIN 
            bookissue as bi ON 
            bi.bookid = b.id
            group by 
            bi.bookid";
            }
            else
            {
                $sql = "select 
                b.*,count(bi.bookid) as issuecount 
                from 
                books as b LEFT JOIN 
                bookissue as bi ON 
                bi.bookid = b.id
                where
                title like '%$search%' or author like '%$search%' or price like '%$search%' or stock like '%$search%'
                group by 
                bi.bookid;";
            }
            
    		$result = $db->query($sql);
            while ($row = $result->fetch_assoc()) 
            {
            ?>
            <tr>
                    <td><?=$row['id']?></td>
                    <td>
                        <img src="<?=$row['titleurl']?>" alt="" srcset="" height="70" width="70">
                    </td>
                    <td><?=$row['title']?></td>
                    <td><?=$row['author']?></td>
                    <td><?=$row['price']?></td>
                    <td><?=$row['stock']?></td>
                    <td><?=$row['issuecount']?></td>
                    <td>
                        <a class="btn text-light bg-primary" href="books-insert.php?id=<?=$row['id'];?>">Update</a>
                        <a class="btn text-light bg-danger" onclick="return confirm('Do you want to delete the record?');" href="books-delete.php?id=<?=$row['id'];?>">Delete</a>
                    </td>
            </tr>
            <?php
            	}
            ?>
			</tbody>
    	</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>