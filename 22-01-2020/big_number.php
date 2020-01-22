<?php 

$num = array(101,2,3,555,5,6,888,22,75,99);

$max = $num[0];
for($i=0; $i<=9; $i++){
    if($num[$i]>$max){
        $max = $num[$i];
    }
}
echo $max;


?>