<?php 

$number = array(11,5,77,45,62,2,3,88,92,23,33);

$lowest = $number[0];

for($i=1; $i<=10; $i++){
    if($number[$i]<$lowest){
        $lowest = $number[$i];
    }
}
echo $lowest;



?>