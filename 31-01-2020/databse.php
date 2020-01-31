<?php

require_once 'preparedData.php';
$connection = mysqli_connect('localhost:3306', 'root', '', 'customer_portal') or die('Connection Failure');
echo "Connected Sucessfully";


function insertData($tableName, $preparedData) {
    $mysqli = new mysqli("localhost","root","","customer_portal");

    $tableField = array_keys($preparedData);
    $field = implode(",", $tableField );

    $tableValue = array_values($preparedData);
    $value = "'".implode("','", $tableValue)."'";

    $sql = "INSERT INTO $tableName ($field) VALUES ($value)";
    if (mysqli_query($mysqli, $sql)) {
        //echo "New record created successfully";
        $lastid = mysqli_insert_id($mysqli);
        //echo $lastid;
        return $lastid;
    }
    else {
        echo mysqli_error($mysqli);
    } 
}

function displayData($col, $tableName) {
    //echo $col;
    //echo $tableName;
    // echo $id;
    $mysqli = new mysqli("localhost","root","","customer_portal");
    $sql = "select $col from $tableName";
    //echo $sql."<br>";

    $result = mysqli_query($mysqli, $sql);
    $displayData =[];
    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1px'>";
        while($row = mysqli_fetch_assoc($result)) {
            array_push($displayData, $result);
        }
        echo "</table>";
    } else {
        echo mysqli_error($mysqli);
    }
}

/*
function insertData($fields, $values, $tableName)
{
    global $connection;
    $tablefields = implode(",", $fields);
    $tableValues = "'" . implode("','", $values) . "'";

    $insertQuery = "insert into $tableName ($tablefields) values ($tableValues)";
    return (mysqli_query($connection, $insertQuery) == 1 ) ? 1 : mysqli_error($connection);

}
function deleteData(){

}
*/
?>