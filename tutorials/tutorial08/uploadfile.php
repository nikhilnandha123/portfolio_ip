<?php

echo "<pre>";
//print_r($_FILES['profile']);
echo "<pre>";

//------Code 1 (Tested)------

$filename=$_FILES['profile']['name'];
$tempname=$_FILES['profile']['tmp_name'];
$folder="Upload/".$filename;
move_uploaded_file($tempname, $folder);

echo $folder;



//------Code 2 (Tested)------

//$folder = "Images/";  
//$folder = $folder.basename( $_FILES['profile']['name']);   
  
//if(move_uploaded_file($_FILES['profile']['tmp_name'], $folder)) 
//{  
//    echo '<script> alert("File uploaded successfully!"); </script>';  
//} 
//else
//{  
//    echo '<script> alert("Sorry, file not uploaded, please try again!"); </script>';
//}  

?>