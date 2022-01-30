<?php

$db=new mysqli('localhost','root','','votesystem');

	if($db -> connect_errno)
	{
		echo $db ->connect_error;
		exit;
	}
	else	
	{
		echo "<script>alert('Database Connected...');</script>";
	}
?>