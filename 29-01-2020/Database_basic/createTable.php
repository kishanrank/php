<?php 

$host = 'localhost:3306';
$user = 'root';
$password = '';
$db = 'kishan';
$connect = mysqli_connect($host, $user, $password, $db);

if (!$connect) {
    die('Connection Failure');
}
echo "Connected sucessfully"."<br>";

$sql = "CREATE TABLE info1(id INT AUTO_INCREMENT, name VARCHAR(20) NOT NULL, primary key (id))";

if(mysqli_query($connect, $sql)){
    echo "Table created sucessfully";
}else {
    echo "Table not created";
}
mysqli_close($connect);


?>