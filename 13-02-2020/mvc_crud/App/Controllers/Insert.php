<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Insert as insertData;
use App\Models\Post;

class Insert extends \Core\Controller
{
    public function insertAction()
    {
        View::renderTemplate('Insert/insert.html');
        if (isset($_POST['addData']) && isset($_POST['user'])) {
            $isvalid = $this->validateSection('user');
            echo $isvalid;
            if ($isvalid) {
                $user_data = $this->accountData('user');
                insertData::addData('user_data', $user_data);
            }
        }
    }

    public function updateAction()
    {

        $posts = Post::getRow($this->route_params['id']);
        View::renderTemplate('Insert/insert.html', ['edit' => 'edit', 'posts' => $posts]);

        if (isset($_POST['addData']) && isset($_POST['user'])) {
            $user_data = $this->accountData('user');
            insertData::updateData($user_data, $this->route_params['id']);
        }
    }


    public function deleteAction()
    {
        insertData::deleteData($this->route_params['id']);
    }


    public function validateData($fieldname, $fieldvalue)
    {
        switch ($fieldname) {
            case 'name':
                return (!preg_match('/^[a-zA-Z]*$/', $fieldvalue) || empty($fieldvalue)) ? 0 : 1;
                break;
            case 'mobile':
                return (!preg_match('/[0-9]/', $fieldvalue) || strlen($fieldvalue) != 10) ? 0 : 1;
                break;
            default:
                return 1;
        }
    }

    public function validateSection($section)
    {
        $valid = false;
        foreach ($_POST[$section] as $key => $value) {
            if (!empty($value)) {
                if ($this->validateData($key, $value) == 0) {
                    echo "Enter valid $key <br>";
                    $valid = false;
                    break;
                } else {
                    $valid = true;
                }
            }
        }
        return $valid;
    }
    public function accountData($section)
    {
        $accountData = [];
        foreach ($_POST[$section] as $fieldname => $fieldvalue) {
            switch ($fieldname) {
                case 'name':
                    $accountData['name'] = $fieldvalue;
                    break;
                case 'mobile':
                    $accountData['mobile'] = $fieldvalue;
                    break;
            }
        }
        return $accountData;
    }
}
?>