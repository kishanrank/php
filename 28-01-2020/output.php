<?php 

session_start();


function output($section, $field, $returnType = ""){
    return (isset($_SESSION[$section][$field])? $_SESSION[$section][$field] : $returnType);
    
}

function set_session($sectionName){
    (isset($_POST[$sectionName]) ? $_SESSION[$sectionName] = $_POST[$sectionName]: []);

}
 function get_session($sectionName) {
    return (isset($_SESSION[$sectionName])? $_SESSION[$sectionName] : []);
 }

if(isset($_POST['account']) && isset($_POST['register'])) {
    set_session('account');
    set_session('address');
    set_session('other');
}
 echo "<pre>";
 print_r($_SESSION);
 echo "</pre>"; 


?>