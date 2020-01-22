<?php 

$num1 = 10;
$num2 = 15;
$number =1;
for($n=2; $n<10; $n++) {
    if($num1 % $n == 0 || $num2 % $n ==0) {
        $number  = $number * $n;
    }
    
}

echo $number;

?>
