<?php

namespace App\Controllers\User;
use \Core\View;
use \App\Models\DataOperation;

    
class Product extends \Core\Controller
{

    public function viewAction()
    {
        $categoryData = DataOperation::getAll('categories');
        $cart_data = DataOperation::getFullColumn('product_id', 'cart_data');
        $footer = DataOperation::getAll('cms_pages');
        $urlKey = $this->route_params['urlkey'];
        $singleProdRecord = DataOperation::getById('products', "url_key ='$urlKey'");
        View::renderTemplate('Display/singleProduct.html',
         ['cart_data'=>$cart_data, 'singleData' => $singleProdRecord, 
         'parentCat' => $categoryData, 'footer'=>$footer]);
    }
}
