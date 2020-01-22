<?php 

$num1 = 30;
$num2 = 20;
$temp;

$temp = $num1;
$num1 = $num2;
$num2 = $temp;

echo $num1.'<br>';
echo $num2;

?>