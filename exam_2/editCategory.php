<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
</head>
<?php
require_once 'validation.php';
checkSession('email'); ?>

<body>
    <?php
    $id = $_GET['id'];
    $cat_result = fetchAllData('category', '');
    while ($category = mysqli_fetch_assoc($cat_result)) : ?>
        <?php if ($category['id'] == $id) : ?>
            <div class="main">
                <div class="header">
                    <?php require 'header.php'; ?>
                </div>
                <div class="add-categoty">
                    <form action="addCategory.php" method="POST" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Edit Category</legend>
                            <div class="get-id">
                                <input type="hidden" name="id" value="<?php echo $id; ?>" >
                            </div>
                            
                            <div>
                                <label>Title : </label>
                                <input type="text" name="cat[title]" value="<?php echo $category['title']; ?>">
                            </div>
                            <br>
                            <div>
                                <label>Content : </label>
                                <input type="text" name="cat[content]" value="<?php echo $category['content']; ?>">
                            </div>
                            <br>

                            <div>
                                <label>URL : </label>
                                <input type="text" name="cat[url]" value="<?php echo $category['url']; ?>">
                            </div>
                            <br>

                            <div>
                                <label>Meta Title : </label>
                                <input type="text" name="cat[meta_title]" value="<?php echo $category['meta_title']; ?>">
                            </div>

                            <br>
                            <div>
                                <label> Parent Category : </label>
                                <select name="cat[parent_cat_id]">
                                    <option value="0">Select Category</option>
                                    <?php $category = fetchAllData('parent_category', "") ?>
                                    <?php while ($result = mysqli_fetch_assoc($category)) : ?>
                                        <option value="<?php echo $result['parent_cat_id']; ?>"><?php echo $result['cat_name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <br>

                            <div>
                                <label>Image: </label>
                                <input type="file" name="cat['image']">
                            </div>
                            <br>
                            <div>
                                <input type="submit" name="edit_category_btn" value="Upadate Category">
                            </div>
                            <br>
                        </fieldset>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    <?php endwhile; ?>

</body>

</html>