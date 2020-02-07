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

        <div class="addBlog">
            <div>
                <form action="addBlogPost.php" method="POST">
                    <fieldset>
                        <legend>Add New Blog Post </legend>

                        <div>
                            <label>Title : </label>
                            <input type="text" name="blog[title]">
                        </div>
                        <br>
                        <div>
                            <label>Content : </label>
                            <input type="text" name="blog[content]">
                        </div>
                        <br>

                        <div>
                            <label>URL : </label>
                            <input type="text" name="blog[url]">
                        </div>
                        <br>

                        <div>
                            <label>Published At : </label>
                            <input type="date" name="blog[published_at]">
                        </div>
                        <br>
                        <div>
                            <label>Category : </label>
                            <?php $category = fetchAllData('parent_category', "") ?>
                            <select name="blog[category][]" multiple>
                            <?php while($cat = mysqli_fetch_assoc($category)): ?>
                                <option value="<?php echo $cat['cat_name']; ?>"><?php echo $cat['cat_name']; ?></option>
                            <?php endwhile; ?>
                            </select>
                        </div>
                        <br>

                        <div>
                            <input type="submit" name="blogbtn">
                        </div>
                        <br>
                    </fieldset>

                </form>
            </div>
        </div>

    </div>
</body>

</html>