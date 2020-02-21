<?php

namespace App\Controllers\Admin;

use \Core\View;
use \App\Models\DataOperation;

class Category extends \Core\Controller
{
    public function manageCategoryAction()
    {
        $categoryResult = DataOperation::getAll('categories');
        View::renderTemplate('Admin/manageCategory.html', ['categories' => $categoryResult]);
    }

    public function addCategoryAction()
    {
        $categoryResult = DataOperation::getAll('categories');
        View::renderTemplate('Admin/addCategory.html', ['category' => $categoryResult]);
        if (isset($_POST['add_category']) && isset($_POST['category'])) {
            $categoryDataArr = $this->prepareCategoryData('category');
            $categoryDataArr['created_at'] = date('Y/m/d h:i:s');
            DataOperation::addData('categories', $categoryDataArr);
        }
    }

    public function updateCategoryAction()
    {
        $id = $this->route_params['id'];
        $singleCategoryResult = DataOperation::getById('categories', "category_id ='$id'");
        $allCategoryResult = DataOperation::getAll('categories');
        View::renderTemplate('Admin/addCategory.html', ['edit' => 'edit', 'categories' => $singleCategoryResult, 'category' => $allCategoryResult]);
        if (isset($_POST['add_category']) && isset($_POST['category'])) {
            $categoryDataArr = $this->prepareCategoryData('category');
            $categoryDataArr['updated_at'] = date('Y/m/d h:i:s');
            DataOperation::updateData('categories', $categoryDataArr, "category_id='$id'");
        }
    }

    public function deleteCategoryAction()
    {
        $id = $this->route_params['id'];
        $data = DataOperation::getAllById('products_categories', "category_id ='$id'");
        DataOperation::deleteData('categories', "category_id='$id'");
        foreach ($data as $values) {
            $id = $values['product_id'];
            DataOperation::deleteData('products', "product_id='$id'");
        }
    }

    public function addImage($img_name)
    {
        $image = $_FILES[$img_name]['name'];
        $file_tmp = $_FILES[$img_name]['tmp_name'];
        $product_data[$img_name] = $image;
        move_uploaded_file($file_tmp, "C:/xampp/htdocs/mvc_program/mvc_view_11/public/images/" . $image);
        return $product_data[$img_name];
    }

    public function prepareCategoryData($section)
    {
        $categoryData = [];
        foreach ($_POST[$section] as $fieldname => $fieldvalue) {
            switch ($fieldname) {
                case 'category_name':
                    $categoryData['category_name'] = $fieldvalue;
                    break;
                case 'url_key':
                    $categoryData['url_key'] = $fieldvalue;
                    break;
                case 'status':
                    $categoryData['status'] = $fieldvalue;
                    break;
                case 'description':
                    $categoryData['description'] = $fieldvalue;
                    break;
                case 'parent_category':
                    $categoryData['parent_category'] = $fieldvalue;
                    break;
                case 'url_key':
                    $categoryData['url_key'] = $fieldvalue;
                    break;
            }
        }
        $categoryData['image'] = $this->addImage('image');
        return $categoryData;
    }
}
