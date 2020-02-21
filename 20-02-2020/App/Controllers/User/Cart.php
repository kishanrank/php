<?php

namespace App\Controllers\User;

use \Core\View;
use \App\Models\DataOperation;


class Cart extends \Core\Controller
{
    public function addCartDBAction()
    {
        $valid = false;
        $data = $_POST['data'];
        $productId = $data['product_id'];
        $productQuantity = $data['product_quantity'];
        $productPrice = $data['product_price'];
        $cartTableId = DataOperation::getFullColumn('product_id', 'cart_data');
        if (empty($cartTableId)) {
            $valid = true;
        }
        foreach ($cartTableId as $id) {
            if ($id['product_id'] === $productId) {
                $valid = false;
                break;
            } else {
                $valid = true;
            }
        }
        if ($valid == true) {
            DataOperation::addData('cart_data', $data);
            echo "product added to cart sucessfully!!";
        } elseif ($valid == false) {
            $dbQuantity = DataOperation::getColumn("product_quantity", "cart_data", "product_id='$productId'");
            $updatedData['product_quantity'] = $productQuantity + $dbQuantity['product_quantity'];
            $updatedData['total'] = $productPrice * $updatedData['product_quantity'];
            DataOperation::updateData("cart_data", $updatedData, "product_id='$productId'");
            echo "Total Quantity updated, Please check at cart.";
        }
    }

    public function displayCartAction()
    {
        $cartData = DataOperation::getAll('cart_data');
        echo json_encode($cartData);
    }

    public function clearCartAction()
    {
        DataOperation::deleteTable('cart_data');
        echo "Products removed from Sucessfully!!";
    }

    public function removeSingleProduct()
    {
        $product_id = $_POST['product_id'];
        DataOperation::deleteData("cart_data", "product_id='$product_id'");
        echo "Selected Product removed from cart!!";
    }
}
