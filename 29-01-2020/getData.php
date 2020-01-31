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

$sql = "select * from customers";

$result = mysqli_query($connection, $sql);

$rowCount = mysqli_num_rows($result);
echo "<table border='1px'>";
if($rowCount >0) {
    while($printData = mysqli_fetch_assoc($result)){
        echo "<tr><td>".$printData['prefix']."</td><td>".$printData['firstname']." </td><td> ".$printData['lastname']."</td><td>".$printData['birthdate']."</td><td>" .$printData['pnumber']."</td><td>".$printData['email']."</td><td>".$printData['password']."</td><td>".$printData['confirm_password']."</td></tr>";
    }
}

echo "</table>";

?>