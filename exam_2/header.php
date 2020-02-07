<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheet.css">
    <title>header File</title>
</head> 
<?php
require_once 'validation.php';

checkSession('email');

?>
<body>
    <div class="header">
        <div class="varify">
            <?php echo "Welcome, " . $_SESSION['email'] . "<br>";  ?>
        </div>
        <div class="nav">
            <ul>
                <li><a href="homePage.php">Home</a></li>
                <li><a href="addBlogPost.php">Add Blog Post</a></li>
                <li><a href="manageCategory.php">Manage category</a></li>
                <li><a href="myProfile.php">My profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</body>

</html>