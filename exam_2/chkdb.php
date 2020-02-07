<?php
require_once 'connection.php';
//require_once 'validation.php';
function fetchAllData($table, $condition) {
    global $connection;

    $select_query = "SELECT * FROM $table WHERE $condition";
    $result = mysqli_query($connection, $select_query);
    // return $result;
    $result1 = mysqli_fetch_assoc($result);
    return $result1;
}

$data = fetchAllData('user_detail','');
print_r($data);
?>