<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Category</title>
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
        <div class="add_cat_btn">

            <input type="button" onclick="location.href='addCategory.php';" value="Add Category" />
        </div>
        <div class="display-category">

            <table border="2">
                <tr>
                    <th>Category Id</th>
                    <th>Category Name</th>
                    <th>Created at</th>
                    <th colspan="2">Actions</th>
                </tr>
                <?php
                $sql = "SELECT * FROM category c INNER JOIN parent_category pc ON c.parent_cat_id = pc.parent_cat_id ORDER BY id";
                $result = mysqli_query($connection, $sql);
                while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['cat_name']; ?></td>
                            <td><?php echo $row['created_at'] ?></td>
                            <td><a href="editCategory.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                            <td><a href="deleteCategory.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>
                <?php endwhile; ?>
            </table>

        </div>




    </div>
</body>

</html>