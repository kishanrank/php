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
                <li><a href="addBlogPost.php">Add Blog Post</a></li>
                <li><a href="manageCategory.php">Manage category</a></li>
                <li><a href="addStudent.php">My profile</a></li>
                <li><a href="mainPage.php?logout='1'">Logout</a></li>

            </ul>

        </div>
    </div>

    <div class="addBlog">
            <div>
                <form action="addBlogPost.php" method="POST">
                    <fieldset>
                        <legend>Add New Blog Post </legend>

                        <div>
                            <label>Title : </label>
                            <input type="text" name="blogtitle">
                        </div>
                        <br>
                        <div>
                            <label>Content : </label>
                            <input type="text" name="blogcontent">
                        </div>
                        <br>

                        <div>
                            <label>URL : </label>
                            <input type="text" name="blogurl">
                        </div>
                        <br>

                        <div>
                            <label>Published At : </label>
                            <input type="date" name="blogpubdate">
                        </div>
                        <br>
                        <div>
                            <label>Category : </label>
                            <select name="pubCategory" multiple>
                                <option>Lifestyle </option>
                                <option>entertainment </option>
                                <option>Health </option>
                                <option>Education </option>
                                <option>Sports </option>
                            </select>
                        </div>
                        <br>

                        <div>
                            <label>Image: </label>
                            <input type="file" name="blogpic">
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
</body>

</html>

<?php 

if(isset($_POST['blogbtn'])){

$blogTitle = $_POST['blogtitle'];
$content = $_POST['blogcontent'];
$url = $_POST['blogurl'];
$pubDate = $_POST['blogpubdate'];
$pubCategory = $_POST['pubCategory'];

$conn = mysqli_connect('localhost:3306', 'root', '', 'login_session');  
if(!$conn) {
    echo "Connection Failure";
}

$add_query = "INSERT INTO blog_post (title, url, category, content, published_at) VALUES ('$blogTitle', '$content',
'$pubCategory', '$url', '$pubDate')";

if(mysqli_query($conn,$add_query)){
}else {
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('Error in inserting data to databse.');";
    echo "</script>";
    
}
}
?>