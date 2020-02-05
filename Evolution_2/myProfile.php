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
    <div class="user-data">
        <?php

        $conn = mysqli_connect('localhost:3306', 'root', '', 'login_session');
        if (!$conn) {
            echo "Connection Failure";
        }
        $sql = "SELECT * FROM user_detail WHERE username='" . $_SESSION['username'] . "'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="table-profile-data">
            <table border="1px">
                <tr>
                    <td>Username : </td>
                    <td><?php echo $row['username']; ?></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><?php echo $row['phone_number']; ?></td>
                </tr>
                <tr>
                    <td>Information:</td>
                    <td><?php echo $row['information']; ?></td>
                </tr>
            </table>
            <div class="update-profile">
                <input type="button" onclick="location.href='editProfile.php';" value="Update Profile" />
            </div>
        </div>
    </div>

</body>

</html>