<?php 

$host = 'localhost:3306';
$user = 'root';
$password = '';
$connect = mysqli_connect($host,$user,$password);

if(!$connect){ 
    die('could not connect '.mysqli_error('error'));
}else {
    echo "connected sucess";
}
?> 