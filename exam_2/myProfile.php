<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Home Page</title>
</head>
<?php
require_once 'validation.php';
checkSession('email');
?>

<body>
    <div class="profile_main">
        <div class="header">
            <?php require 'header.php'; ?>
        </div>
        <div class="table-profile-data">

            <?php
            $curr_user = $_SESSION['email'];
            $result = fetchAllData("user_detail", "");
            while ($row = mysqli_fetch_assoc($result)) :
            ?>
                <?php if ($row['email'] == $curr_user) : ?>
                    <table border="1px">
                        <tr>
                            <td>First Name : </td>
                            <td><?php echo $row['firstname']; ?></td>
                        </tr>
                        <tr>
                            <td>Last Name : </td>
                            <td><?php echo $row['lastname']; ?></td>
                        </tr>
                        <tr>
                            <td>Email : </td>
                            <td><?php echo $row['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone Number</td>
                            <td><?php echo $row['mobile_number']; ?></td>
                        </tr>
                        <tr>
                            <td>Information:</td>
                            <td><?php echo $row['information']; ?></td>
                        </tr>
                    </table>
                <?php endif; ?>
            <?php endwhile; ?>


            <div class="user-profile">
                <?php  ?>

            </div>

        </div>
</body>

</html>