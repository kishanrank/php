<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\Post;
use \App\Controllers\Category;
use \App\Models\DataOperation;

class Product extends \Core\Controller
{


    public function manageProductAction()
    {
        $product = DataOperation::getAll('products');
        View::renderTemplate('Admin/manageProduct.html', ['products' => $product]);
    }
    public function addProductAction()
    {
        $prepareCatProId = [];
        $categoryResult = DataOperation::getAll('categories');
        View::renderTemplate('Admin/addProduct.html',  ['categories' => $categoryResult]);
        if (isset($_POST['add_product']) && isset($_POST['product'])) {
            $productDataArr = $this->prepareProductData('product');
            $productDataArr['created_at'] = date('Y/m/d h:i:s');
            $addResultId = DataOperation::addData('products', $productDataArr);
            $prepareCatProId['category_id'] = $_POST['product']['parent_category'];
            $prepareCatProId['product_id'] = $addResultId;
            DataOperation::addData('products_categories', $prepareCatProId);
        }
    }

    public function updateProductAction()
    {
        $id = $this->route_params['id'];
        $productResult = DataOperation::getById('products', "product_id ='$id'");
        $categoryResult = DataOperation::getAll('categories');
        View::renderTemplate('Admin/addProduct.html', ['edit' => 'edit', 'product' => $productResult, 'categories' => $categoryResult]);
        if (isset($_POST['add_product']) && isset($_POST['product'])) {
            $productDataArr = $this->prepareProductData('product');
            $productDataArr['updated_at'] = date('Y/m/d h:i:s');
            $prepareCatProId['category_id'] = $_POST['product']['parent_category'];
            $prepareCatProId['product_id'] = $id;
            DataOperation::updateData('products', $productDataArr, "product_id='$id'");
            DataOperation::updateData('products_categories', $prepareCatProId, "product_id='$id'");
        }
    }

    public function deleteProductAction()
    {
        $id = $this->route_params['id'];

        DataOperation::deleteData('products', "product_id='$id'");
    }

    public function addImage($img_name)
    {
        $image = $_FILES[$img_name]['name'];
        $file_tmp = $_FILES[$img_name]['tmp_name'];
        $product_data[$img_name] = $image;
        move_uploaded_file($file_tmp, "C:/xampp/htdocs/mvc_program/mvc_view_11/public/images/" . $image);
        return $product_data[$img_name];
    }

    public function prepareProductData($section)
    {
        $productData = [];
        foreach ($_POST[$section] as $fieldname => $fieldvalue) {
            switch ($fieldname) {
                case 'product_name':
                    $productData['product_name'] = $fieldvalue;
                    break;
                case 'sku':
                    $productData['sku'] = $fieldvalue;
                    break;
                case 'url_key':
                    $productData['url_key'] = $fieldvalue;
                    break;
                case 'status':
                    $productData['status'] = $fieldvalue;
                    break;
                case 'description':
                    $productData['description'] = $fieldvalue;
                    break;
                case 'short_description':
                    $productData['short_description'] = $fieldvalue;
                    break;
                case 'price':
                    $productData['price'] = $fieldvalue;
                    break;
                case 'stock':
                    $productData['stock'] = $fieldvalue;
                    break;
            }
        }
        $productData['image'] = $this->addImage('image');
        return $productData;
    }
}
