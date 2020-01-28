<?php 

/*$rand = rand();
$max = getrandmax();
echo $rand . "/". $max;
*/
if(isset($_POST['Roll']))  {
    $dice = rand(1,6);
    echo "You Rolled Number : ".$dice;

}




?>
<form action="random.php" method="POST">
    <input type="submit" name="Roll" value="Roll Dice">
</form>