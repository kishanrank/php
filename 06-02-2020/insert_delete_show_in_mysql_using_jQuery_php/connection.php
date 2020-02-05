<?php
$mysqli = new mysqli("localhost", "root", "", "kishan1");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
?>
