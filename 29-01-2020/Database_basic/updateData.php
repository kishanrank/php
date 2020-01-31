<?php

$db = 'localhost:3306';
$user = 'root';
$password = '';
$database = 'kishan';
$connection = mysqli_connect($db, $user, $password, $database);
if (!$connection) {
    echo "Connection Failure";
}
echo "Connection sucessfully"."<br>";

$sql = 'UPDATE info set name="tej" where name="rajnik"';

if(mysqli_query($connection, $sql)){
    echo "Data updated sucessfully";
}else {
    echo "Error has been occured";
}

mysqli_close($connection);

?>