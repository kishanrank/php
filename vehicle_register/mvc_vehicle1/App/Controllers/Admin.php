<?php

namespace App\Controllers;

//require "../Core/Controller.php";

use App\Models\DataOperation;
use \Core\View;
// use \Core\Controller;
// use App\Models\Post;

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

    }
}
