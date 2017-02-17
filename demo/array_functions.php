<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php 

$list = array(1,2,33,4,5,6,7,8,9);

echo max($list);

echo "<br>".min($list);

//echo "<br>".median($list);

echo "<br>";

print_r($list);
echo "<br>";

//echo array_keys($list);
echo "<br>";

sort($list);

echo $list[0];
echo "<br>";

print_r($list);
echo "<br>";


?>

</body>
</html>