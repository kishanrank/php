<?php

$host = 'localhost:3306';
$user = 'root';
$password = '';
$connect = mysqli_connect($host, $user, $password);

if (!$connect) {
    die('Connection Failure');
}
echo "Connected sucessfully"."<br>";

$sql = "CREATE DATABASE kishan";

if (mysqli_query($connect, $sql)) {
    echo "Database created";
} else {
    echo "Database not created";
}
