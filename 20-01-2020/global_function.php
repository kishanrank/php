<?php

$user_ip = $_SERVER['REMOTE_ADDR'];

$age = 18;

function age(){
    global $age;
    global $user_ip;
    echo "My age is ".$age;
}

age()
?>
