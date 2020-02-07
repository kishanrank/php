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

        <div>
            <?php require 'header.php'; ?>
        </div>
        <div class="disp-blog">

            <table border="2">
                <tr>
                    <th>Post Id</th>
                    <th>Category Name</th>
                    <th>Title</th>
                    <th>Published Date</th>
                    <th colspan="2">Actions</th>
                </tr>
                <?php
                $email1 = $_SESSION['email'];
                $uid = getUserid("email = '$email1'");
                $_SESSION['u_id'] = $uid;
                $result = fetchAllData('post', "");
                while($row = mysqli_fetch_assoc($result)) : ?>
                    <?php if ($row['user_id'] == $_SESSION['u_id']): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['category']; ?></td>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['published_at']; ?></td>
                            <td><a href="editPost.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                            <td><a href="deletePost.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>
                    <?php endif; ?>
                    <?php endwhile; ?>              
            </table>
        </div>

    </div>
</body>

</html>