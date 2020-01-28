<?php 

$filename = 'name.txt';
$handle = fopen($filename, 'r');
echo fread($handle, filesize($filename));

?>