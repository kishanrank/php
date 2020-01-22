<?php 

$number = array(45,22,21,1,8,63,77,56,92);
sort($number);
print_r($number);
echo "<br>";

$length = sizeof($number);

echo "Second highest number is : ".$number[$length-2];





?>