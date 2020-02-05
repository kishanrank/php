<?php 

$conn = mysqli_connect('localhost', 'root', '', 'login_session') or die("Connection error");

$id = $_GET['id'];

$delete = "DELETE FROM category where id='$id'";

$result = mysqli_query($conn, $delete);
if($result){
    echo "<script>alert('Deleted Successfully');location.href = 'manageCategory.php';</script>";
}
?>