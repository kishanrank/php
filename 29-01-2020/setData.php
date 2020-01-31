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


if(isset($_POST['register'])){

$sql = "INSERT INTO customers (prefix, firstname, lastname, birthdate, pnumber, email, password, confirm_password) VALUES 
('".$_POST["prefix"]."', '".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["dob"]."', '".$_POST["pnumber"]."' , '".$_POST["email"]."' , '".$_POST["password"]."' , '".$_POST["confirmPassword"]."');";

$sql .= "INSERT INTO customer_address(address1, address2, company, city, state, country, postcode) VALUES 
('".$_POST["address1"]."', '".$_POST["address2"]."', '".$_POST["company"]."', '".$_POST["city"]."',  '".$_POST["state"]."', '".$_POST["country"]."', '".$_POST["postcode"]."',)";
}else {
    echo "please set value";
}
if(mysqli_query($connection, $sql)){
    echo "sucessfully";
}else {
    echo "failed to add value to table";
}



?>