<table border="1px">
<?php 

for($row=1; $row<=8; $row++){
    echo "<tr>";
    for($column=1; $column<=8; $column++){

        if(($row+$column)%2==0){
            echo "<td height=30px width=30px bgcolor=#FFFFFF></td>";
        }else{
            echo "<td height=30px width=30px bgcolor=#000000></td>";
        }
    }
    echo "</tr>";
}

?>

</table>