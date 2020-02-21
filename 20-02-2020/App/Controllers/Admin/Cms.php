<?php

namespace App\Controllers\Admin;

use \Core\View;
use \App\Models\DataOperation;

class Cms extends \Core\Controller
{
    public function manageCmsAction()
    {
        $cmsResult = DataOperation::getAll('cms_pages'); 
        View::renderTemplate('Admin/manageCMS.html', ['cmsData' => $cmsResult]);
    }

    public function addCmsAction()
    {
        View::renderTemplate('Admin/addCMS.html');
        if (isset($_POST['add_cms']) && isset($_POST['cms'])) {
            $cmsDataArr = $this->prepareCmsData('cms');
            $cmsDataArr['created_at'] = date('Y/m/d h:i:s');
            DataOperation::addData('cms_pages', $cmsDataArr);
        }
    }

    public function updateCmsAction()
    {
        $id = $this->route_params['id'];
        $singleCmsResult = DataOperation::getById('cms_pages', "id ='$id'");
        View::renderTemplate('Admin/addCMS.html', ['edit' => 'edit', 'cmsData'=> $singleCmsResult]);
        if (isset($_POST['add_cms']) && isset($_POST['cms'])) {
            $cmsDataArr = $this->prepareCmsData('cms');
            $cmsDataArr['updated_at'] = date('Y/m/d h:i:s');
            DataOperation::updateData('cms_pages', $cmsDataArr, "id='$id'");
        }
    }

    public function deleteCmsAction()
    {
        $id = $this->route_params['id'];
        DataOperation::deleteData('cms_pages', "id='$id'");
    }

    public function prepareCmsData($section)
    {
        $cmsData = [];
        foreach($_POST[$section] as $fieldname => $fieldvalue) {
            switch ($fieldname) {
                case 'page_title':
                    $cmsData['page_title'] = $fieldvalue;
                break;
                case 'url_key':
                    $cmsData['url_key'] = $fieldvalue;
                break;
                case 'status':
                    $cmsData['status'] = $fieldvalue;
                break;
                case 'content':
                    $cmsData['content'] = $fieldvalue;
                break;
            }
        }
        return $cmsData;
    }
}
