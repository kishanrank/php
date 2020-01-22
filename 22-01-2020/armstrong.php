<?php 

$number = $_POST['number'];
echo $number;
$sum = 0;
$remainder;
$temp = $number;

while($number>0) {

    $remainder = $number%10;
    $sum = $sum + $remainder*$remainder*$remainder;
    $number = $number/10;

    
}
if($sum==$temp){
    echo "entered number is armstrong";
}else{
    echo "Entered number is not a armstorng";

}

?>

<form method="post" action="armstrong.php">

<input type="text" placeholder="Enter a number" name="number">
<input type="submit">




</form>