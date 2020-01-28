<?php 

$http_client_ip = $_SERVER['HTTP_CLIENT_IP'];
    echo $http_client_ip;

    
require 'include.ip.php';

    foreach($blocked_ip as $ip){
        if(($ip == $ip_address)){
            die("Your ip address ".$ip." is blocked");
        }
    }

    
?>