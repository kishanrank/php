<?php
session_start();
require_once 'databse.php';
require_once 'connection.php';
checkSession('email');
function validateForm($fieldname, $fieldvalue)
{
    switch ($fieldname) {
        case 'firstname':
            return (!preg_match('/^[a-zA-Z]*$/', $fieldvalue)) ? 0 : 1;
            break;
        case 'lastname':
            return (!preg_match('/^[a-zA-Z]*$/', $fieldvalue)) ? 0 : 1;
            break;
        case 'email':
            return (!filter_var($fieldvalue, FILTER_VALIDATE_EMAIL)) ? 0 : 1;
            break;
        case 'mobile_number':
            return (!preg_match('/[0-9]/', $fieldvalue) || strlen($fieldvalue) != 10) ? 0 : 1;
            break;
        case 'password':
            return ($fieldvalue == '') ? 0 : 1;
            break;
        case 'title':
            return ($fieldvalue == '') ? 0 : 1;
            break;
        case 'content':
            return ($fieldvalue == '') ? 0 : 1;
            break;
        case 'url':
            return ($fieldvalue == '') ? 0 : 1;
            break;
        case 'meta_title':
            return ($fieldvalue == '') ? 0 : 1;
            break;
        default:
            return 1;
    }
}

$errList = [];
function sectionToValidate($section)
{
    global $errList;
    $valid = false;
    $fieldNames = [];
    $fieldValues = [];
    //print_r($_POST['account']);
    foreach ($_POST[$section] as $key => $value) {
        if (!empty($value)) {
            if (validateForm($key, $value) == 0) {
                echo "Enter valid $key <br>";
                array_push($errList, $key);
                $valid = false;
                break;
            } else {
                $valid = true;
            }
        } else {
            echo "please fill $key" . "<br>";
        }

        if ($key != 'confirm_password') {
            array_push($fieldNames, $key);
            array_push($fieldValues, $value);
        }
    }
    return $valid;
}

//// prepare account data /////
function accountData($section)
{
    $prepareAccountData = [];
    foreach ($_POST[$section] as $fieldname => $fieldvalue) {
        switch ($fieldname) {
                // case 'prefix':
                //     $prepareAccountData['prefix'] = $fieldvalue;
                //     break;
            case 'firstname':
                $prepareAccountData['firstname'] = $fieldvalue;
                break;
            case 'lastname':
                $prepareAccountData['lastname'] = $fieldvalue;
                break;
            case 'email':
                $prepareAccountData['email'] = $fieldvalue;
                break;
            case 'mobile_number':
                $prepareAccountData['mobile_number'] = $fieldvalue;
                break;
            case 'password':
                $prepareAccountData['password'] = $fieldvalue;
                break;
            case 'information':
                $prepareAccountData['information'] = $fieldvalue;
                break;
        }
    }
    return $prepareAccountData;
}

/// prepare category data /////
function categoryData($section)
{
    $cur_date = date("Y/m/d");
    $prepareCategoryData = [];
    $prepareCategoryData['created_at'] = $cur_date;
    foreach ($_POST[$section] as $fieldname => $fieldvalue) {
        switch ($fieldname) {
            case 'title':
                $prepareCategoryData['title'] = $fieldvalue;
                break;
            case 'meta_title':
                $prepareCategoryData['meta_title'] = $fieldvalue;
                break;
            case 'url':
                $prepareCategoryData['url'] = $fieldvalue;
                break;
            case 'meta_title':
                $prepareCategoryData['meta_title'] = $fieldvalue;
                break;
            case 'content':
                $prepareCategoryData['content'] = $fieldvalue;
                break;
            case 'parent_cat_id':
                $prepareCategoryData['parent_cat_id'] = $fieldvalue;
        }
    }
    return $prepareCategoryData;
}

//// prepare blod data ////
function blogData($section)
{

    $email1 = $_SESSION['email'];
    $uid = getUserid("email = '$email1'");
    $_SESSION['u_id'] = $uid;

    $prepareBlogData = [];
    $prepareBlogData['user_id'] = $_SESSION['u_id'];

    foreach ($_POST[$section] as $fieldname => $fieldvalue) {
        switch ($fieldname) {
            case 'title':
                $prepareBlogData['title'] = $fieldvalue;
                break;
            case 'content':
                $prepareBlogData['content'] = $fieldvalue;
                break;
            case 'url':
                $prepareBlogData['url'] = $fieldvalue;
                break;
            case 'published_at':
                $prepareBlogData['published_at'] = $fieldvalue;
                break;
            case 'category':
                $cat = implode(",", $_POST['blog']['category']);
                $prepareBlogData['category'] = $cat;
                break;
        }
    }
    return $prepareBlogData;
}

function validateUrl($section, $table)
{
    $chkurl = false;
    $url = $_POST[$section]['url'];
    $result = fetchAllData($table);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($url == $row['url']) {
            echo "This url is already in use.";
            $chkurl = false;
            break;
        } else {
            $chkurl = true;
        }
    }
    return $chkurl;
}

/// check session //////
function checkSession($sessionName)
{
    if (empty($_SESSION[$sessionName])) {
        header("location: login.php");
    }
}

//// destroy sesssion ////
function destroySession($sessionName)
{
    session_destroy();
    unset($_SESSION['$sessionName']);
    header('location: login.php');
}


///////  for  Register data ////////// 
if (isset($_POST['register_button'])  && isset($_POST['account'])) {
    $isvalid = sectionToValidate('account');
    $email = $_POST['account']['email'];
    $valid_email = false;
    if ($isvalid) {
        $getData = fetchAllData("user_detail");
        while ($result = mysqli_fetch_assoc($getData)) {
            if ($email == $result['email']) {
                echo "This email is already in use please use another email-id.";
                $valid_email = false;
                break;
            } else {
                $valid_email = true;
            }
        }
        if ($valid_email) {
            $add_new_user = accountData('account');
            insertUserData('user_detail', $add_new_user);
            $_SESSION['email'] = $email;
            header("Location: homePage.php");
        }
    }
}

////// for Login data  ///////////
$flag = false;
if (isset($_POST['login_button']) && isset($_POST['login'])) {
    $idvalid = sectionToValidate('login');
    $email = $_POST['login']['email'];
    $password =  $_POST['login']['password'];
    if ($idvalid) {
        $result = fetchAllData("user_detail");
        while ($row = mysqli_fetch_assoc($result)) {
            if ($email == $row['email'] && $password == $row['password']) {
                $_SESSION['email'] = $email;
                header("Location: homePage.php");
                $flag = true;
            } else {
                $flag = false;
            }
        }
    }
}

////////  add category data   //////////// 
if (isset($_POST['categoryBtn']) && isset($_POST['cat'])) {
    $url_val = validateUrl('cat', 'category');

    if ($url_val == true) {
        $categoryArr = categoryData('cat');
        insertUserData('category', $categoryArr);
        echo "<script>alert('Category Created Successfully')</script>";
    }
}

////  edit category ////
if (isset($_POST['edit_category_btn']) && isset($_POST['cat'])) {
    $url_val = validateUrl('cat', 'category');
    if ($url_val == true) {
        $update_cat_data = categoryData('cat');
        $id = $_POST['id'];
        updateRecord("category", $update_cat_data, "id = '$id' ");
    }
}

// ///// add blog post  /////
if (isset($_POST['blogbtn']) && isset($_POST['blog'])) {
    $url_val = validateUrl('blog', 'post');
    if ($url_val == true) {
        $blogData = blogData('blog');
        insertUserData('post', $blogData);
    }
}

// edit blog post //////
if (isset($_POST['update_blog_btn']) && isset($_POST['blog'])) {
    $url_val = validateUrl('blog', 'post');
    if ($url_val == true) {
        $upadtedData = blogData('blog');
        $id = $_POST['id'];
        updateRecord("post", $upadtedData, "id = '$id' ");
    }
}
