<?php
require_once 'databse.php';
function accountData($section)
{
    $prepareAccountData = [];
    foreach ($_POST[$section] as $fieldname => $fieldvalue) {
        switch ($fieldname) {
                //  case 'prefix':
                //     $prepareAccountData['prefix'] = $fieldvalue;
                //     break;
            case 'firstname':
                $prepareAccountData['firstname'] = $fieldvalue;
                break;
            case 'lastname':
                $prepareAccountData['lastname'] = $fieldvalue;
                break;
            case 'email':
                $prepareAccountData['email'] = $fieldvalue;
                break;
            case 'mobile_number':
                $prepareAccountData['mobile_number'] = $fieldvalue;
                break;
            case 'password':
                $prepareAccountData['password'] = $fieldvalue;
                break;
            case 'information':
                $prepareAccountData['information'] = $fieldvalue;
                break;
        }
    }
    insertUserData('user_detail', $prepareAccountData);
    $data1 = array_values($prepareAccountData);

    //print_r($prepareAccountData);
}

function checkSession($sessionName) {
    if(empty($_SESSION[$sessionName])) {
        header("location: login.php");
    }
}
function destroySession($sessionName) {
    session_destroy();
    unset($_SESSION['$sessionName']);
    header('location: login.php');
}