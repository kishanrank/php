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
$sql_address  =  "INSERT INTO customer_address(address1, address2, company, city, state, country, postcode) VALUES 
('".$_POST["address1"]."', '".$_POST["address2"]."', '".$_POST["company"]."', '".$_POST["city"]."',  '".$_POST["state"]."', '".$_POST["country"]."', '".$_POST["postcode"]."',)";

//mysqli_query($connection, $sql_account);
mysqli_query($connection, $sql_address);


?>