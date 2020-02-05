<?php

$id = $_GET['id'];
$conn = mysqli_connect('localhost:3306', 'root', '', 'login_session');
if (!$conn) {
    echo "Connection Failure";
}

$deleteQuery = "DELETE FROM blog_post WHERE id='$id'";

if (mysqli_query($conn, $deleteQuery)) {
    echo "<script>alert('Deleted Successfully');location.href = 'mainPage.php';</script>";
}else{
    echo "error in deletion";

}
?>