<?php include('validation.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration page</title>

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
        <h1 id="heading">Registration Form</h1>
        <form action="registration.php" method="POST">
            <fieldset style="width:400px"><br>

                <div class="data_container">

                <div class="data_container">
                    <div class="prefix">
                        <label>Prefix : </label>
                        <?php $prefix = ["Mr", "Miss", "Mrs", "Dr"]; ?>
                        <select name="prefix">
                        <?php foreach($prefix as  $prevalue) : ?>
                            <option>
                            <?php echo $prevalue; ?>
                            </option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <br>

                    <div class="username">
                        <label>Username : </label>
                        <input type="text" name="username">
                    </div>
                    <br>

                    <div class="email">
                        <label>Email : </label>
                        <input type="email" name="email">
                    </div>
                    <br>

                    <div class="phoneNumber">
                        <label>Phone Number : </label>
                        <input type="number" name="phone_number">
                    </div>
                    <br>

                    <div class="password">
                        <label>Password : </label>
                        <input type="password" name="password">
                    </div>
                    <br>

                    <div class="confirmPassword">
                        <label>Confirm Password : </label>
                        <input type="password" name="confirm_password">
                    </div>
                    <br>
                    <div class="infromation">
                    <label>infromation : </label>
                    <textarea name="information" cols="30" rows="6"></textarea>
                    </div>

                    <div class="registerBtn">
                        <input type="submit" name="register" value="Register">
                    </div>
                    <br>


                    <div class="login_link">
                        <label>Already a user?</label>
                        <a href="login.php"><b>Login here</b></a>
                    </div>
                    <br>

                </div>
            </fieldset>
        </form>
    </div>

</body>

</html>