<?php 

$host = 'localhost:3306';
$user = 'root';
$password = '';
$db = 'kishan';
$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die('Connection Failure');
}
echo "Connected sucessfully"."<br>";

$sql = "DROP TABLE info1";

if(mysqli_query($conn, $sql)){
    echo "Table dropped sucessfully";
}else {
    echo "Table not dropped";
}
mysqli_close($conn);


?>