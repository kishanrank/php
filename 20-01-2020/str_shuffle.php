<?php 

$secret_key = "abcdefghijkl1234567890";


$result = str_shuffle($secret_key);
$half = substr($result, 0, 10);
echo $half;

?>