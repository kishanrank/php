<?php 

session_start();
require_once 'validation.php';
checkSession('email');
$id = $_GET['id'];

$deleteQuery = deleteData('category', "id = '$id'");

if($deleteQuery) {
    echo "<script>alert('Deleted Successfully');location.href = 'manageCategory.php';</script>";
} else {
    echo "<script>alert('Error in deletion');</script>";
}
?>
