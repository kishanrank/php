<?php 

$host = "localhost:3306";
$user = 'root';
$password = '';
$db = 'customer_portal';

$connection = mysqli_connect($host, $user, $password, $db);

if(!$connection) {
    echo "Databse is not connected "."<br>";
}else {
    echo "Database is sucessfully connected to ".$db."<br>";
}
$sql = "UPDATE customers set firstname='Rajnik' where id='3'";

if(mysqli_query($connection,$sql)){
    echo "Data updated sucessfully";
}else {
    echo "Data updation failure";
}



?>