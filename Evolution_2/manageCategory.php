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
    <title>display Blog</title>
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
    <div>
        <div class="blog_category" style="background-color: sandybrown">
            <h2>Blog category</h2>

            <div class="add_cat_btn">

                <input type="button" onclick="location.href='addCategory.php';" value="Add Category" />

            </div>
            <div class="disp_category">
                <?php
                $conn = mysqli_connect('localhost:3306', 'root', '', 'login_session');
                if (!$conn) {
                    echo "Connection Failure";
                }
                $disp_sql = "SELECT * FROM category";

                $result = mysqli_query($conn, $disp_sql);
                ?>


                <table border="1px" id="displayTable">
                    <tr>
                        <td>Category ID</td>
                        <td>Category Image</td>
                        <td> Category Name</td>
                        <td>Created Date</td>
                        <td colspan="2">Action</td>
                    </tr>

                    <?php while ($row = mysqli_fetch_assoc($result)) :  ?>

                        <tr>
                            <td>
                                <?php echo $row['id']; ?>
                            </td>
                            <td >
                                <?php $row['cat_image']; ?>
                                <img src="images/<?php echo $row['cat_image']; ?>" width="50px" height="50px">
                            
                             <!-- echo "<img src='data:image/jpeg;base64,' .base64_encode($row['cat_image']). >" -->
                            </td>
                            <td>
                                <?php echo $row['title']; ?>
                            </td>                            
                            <td>
                                <?php echo $row['created_at']; ?>
                            </td>
                            <td>
                                <a href="editCategory.php?id=<?php echo $row['id']; ?>">Edit</a>
                            </td>
                            <td>
                                <a href="deleteCategory.php?id=<?php echo $row['id']; ?>">Delete</a>
                            </td>

                        </tr>
                    <?php endwhile; ?>
                </table>

            </div>

        </div>
    </div>

</body>

</html>