<table border="1px">
<?php 
$number = 1;
for($i=1; $i<=10; $i++) {
    echo "<tr>";
    for($j=1; $j<=10; $j++){
        ; 
        echo "<td>".$number*$j."</td>";
        
    }
    

    echo '<br>';
    $number++;
    
}

?>
</table>