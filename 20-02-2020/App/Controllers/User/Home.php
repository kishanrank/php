<?php

namespace App\Controllers\User;
use \Core\View;
use \App\Models\DataOperation;

class Home extends \Core\Controller
{
    public function indexAction()
    {
        $categoryData = DataOperation::getAll('categories');
        $homeData = DataOperation::getById('cms_pages', "id='1'");
        $footer = DataOperation::getAll('cms_pages');
        View::renderTemplate('Display/home.html', ['homeData'=> $homeData, 'parentCat' => $categoryData, 'footer'=>$footer]);
    }

    public function viewAction()
    {
        $urlkey = $this->route_params['urlkey'];
        $categoryData = DataOperation::getAll('categories');
        $homeData = DataOperation::getById('cms_pages', "url_key='$urlkey'");
        $footer = DataOperation::getAll('cms_pages');
        View::renderTemplate('Display/home.html', ['homeData'=> $homeData, 'parentCat' => $categoryData, 'footer'=>$footer]);
    }
}
