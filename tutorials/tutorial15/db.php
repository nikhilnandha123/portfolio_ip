<?php

$db=new mysqli('localhost','root','','tutorial13');

	if($db -> connect_errno)
	{
		echo $db ->connect_error;
		exit;
	}
?>