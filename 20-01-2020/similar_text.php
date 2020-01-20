<?php 

$name1 = "My name is kishan.";
$name2 = "My name is bhautik.";

similar_text($name1, $name2,$result);
echo $result."%<br>";


$string = "This is a <img src='image.jpg'> image tag.";
$string_slashes = htmlentities($string);
echo $string_slashes;


?>