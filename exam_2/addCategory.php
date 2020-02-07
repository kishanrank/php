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

checkSession('email');
?>

<body>

    <div class="main">
        <div class="header">
            <?php require 'header.php'; ?>
        </div>

        <div class="add-categoty">
            <form action="addCategory.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>Add New Blog Category </legend>
                    <div>
                        <label>Title : </label>
                        <input type="text" name="cat[title]">
                    </div>
                    <br>
                    <div>
                        <label>Content : </label>
                        <input type="text" name="cat[content]">
                    </div>
                    <br>

                    <div>
                        <label>URL : </label>
                        <input type="text" name="cat[url]">
                    </div>
                    <br>

                    <div>
                        <label>Meta Title : </label>
                        <input type="text" name="cat[meta_title]">
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
                        <input type="submit" name="categoryBtn">
                    </div>
                    <br>
                </fieldset>
            </form>
        </div>
    </div>
</body>

</html>