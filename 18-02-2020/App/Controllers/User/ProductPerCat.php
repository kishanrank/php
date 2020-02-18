<?php

namespace App\Controllers\User;
use \Core\View;
use \App\Models\DataOperation;


class ProductPerCat extends \Core\Controller
{

    public function viewAction()
    {
        $categoryData = DataOperation::getAll('categories');
        $footer = DataOperation::getAll('cms_pages');
        $id = $this->route_params['urlkey'];
        $productResult = DataOperation::getJoinProduct($id);
        View::renderTemplate('Display/ProductPerCat.html', ['productData' => $productResult, 'parentCat' => $categoryData, 'footer'=>$footer]);
    }
}
