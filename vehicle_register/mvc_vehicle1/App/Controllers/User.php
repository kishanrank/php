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
        $service_data = $this->prepareServiceData('service');
        $service_data['created_at'] = date('Y/m/d h:i:s');
        $id = $_SESSION['current_id'];
        $service_data['user_id'] = $id;
        $data = $this->validateslot($service_data['date'], $service_data['slot'] );
        $licence_data = $this->validateLicence($service_data['licence_number']);
        if ($data >= 3) {
            echo "<script>alert('The slot you have selected is already full, please use another slot.')</script>";
        } else {
            DataOperation::addData('service', $service_data);
            echo "<script>alert('Your service request is sended sucessfully')</script>";
            header("location: ../user/displayDashboard");
        }
    }

    public function validateslot($date, $slot) {
        $countResult = DataOperation::getSlotCount('service', $date, $slot);
        return $countResult['slot'];
    }

    public function validateLicence($lic_data) {
        $valid = true;
        $licenceResult= DataOperation::getLicenceData('service', 'licence_number');
        foreach($licenceResult as $value) {
            if($lic_data == $value['licence_number']) {
                $valid = false;
            }

        }
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
                case 'issue':
                    $serviceData['issue'] = $fieldvalue;
                    break;
                case 'service_center':
                    $serviceData['service_center'] = $fieldvalue;
                    break;
            }
        }
        return $serviceData;
    }
}
