<?php
echo "<pre>";
print_r($_POST);
echo "</pre>";

$m = $_POST['month'];
echo $m;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <select name="month" id="">
                <!--
                <option>  <?= ($m==5) ? "selected" : "" ?>may</option>
                <option>  <?php if($m==6)echo"selected";?>june</option>
                -->

                <option <?= ($m == 1) ? "selected" : "" ?>>January</option>
                <option <?= ($m == 2) ? "selected" : "" ?>>February</option>
                <option <?= ($m == 3) ? "selected" : "" ?>>March</option>
                <option <?= ($m == 4) ? "selected" : "" ?>>May</option>
                <option <?= ($m == 5) ? "selected" : "" ?>>April</option>
                <option <?= ($m == 6) ? "selected" : "" ?>>June</option>
                <option <?= ($m == 7) ? "selected" : "" ?>>July</option>
                <option <?= ($m == 8) ? "selected" : "" ?>>August</option>
                <option <?= ($m == 9) ? "selected" : "" ?>>September</option>
                <option <?= ($m == 10) ? "selected" : "" ?>>October</option>
                <option <?= ($m == 11) ? "selected" : "" ?>>November</option>
                <option <?= ($m == 12) ? "selected" : "" ?>>December</option>
            </select> </div>
    </div>
</body>

</html>