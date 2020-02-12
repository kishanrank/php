<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Insert as insertData;

class Insert extends \Core\Controller
{
    public function insertAction()
    {
        View::renderTemplate('Insert/insert.html');

        if (isset($_POST['addData'])) {
            $name = $_POST['name'];
            $mobile = $_POST['mobile'];
            if (!empty($name) && !empty($mobile)) {
                $prepareData = [];
                $prepareData['name'] = $name;
                $prepareData['mobile'] = $mobile;
                //print_r($prepareData);

                insertData::addData('user_data', $prepareData);
            } else {
                echo "Please enter a valid data.";
            }
        }
    }
}
?>