<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log-in Page</title>
</head>
<?php 
require_once 'validation.php';
require_once 'databse.php';
?>
<body>
    <h1>Log-in Here</h1>
    <div class="login-form">
        <form action="login.php" method="POST">
            <div class="email">
                <label>Email :</label>
                <input type="email" id="email" name="login[email]" value="" />
            </div>
            <div class="password">
                <label>Password :</label>
                <input type="password" id="password" name="login[password]" value="" />
            </div>
            <div class="login-submit">
                <input type="submit" id="login_button" name="login_button" value="Login" />
                <button><a href="register.php" style="text-decoration: none; color:black">Register Here</a></button>
            </div>



        </form>

    </div>
</body>

</html>