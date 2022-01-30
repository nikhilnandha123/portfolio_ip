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
      
        <h2 class="text-danger" align="center">Student's Details</h2>

        <a class="link-primary" href="registration.php"><h5>Insert Data</h5></a>
    	<table class="table table-dark table-striped">
    		<thead>
        	<tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Age</th>
                    <th>DOB</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Profile</th>
                    <th>Note</th>
                    <th>Action</th>

            </tr>
            </thead>
            <?php
            $sql = "select id,username,password,age,DOB,country,state,city,profile,note from users";
    		$result = $db->query($sql);
            $count=1;
            while ($row = $result->fetch_assoc()) 
            {      
                 //print_r($row);
                
            ?>
            
            <tbody class="table-light">
            <tr>
                    <td><?=$count++;?></td>
                    <td><?=$row['username']?></td>
                    <td><?=$row['password']?></td>
                    <td><?=$row['age']?></td>
                    <td><?=$row['DOB']?></td>
                    <td><?=$row['country']?></td>
                    <td><?=$row['state']?></td>
                    <td><?=$row['city']?></td>
                    <td><img src="pic/<?= $row['profile'];?> " width="50" height="40"></td>
                    <td><?=$row['note']?></td>
                    <td>
                            <button class="btn btn-primary"><a class="text-white" href="registration.php?id=<?php echo $row['id'];?>">Edit</a></button>
                        <button class="btn btn-danger"><a class="text-white" href="user_delete.php?id=<?php echo $row['id'];?>" onclick=" return confirm('Are You Sure..?')">Delete</a></button>
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