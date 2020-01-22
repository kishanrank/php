<?php 

$num1 = 10;
$num2 = 15;
$temp;

if($num1 <$num2) {
    $temp = $num1;
}
for($temp=$num1; $temp>=1; $temp--){
    if($num1 % $temp == 0 && $num2 % $temp == 0 ) {
    break;
    }
}
echo "HCF of a number " . $temp.'<br>';


/////////// LCM /////////////////////////

$result = $num1*$num2/($temp);
echo "LCM of a number ".$result;

?>