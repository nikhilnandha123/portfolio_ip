<?php
//echo "<pre>";
//print_r($_POST);
//echo "</pre>";

$p = $_POST['p'];
$r = $_POST['r'];
$n = $_POST['n'];
$i = ($p * $r * $n)/100;
echo 'Simple Interest is: '.$i;
?>