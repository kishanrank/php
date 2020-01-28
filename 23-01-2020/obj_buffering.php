<?php ob_start() ?>

<h1>My Page</h1>

My name is kishan.

<?php 

$redirect = false;

if($redirect == true ) {
    header("Location: https://www.google.com");
}
?>