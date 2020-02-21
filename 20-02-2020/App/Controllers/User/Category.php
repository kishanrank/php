<?php

namespace App\Controllers\User;
use \Core\View;
use \App\Models\DataOperation;

    
class Category extends \Core\Controller
{

    public function viewAction()
    {
        $categoryData = DataOperation::getAll('categories');
        $footer = DataOperation::getAll('cms_pages');
        $urlKey = $this->route_params['urlkey'];
        $singleCatRecord = DataOperation::getById('categories', "url_key ='$urlKey'");
        View::renderTemplate('Display/singleCategories.html', ['singleData' => $singleCatRecord,'parentCat' => $categoryData, 'footer'=>$footer]);
    }
}
