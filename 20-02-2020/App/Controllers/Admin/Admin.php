<?php

namespace App\Controllers\Admin;
use \Core\View;
use \App\Models\DataOperation;

class Admin extends \Core\Controller
{

    public function loginAction(){
        View::renderTemplate('Admin/login.html');   
    }
    
    public function validateLogin() {
        if (isset($_POST['user_login'])) {
            $u_name = $_POST['name'];
            $u_password = $_POST['password'];
            $posts = DataOperation::getRow($u_name, $u_password);
            if ($posts) {
                View::renderTemplate('Admin/dashboard.html');
            } else {
                throw new \Exception("Please enter a valid data.");
            }
        }
    }

    public function indexAction()
    {
        echo "Hello from index action in the Admin controller!";
        echo "<br>";
        echo "please go to 'Admin/login in url'";
    }
}
