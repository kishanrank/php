<?php include('validation.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log-in page</title>

    <style>
        .main_container {
            margin-left: 400px;
        }

        .data_container {
            margin-left: 50px;
        }

        #heading {
            margin-left: 90px;
        }
    </style>
</head>

<body>
    
    <div class="main_container">
        <h1 id="heading">Log-in Form</h1>
        <form action="login.php" method="POST">
            <fieldset style="width:400px"><br>
                <div class="data_container">
                    <div class="email">
                        <label>Username : </label>
                        <input type="text" name="username">
                    </div>
                    <br>
                    <div class="password">
                        <label>Password : </label>
                        <input type="password" name="password">
                    </div>
                    <br>
                    <div class="loginBtn">
                        <input type="submit" name="login" value="Login">
                    </div>
                    <br>
                    <div class="register_link">
                        <label>New user?</label>
                        <a href="registration.php"><b>Register here</b></a>
                    </div>
                    <br>
                </div>
            </fieldset>
        </form>
    </div>

</body>

</html>