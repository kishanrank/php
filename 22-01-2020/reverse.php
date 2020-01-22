<?php 

$number = 234;

$result = 0;

while($number>1){
$result = $result * 10;
$result = $result +  $number%10;
$number = $number/10;

}
echo $result;
?>

