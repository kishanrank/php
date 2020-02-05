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
        <div class="main_display">

            <div class="display_table">

                <?php
                $conn = mysqli_connect('localhost:3306', 'root', '', 'login_session');
                if (!$conn) {
                    echo "Connection Failure";
                }
                $disp_sql = "SELECT * FROM blog_post";

                $result = mysqli_query($conn, $disp_sql);
                ?>

                <table border="1px" id="displayTable">
                    <tr>
                        <td>ID</td>
                        <td>Category Name</td>
                        <td>Title</td>
                        <td>URL</td>
                        <td>Published Date</td>
                        <td colspan="2">Action</td>
                    </tr>

                    <?php while ($row = mysqli_fetch_assoc($result)) :  ?>

                        <tr>
                            <td>
                                <?php echo $row['id']; ?>
                            </td>
                            <td>
                                <?php echo $row['category']; ?>
                            </td>
                            <td>
                                <?php echo $row['title']; ?>
                            </td>
                            <td>
                                <?php echo $row['url']; ?>
                            </td>
                            <td>
                                <?php echo $row['published_at']; ?>
                            </td> 
                            <td>
                               <a href="editblog.php?id=<?php echo $row['id']; ?>">Edit</a>
                            </td>
                            <td>
                                <a href="deleteblog.php?id=<?php echo $row['id'] ?>">Delete</a>
                            </td>

                        </tr>
                    <?php endwhile; ?>
                </table>

            </div>

        </div>
    </div>

</body>

</html>