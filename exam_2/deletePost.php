<?php 
session_start();
require_once 'validation.php';
checkSession('email');
$id = $_GET['id'];

$deleteQuery = deleteData('post', "id = '$id'");

if($deleteQuery) {
    echo "<script>alert('Deleted Successfully');location.href = 'homePage.php';</script>";
} else {
    echo "<script>alert('Error in deletion');</script>";
}
?>