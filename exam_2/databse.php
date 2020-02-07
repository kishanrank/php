<?php

//require_once 'connection.php';
$connection = mysqli_connect('localhost', 'root', '', 'blog_portal');

function insertUserData($table, $prepareData)
{

    global $connection;
    // column name //
    $tableField = array_keys($prepareData);
    $field = implode(',', $tableField);
    // column value //
    $tableValue = array_values($prepareData);
    $value = "'" . implode("','", $tableValue) . "'";

    $add_data = "INSERT INTO $table ($field) VALUES ($value)";
    if (mysqli_query($connection, $add_data)) {
        echo "<script>alert('Data added Sucessfully');location.href = 'homePage.php';</script>";
    } else {
        echo mysqli_error($connection);
    }
}

function fetchAllData($table, $condition)
{
    global $connection;

    $select_query = "SELECT * FROM $table ";
    $result = mysqli_query($connection, $select_query);
    return $result;

}

function deleteData($table, $condition)
{
    global $connection;
    $sql = "DELETE FROM $table WHERE $condition";
    $result = mysqli_query($connection, $sql);
    return $result;
}

function getUserid($condition)
{
    global $connection;
    $sql = "SELECT user_id FROM user_detail where ($condition)";
    $result = mysqli_query($connection, $sql);
    $id = mysqli_fetch_assoc($result);
    $u_id = $id['user_id'];
    return $u_id;
}

function updateRecord($table, $data, $condition)
{
    global $connection;
    foreach ($data as $key => $value) {
        $col[] = "$key ='$value'";
    }
    $updateQuery = "UPDATE $table SET " . implode(',', $col) . " WHERE $condition";
    if(mysqli_query($connection, $updateQuery)) {
        echo "<script>alert('Updated Successfully');location.href='homePage.php';</script>";
    } else {
        echo mysqli_error($connection);
    }
}
