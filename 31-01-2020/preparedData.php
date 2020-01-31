<?php

function accountData($section)
{
    $prepareAccountData = [];
    foreach ($_POST[$section] as $fieldname => $fieldvalue) {
        switch ($fieldname) {
            case 'prefix':
                $prepareAccountData['prefix'] = $fieldvalue;
                break;
            case 'firstname':
                $prepareAccountData['firstname'] = $fieldvalue;
                break;
            case 'lastname':
                $prepareAccountData['lastname'] = $fieldvalue;
                break;
            case 'birthdate':
                $prepareAccountData['birthdate'] = $fieldvalue;
                break;
            case 'pnumber':
                $prepareAccountData['pnumber'] = $fieldvalue;
                break;
            case 'email':
                $prepareAccountData['email'] = $fieldvalue;
                break;
            case 'password':
                $prepareAccountData['password'] = $fieldvalue;
        }
    }
    $lastid = insertData('customers', $prepareAccountData);
    //echo $lastid;
    addressData('address', $lastid);
    otherData('other', $lastid);
}
function addressData($section, $lastid)
{   

    $prepareAddressData = [];
    $prepareAddressData['addr_id'] = $lastid;
    foreach ($_POST[$section] as $fieldname => $fieldvalue) {
        switch ($fieldname) {
            case 'address1':
                $prepareAddressData['address1'] = $fieldvalue;
                break;
            case 'address2':
                $prepareAddressData['address2'] = $fieldvalue;
                break;
            case 'company':
                $prepareAddressData['company'] = $fieldvalue;
                break;
            case 'city':
                $prepareAddressData['city'] = $fieldvalue;
                break;
            case 'state':
                $prepareAddressData['state'] = $fieldvalue;
                break;
            case 'country':
                $prepareAddressData['country'] = $fieldvalue;
                break;
            case 'postcode':
                $prepareAddressData['postcode'] = $fieldvalue;
        }
    }
    //print_r($prepareAddressData);
    insertData('customer_address', $prepareAddressData);
}
function otherData($section, $lastid)
{
    $prepareOtherData = [];
    foreach ($_POST[$section] as $fieldname => $fieldvalue) {
        switch ($fieldname) {
            case 'about_yourself':
                $prepareOtherData['about_yourself'] = $fieldvalue;
                break;
            case 'time_in_business':
                $prepareOtherData['time_in_business'] = $fieldvalue;
                break;
            case 'no_of_clients':
                $prepareOtherData['no_of_clients'] = $fieldvalue;
                break;
            case 'how_touch':
                $prepareOtherData['how_touch'] = implode(",", $fieldvalue);
                break;
            case 'hobbies':
                $prepareOtherData['hobbies'] = implode(",", $fieldvalue);
        }
    }
    //print_r($prepareOtherData);
    $otherArray = [];
    foreach($prepareOtherData as $key => $value){
        $otherArray['fieldkey'] = $key;
        $otherArray['value'] = $value;
        $otherArray['other_id'] = $lastid;
        insertData('customer_additional_info', $otherArray);
    }
} 

if(isset($_POST["account"]) && isset($_POST["address"]) && isset($_POST["other"]) && isset($_POST['register'])) {
    accountData('account'); 
    displayData("*", 'customers');
    //displayData("*", 'customer_address',"ID = 1");
} 
?>