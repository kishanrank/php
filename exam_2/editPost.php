<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Blog</title>
</head>
<?php
require_once 'validation.php';
checkSession('email');
?>
<body>
<?php
$id = $_GET['id'];
$category = fetchAllData('parent_category', '');
$blogData = fetchAllData('post', '');
while ($blog = mysqli_fetch_assoc($blogData)) : ?>
    <?php if ($blog['id'] == $id) : ?>
        <div class="main">
            <div class="header">
                <?php require 'header.php'; ?>
            </div>

            <div class="addBlog">
                <div>
                    <form action="editPost.php" method="POST">
                        <fieldset>
                            <legend>Edit Blog Post </legend>
                            <div class="get-id">
                                <input type="hidden" name="id" value="<?php echo $id; ?>" >
                            </div>
                            <div class="title">
                                <label>Title : </label>
                                <input type="text" name="blog[title]" value="<?php echo $blog['title']; ?>" />
                            </div>
                            <br>
                            <div>
                                <label>Content : </label>
                                <input type="text" name="blog[content]" value="<?php echo $blog['content']; ?>" />
                            </div>
                            <br>

                            <div>
                                <label>URL : </label>
                                <input type="text" name="blog[url]" value="<?php echo $blog['url']; ?>" />
                            </div>
                            <br>

                            <div>
                                <label>Published At : </label>
                                <input type="date" name="blog[published_at]" value="<?php echo $blog['published_at']; ?>" />
                            </div>
                            <br>
                            <div>
                                <label>Category : </label>
                                <?php $category = fetchAllData('parent_category', "") ?>
                                <?php $fetchCategory = explode(",", $blog['category']); ?>
                                <select name="blog[category][]" multiple>
                                    <?php while ($cat = mysqli_fetch_assoc($category)) : ?>
                                        <option value="<?php echo $cat['cat_name']; ?>" <?php if (in_array($cat['cat_name'], $fetchCategory)) {echo "selected";} ?>><?php echo $cat['cat_name']; ?><?php  ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <br>
                            <div>
                                <input type="submit" name="update_blog_btn" value="Update Category">
                            </div>
                            <br>
                        </fieldset>

                    </form>
                </div>
            </div>

        </div>
    <?php endif; ?>
<?php endwhile; ?>



</body>

</html>