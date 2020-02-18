<?php

namespace App\Controllers\User;
use \Core\View;
use \App\Models\DataOperation;

    
class Product extends \Core\Controller
{

    public function viewAction()
    {
        $categoryData = DataOperation::getAll('categories');
        $footer = DataOperation::getAll('cms_pages');
        $urlKey = $this->route_params['urlkey'];
        $singleProdRecord = DataOperation::getById('products', "url_key ='$urlKey'");
        View::renderTemplate('Display/singleProduct.html', ['singleData' => $singleProdRecord, 'parentCat' => $categoryData, 'footer'=>$footer]);
    }
}
