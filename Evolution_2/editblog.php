<?php

include 'postEditData.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit blog</title>
</head>

<body>
    <?php
    $conn = mysqli_connect('localhost', 'root', '', 'login_session') or die("Connection error.");

    $id = $_GET['id'];
    $category = mysqli_query($conn, "SELECT  * FROM category");
    $blogResult = mysqli_query($conn, "SELECT * FROM blog_post WHERE id='$id'");
    $blog = mysqli_fetch_assoc($blogResult);
    print_r($blog);
    ?>

    <form method="$_POST" action="editblog.php?id=<?= $blog['id']; ?>">
        <fieldset>
            <legend>Add New Blog Post </legend>

            <div>
                <label>Title : </label>
                <input type="text" name="title" value="<?php $blog['id'] ?>">
            </div>
            <br>
            <div>
                <label>Content : </label>
                <input type="text" name="content" value="<?php $blog['content'] ?>">
            </div>
            <br>

            <div>
                <label>URL : </label>
                <input type="text" name="url" value="<?php $blog['url'] ?>">
            </div>
            <br>

            <div>
                <label>Published At : </label>
                <input type="date" name="pubdate" value="<?php $blog['published_at'] ?>">
            </div>
            <br>
            <!-- <div>
            <label>Category : </label>
            <select name="pubCategory" multiple>
                <option>Lifestyle </option>
                <option>entertainment </option>
                <option>Health </option>
                <option>Education </option>
                <option>Sports </option>
            </select>
        </div> -->
            <br>
            <br>

            <div>
                <input type="submit" name="update">
            </div>
            <br>
        </fieldset>

</body>

</html>
<?php



?>