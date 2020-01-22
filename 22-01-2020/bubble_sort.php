<?php 

$number = array(61,52,25,65,33,85,75,24);
$max;
for($a=0; $a<=7; $a++){
    for($i=0; $i<=7-$a-1; $i++){
        if($number[$i]>$number[$i+1]) {
            $max = $number[$i];
            $number[$i] = $number[$i+1];
            $number[$i+1] = $max;

        }
    }
}

print_r($number);




?>