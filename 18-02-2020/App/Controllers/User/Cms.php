<?php

namespace App\Controllers\User;
use \Core\View;
use \App\Models\DataOperation;

    
class Cms extends \Core\Controller
{

    public function viewAction()
    {
        $urlKey = $this->route_params['urlkey'];
        $singleRecord = DataOperation::getById('cms_pages', "url_key ='$urlKey'");
        View::renderTemplate('Display/singleCms.html', ['singleData' => $singleRecord]);
    }
}
