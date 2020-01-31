<?php 

$host = 'localhost:3306';
$user = 'root';
$password = '';
$conn = mysqli_connect($host, $user, $password);

if(!$conn) {
    echo "Connection Failure"."<br>";
}echo "connection success!!"."<br>";

$sql = "DROP DATABASE kishan";

if(mysqli_query($conn, $sql)) {
    echo "Database Sucessfully Dropped"."<br>";
}else {
    echo "Error in Droping DB" .mysqli_error($conn);

}
mysqli_close($conn);


?>