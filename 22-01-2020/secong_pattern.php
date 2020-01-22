<?php 

$rows = 8;
$i;
$j;

for ($i=$rows; $i>=1; $i--) {
    for ($j=1; $j<=$i; $j++)
    { 
       echo $j ." ";
    }
    echo '<br>';
} 
   


?>