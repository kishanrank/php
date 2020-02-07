<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>

</head>
<?php require 'validation.php'; ?>
<body>

    <h1>Registration form</h1>

    <div class="form_reg">
        <form method="POST" action="register.php">
            <div class="form_data">
                
                <div class="firstname" >
                    <label>First Name :</label>
                    <input type="text" id="firstname" name="account[firstname]" value="" />
                </div>

                <div class="lastname" >
                    <label>Last Name :</label>
                    <input type="text" id="lastname" name="account[lastname]" value="" />
                </div>
                <div class="email" >
                    <label>Email :</label>
                    <input type="email" id="email" name="account[email]" value="" />
                </div>

                <div class="mobilenumber" >
                    <label> Mobile Number :</label>
                    <input type="text" id="mobile_number" name="account[mobile_number]" value="" />
                </div>

                <div class="password" >
                    <label> Password :</label>
                    <input type="password" id="password" name="account[password]" value="" />
                </div>

                <div class="confirm_password" >
                    <label>Confirm Password :</label>
                    <input type="password" id="confirm_password" name="account[confirm_password]" value="" />
                </div>

                <div class="Information" >
                    <label>information  :</label>
                    <input type="text" id="infromation" name="account[information]" value="" />
                </div>

                <div class="submit">
                    <input type="submit" id="submit_button" name="register_button" value="Register" />
                    <button><a href="login.php" style="text-decoration: none; color:black"> Log-in </a></button>
                </div>

            </div>
        </form>
    </div>

</body>

</html>