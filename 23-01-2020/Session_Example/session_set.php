<?php 

session_start();

$_SESSION['username'] = 'kishan';
echo "Session set sucessfully<br>";

?>
<a href="session_view.php"> view session </a>