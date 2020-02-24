<?php

namespace App\Controllers;


use Core\View;
use \App\Models\DataOperation;

class User extends \Core\Controller
{
    public function registerAction()
    {
        View::renderTemplate('User/register.html');
    }

    public function loginAction()
    {
        View::renderTemplate('User/login.html');
    }

    public function addServiceAction()
    {
        View::renderTemplate('User/addService.html');
    }


    public function validateRegisterAction()
    {
        if (isset($_POST['user_register'])) {
            $userData = $this->prepareUserData('user');
            $addressData = $this->preparAddressData('address');
            $lastId = DataOperation::addData('user', $userData);
            $addressData['user_id'] = $lastId;

            $result = DataOperation::addData('address', $addressData);
            if ($result) {
                echo "<script>alert('Registered Sucessfully')</script>";
                View::renderTemplate('User/login.html');
            }
        }
    }

    public function validateLoginAction()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $id = DataOperation::getCurrentId('user', $email, $password);
        $currentId = $id['user_id'];
        $result = DataOperation::getRow('user', $email, $password);
        $_SESSION['current_id'] = $currentId;
        if ($result) {
            header("location: ../user/displayDashboard");
        } else {
            echo "please enter a valid user data";
        }
    }

    public function displayDashboardAction()
    {
        $id = $_SESSION['current_id'];
        $data = DataOperation::getAllById('service', "user_id='$id'");
        View::renderTemplate('User/dashboard.html', ['serviceData' => $data]);
    }

    public function uploadServiceAction()
    {
        $serviceData = $this->prepareServiceData('service');
        $id = $_SESSION['current_id'];
        $serviceData['user_id'] = $id;
        $data = $this->validateslot($serviceData['date'], $serviceData['slot']);
        $licence_data = $this->validateLicence($serviceData['licence_number']);
        $vehicleNumberData = $this->validateVehicleNumber($serviceData['vehicle_number']);
        if ($data > 3 || $licence_data == 0 || $vehicleNumberData == 0 ) {
            echo "<script>alert('The slot you have selected is already full, please use another slot. OR data u entered is already exist.')</script>";
        } else {
            DataOperation::addData('service', $serviceData);
            echo "<script>alert('Your service request is sended sucessfully')</script>";
            header("location: ../user/displayDashboard");
        }
    }

    public function validateslot($date, $slot)
    {
        $countResult = DataOperation::getSlotCount('service', $date, $slot);
        return $countResult['slot'];
    }

    public function validateVehicleNumber($v_number)
    {
        $vNumberResult = DataOperation::getFullColumnData('service', 'vehicle_number');
        foreach ($vNumberResult as $value) {
            if ($value['vehicle_number'] == $v_number) {
                $valid_num = 0;
                break;
            } else {
                $valid_num = 1;
            }
        }
        return $valid_num;
    }

    public function validateLicence($lic_data)
    {
        $userId = $_SESSION['current_id'];
        $licenceResult = DataOperation::getColumnData('service', 'licence_number', "user_id!=$userId");
        foreach ($licenceResult as $value) {
            if ($value['licence_number'] == $lic_data) {
                $valid_lic = 0;
                break;
            } else {
                $valid_lic = 1;
            }
        }
        return $valid_lic;
    }

    public function prepareUserData($section)
    {
        $userData = [];
        foreach ($_POST[$section] as $fieldname => $fieldvalue) {
            switch ($fieldname) {
                case 'first_name':
                    $userData['first_name'] = $fieldvalue;
                    break;
                case 'last_name':
                    $userData['last_name'] = $fieldvalue;
                    break;
                case 'email':
                    $userData['email'] = $fieldvalue;
                    break;
                case 'mobile':
                    $userData['mobile'] = $fieldvalue;
                    break;
                case 'password':
                    $userData['password'] = $fieldvalue;
                    break;
            }
        }
        return $userData;
    }


    public function preparAddressData($section)
    {
        $addressData = [];
        foreach ($_POST[$section] as $fieldname => $fieldvalue) {
            switch ($fieldname) {
                case 'street':
                    $addressData['street'] = $fieldvalue;
                    break;
                case 'city':
                    $addressData['city'] = $fieldvalue;
                    break;
                case 'state':
                    $addressData['state'] = $fieldvalue;
                    break;
                case 'zip_code':
                    $addressData['zip_code'] = $fieldvalue;
                    break;
                case 'country':
                    $addressData['country'] = $fieldvalue;
                    break;
            }
        }
        return $addressData;
    }


    public function prepareServiceData($section)
    {
        $serviceData = [];
        foreach ($_POST[$section] as $fieldname => $fieldvalue) {
            switch ($fieldname) {
                case 'title':
                    $serviceData['title'] = $fieldvalue;
                    break;
                case 'vehicle_number':
                    $serviceData['vehicle_number'] = $fieldvalue;
                    break;
                case 'licence_number':
                    $serviceData['licence_number'] = $fieldvalue;
                    break;
                case 'date':
                    $serviceData['date'] = $fieldvalue;
                    break;
                case 'slot':
                    $serviceData['slot'] = $fieldvalue;
                    break;
                case 'status':
                    $serviceData['status'] = $fieldvalue;
                    break;
                case 'issue':
                    $serviceData['issue'] = $fieldvalue;
                    break;
                case 'service_center':
                    $serviceData['service_center'] = $fieldvalue;
                    break;
            }
        }
        $serviceData['created_at'] = date('Y/m/d h:i:s');
        return $serviceData;
    }
}
