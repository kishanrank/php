<?php

namespace App\Controllers;

use App\Models\DataOperation;
use \Core\View;

class Admin extends \Core\Controller
{
    public function viewAction()
    {
        $result = DataOperation::getAll('service');
        View::renderTemplate('Admin/dashboard.html', ['serviceData' => $result]);
    }
    public function editResponseAction()
    {
        $id = $this->route_params['id'];
        $serviceData = DataOperation::getAllById('service', "service_id='$id'");
        View::renderTemplate('User/addService.html', ['edit' => 'edit', 'serviceData' => $serviceData[0]]);
        if (isset($_POST['add_service'])) {
            $updatedData =  User::prepareServiceData('service');
            $validateSlot = User::validateslot($updatedData['date'], $updatedData['slot']);
            if ($validateSlot > 3) {
                echo "slot is already full";
            } else {
                DataOperation::updateData('service', $updatedData, "service_id='$id'");
            }
        }
    }

    public function deleteServiceAction()
    {
        $id = $this->route_params['id'];
        DataOperation::deleteData('service', "service_id='$id'");
        header("location: ../view");
    }
}
