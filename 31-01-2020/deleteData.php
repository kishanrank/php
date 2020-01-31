<?php 


$id = $_GET['id'];
deleteData('customers', "cust_id=$id");

function deleteData($tableName, $condition){

    $mysqli = new mysqli("localhost","root","","customer_portal");

    $sql = "DELETE FROM $tableName WHERE $condition";

    $result = mysqli_query($mysqli, $sql);

    if($result){
        echo "Data deleted sucessfully";
    }else {
        echo "data not deleted";
    }
}

?>

