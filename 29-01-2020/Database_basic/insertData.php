<?php

$db = 'localhost:3306';
$user = 'root';
$password = '';
$database = 'kishan';
$connection = mysqli_connect($db, $user, $password, $database);
if (!$connection) {
    echo "Connection Failure";
}
echo "Connection sucessfully";

$sql = "INSERT INTO info (id , name ) VALUES('2','rajnik')";

if(mysqli_query($connection,$sql)){
    echo "Data entered into table sucessfully";
}else {
    echo "Error has benn occured";
}


?>