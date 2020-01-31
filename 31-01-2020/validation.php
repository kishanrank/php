<?php
require_once 'databse.php';
require_once 'preparedData.php';
session_start();
echo "<pre>";

print_r($_POST);
function output($section, $field, $returnType = "")
{
    return (isset($_SESSION[$section][$field]) ? $_SESSION[$section][$field] : $returnType);
}
function validateForm($fieldname, $fieldvalue)
{
    switch ($fieldname) {
        case 'fname':
            return (!preg_match('/^[a-zA-Z]*$/', $fieldvalue)) ? 0 : 1;
            break;
        case 'lname':
            return (!preg_match('/^[a-zA-Z]*$/', $fieldvalue)) ? 0 : 1;
            break;
        case 'pnumber':
            return (!preg_match('/[0-9]/', $fieldvalue) || strlen($fieldvalue) != 10) ? 0 : 1;
            break;
        case 'email':
            return (!filter_var($fieldvalue, FILTER_VALIDATE_EMAIL)) ? 0 : 1;
            break;
        case 'city':
            return (!preg_match('/^[a-zA-Z]*$/', $fieldvalue)) ? 0 : 1;
            break;
        case 'state':
            return (!preg_match('/^[a-zA-Z]*$/', $fieldvalue)) ? 0 : 1;
            break;
        case 'postcode':
            return (!preg_match('/[0-9]/', $fieldvalue) || strlen($fieldvalue) != 6) ? 0 : 1;
            break;
        case 'password':
            return ($fieldvalue !== $_POST['account']['confirm_password']) ? 0 : 1;
            break;
        default:
            return 1;
    }
}

$errList = [];
function sectionToValidate($section)
{
    global $errList;
    $fieldNames = [];
    $fieldValues = [];

    foreach ($_POST[$section] as $key => $value) {
        if (!empty($value)) {
            if (validateForm($key, $value) == 0) {
                echo "Enter valid $key <br>";
                array_push($errList, $key);
            }
        } else {
            echo "please fill $key";
        }

        if ($key != 'confirm_password') {
            array_push($fieldNames, $key);
            array_push($fieldValues, $value);
        }
    }
    /*
    if (empty($errList)){
        global $lastID;
        global $connection;
        if ($section == 'account') {
            echo insertData($fieldNames, $fieldValues, "customers");
            $lastID = mysqli_insert_id($connection);
        }elseif($section == 'address'){
            echo  insertData($fieldNames, $fieldValues,'customer_address');
        }
    }
    */
}
if (isset($_POST['register'])) {
    sectionToValidate('account');
    sectionToValidate('address');
    sectionToValidate('other');
}
echo "</pre>";
?>