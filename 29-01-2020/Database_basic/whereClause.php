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

$sql = 'SELECT * FROM info where name="rajnik"';

$result = mysqli_query($connection, $sql);

$rowCount = mysqli_num_rows($result);

if($rowCount >0) {
while($data = mysqli_fetch_assoc($result)){
echo $data["id"]. " -- " .$data["name"]."<br>";

}
}

mysqli_close($connection);

?>