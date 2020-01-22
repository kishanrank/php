<?php 
$counter =0;
for($i=1; $i<=5; $i++){

    for($j=1; $j<=$i+$counter; $j++ ){
        echo "*";
    }
    for($k=1; $k<=$i; $k++){
        echo "0";

    }
    echo '<br>';
    $counter+= $i;
}


?>