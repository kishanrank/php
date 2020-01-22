<?php

$year = 1600;


if ($year % 400 == 0 || ($year%4 == 0)&& (!$year%100 == 0)) {
    echo "Year is a leap year";
}else {
    echo "Year is a not a leap year";
}
?>