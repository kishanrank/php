<?php

function addNumber($num1, $num2)
{
    return $num1 + $num2 . "<br>";
}

echo addNumber(10, 20);

function subNumber($num1, $num2)
{
    return $num1 - $num2 . "<br>";
}
echo subNumber(20, 25);

function devideNumber($num1, $num2)
{
    $res =  $num1 / $num2 ;
    return $res;
}

$result = devideNumber(addNumber(10, 20), subNumber(4, 2));
echo $result;
