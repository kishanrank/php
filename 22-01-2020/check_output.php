<?php 

$a = '1';
echo $b = &$a;
echo '<br>';
echo $c = "2$b";
echo '<br>';



var_dump(0123 == 123);
echo '<br>';
var_dump('0123' == '123');
echo '<br>';
var_dump('0123' === 123);
echo '<br>';


$x = true and false;
var_dump($x);
echo '<br>';


$array = array(
    1 => "a",
    "1" => "b",
    1.5 => "c",
    true => "d",
    );
    print_r($array);

?>
