<?php

namespace App\Controllers;
use PDO;
use \Core\View;
use App\Models\Post;

class Cms extends \Core\Controller
{
    public function manageCMSAction() {
        echo "CMS";
        //View::renderTemplate('Home/.html');
    }
}
