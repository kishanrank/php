<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You need to logged-in first to view to this page";
    header('location: login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Main page</title>
</head>

<body>
    <div class="main">
        <div class="varify">
            <?php if (isset($_SESSION['username'])) : ?>
                <h4>Welcome, <?php echo $_SESSION['username']; ?></h4>
            <?php endif; ?>
        </div>
        <div class="nav">
            <ul>
                <li><a href="mainPage.php">Home</a></li>
                <li><a href="addBlogPost.php">Add Blog Post</a></li>
                <li><a href="manageCategory.php">Manage category</a></li>
                <li><a href="myProfile.php">My profile</a></li>
                <li><a href="mainPage.php?logout='1'">Logout</a></li>

            </ul>

        </div>
    </div>

    <div class="addBlog" style="background-color: sandybrown">
        <div>
            <form action="addCategory.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>Add New Blog Category </legend>
                    <div>
                        <label>Title : </label>
                        <input type="text" name="categoryTitle">
                    </div>
                    <br>
                    <div>
                        <label>Content : </label>
                        <input type="text" name="categoryContent">
                    </div>
                    <br>

                    <div>
                        <label>URL : </label>
                        <input type="text" name="categoryUrl">
                    </div>
                    <br>

                    <div>
                        <label>Meta Title : </label>
                        <input type="text" name="metaTitle">
                    </div>
                    <br>

                    <div>
                        <label> Parent Category : </label>
                        <select name="parentCategory">
                            <option>Education</option>
                            <option>LifeStyle</option>
                            <option>Health</option>
                        </select>
                    </div>
                    <br>

                    <div>
                        <label>Image: </label>
                        <input type="file" name="image">
                    </div>
                    <br>

                    <div>
                        <input type="submit" name="categoryBtn">
                    </div>
                    <br>
                </fieldset>
            </form>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_POST['categoryBtn'])) {
    $title = $_POST['categoryTitle'];
    $content = $_POST['categoryContent'];
    $url = $_POST['categoryUrl'];
    $metaTitle = $_POST['metaTitle'];
    $created_at = date("Y/m/d");
    $image = $_FILES['image']['name'];
    // $imgContent = addslashes(file_get_contents($image));
    $target = "images/";
    $file_tmp =$_FILES['image']['tmp_name'];



    $conn = mysqli_connect('localhost:3306', 'root', '', 'login_session');
    if (!$conn) {
        echo "Connection Failure";
    }

    $add_query = "INSERT INTO category (title, meta_title, url, content, cat_image, created_at) VALUES ('$title', '$metaTitle', '$url', '$content', '$image', '$created_at')";

    mysqli_query($conn, $add_query);

    if (move_uploaded_file($file_tmp, "images/".$image)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
}




/*
if(isset($_POST['categoryBtn'])){

$categoryTitle = $_POST['categoryTitle'];
$categoryContent = $_POST['categoryContent'];
$categoryUrl = $_POST['categoryUrl'];
$metaTitle = $_POST['metaTitle'];
$parentCategory = $_POST['parentCategory'];

$conn = mysqli_connect('localhost:3306', 'root', '', 'login_session');  
if(!$conn) {
    echo "Connection Failure";
}

$add_query = "INSERT INTO category (title, meta_title,  url, content, published_at) VALUES ('$categoryTitle', '$metaTitle', '$categoryUrl', '$categoryContent')";

if(mysqli_query($conn,$add_query)){

    echo "Added Sucessfully";
}else {
    echo "Error";
    
}
}
*/
?>