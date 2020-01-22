<?php

$input = $_POST['input'];
for ($a = 2; $a <= $input - 1; $a++) {
     if ($input % $a == 0) {
          $result = true;
     }
}
if (isset($result) && $result) {
     echo 'The Number ' . $input . ' is not prime';
} else {
     echo 'The Number ' . $input . ' is prime';
}
?>   

<form method="post">
     Enter a Number: <input type="text" name="input"><br><br>
     <input type="submit" name="submit" value="Submit">
</form>