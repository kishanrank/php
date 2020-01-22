<table border="1">

<?php 
$number = 1;
for($i=1; $i<=6; $i++) {
    echo "<tr>";
    for($j=1; $j<=5; $j++){
         
        echo "<td>".$number."*".$j."=".$number*$j."</td>";
        
    }
    

    echo '<br>';
    $number++;
    
}

?>
</table>