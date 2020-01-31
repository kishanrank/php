<!DOCTYPE html>

<head>
    <title>Registration page</title>
</head>

<body>
    <div id="main_container">
        <form action="setData.php" method="POST">
            <div id="div1">
                <fieldset>
                    <legend>Account Detail</legend>
                    <div id="prefix">
                        <?php $prefix = ["Mr", "Miss", "Mrs", "Dr"]; ?>
                        <select name="prefix">
                            <?php foreach ($prefix as  $prevalue) : ?>
                                <option value="<?php echo $prevalue; ?>">
                                    <?php echo $prevalue; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <br>
                    <div id="firstname">
                        <label>1. First name </label>
                        : <input type="text" name="fname" ?>
                    </div>
                    <br>
                    <div id="lastname">
                        <label>2. Last Name </label>
                        : <input type="text" name="lname">
                    </div>
                    <br>
                    <div id="dob">
                        <label>3. Date Of Birth </label>
                        : <input type="date" name="dob">
                    </div>
                    <br>
                    <div id="pnumber">
                        <label>4. Phone Number</label>
                        :<input type="number" name="pnumber" ?>
                    </div>
                    <br>
                    <div id="email">
                        <label>5. E-mail</label>
                        :<input type="email" name="email">
                    </div>
                    <br>
                    <div id="password">
                        <label>6. Password </label>
                        :<input type="password" name="password">
                    </div>
                    <br>
                    <div id="confirmPassword">
                        <label>7. Confirm Password </label>
                        :<input type="password" name="confirmPassword">
                    </div>
                    <br>
                </fieldset>
            </div>
            <div id="div2">
                <fieldset>
                    <legend>Address Information</legend>
                    <div id="address1">
                        <label>1. Address Line 1</label>
                        : <input type="text" name="address1">
                    </div>
                    <br>
                    <div id="address2">
                        <label>2. Address Line 2</label>
                        : <input type="text" name="address2">
                    </div>
                    <br>
                    <div id="company">
                        <label>3. Company</label>
                        : <input type="text" name="company">
                    </div>
                    <br>
                    <div id="city">
                        <label>4. City</label>
                        : <input type="text" name="city">
                    </div>
                    <br>
                    <div id="state">
                        <label>5. State</label>
                        : <input type="text" name="state">
                    </div>
                    <br>
                    <div id="country">
                        <label>6. Country </label>
                        <?php $country = ["india", "U.S.", "U.K.", "Nepal", "Bhutan", "Canada"] ?>
                        <select name="country">
                            <?php foreach ($country as $value) : ?>
                                <option value="<?php echo $value; ?>">
                                    <?php echo $value; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <br>
                    <div id="postcode">
                        <label>7. Postal Code</label>
                        <input type="number" name="postcode">
                    </div>
                    <br>
                </fieldset>
                <div id="partition">
                    <input type="checkbox" name="hide_data" id="hide_data" onclick="showData(this)"> Please check the box to explore other data.
                </div>
            </div>
            <br>
            <div id="div3" style="display: none">
                <fieldset>
                    <legend>Other Information</legend>
                    <div id="about">
                        <label>1. About Yourself </label>
                        : <textarea name="about" rows="6" cols="30"></textarea>
                    </div>
                    <br>
                    <div id="profile">
                        <label>2. Profile Image </label>
                        : <input type="file" name="profile">
                    </div>
                    <br>
                    <div id="resume">
                        <label>3. Upload Resume</label>
                        <input type="file" name="resume">
                    </div>
                    <br>
                    <div id="business_time">
                        <label>4. How long have you been in business?</label>
                        <?php $radio = array('UNDER 1 YEAR', '1-2 YEARS', '2-5 YEARS', '5-10 YEARS', 'OVER 10 YEARS');
                        foreach ($radio as $rvalue) : ?>
                            <input type="radio" name="radio" value="<?php echo $rvalue; ?>"> <?php echo $rvalue; ?>
                        <?php endforeach ?>
                    </div>
                    <br>
                    <div id="clients">
                        <label>5. Number of unique clients you see each week?</label>
                        <?php $clients = array('1-5', '6-10', '11-15', '15+') ?>
                        <select name="clients">
                            <?php foreach ($clients as $num_cli) : ?>
                                <option value="<?php echo $num_cli; ?>"><?php echo $num_cli; ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <br>
                    <div id="touch">
                        <label>6. How do you like us to get in touch with you? </label>
                        <?php $touch = array('Post', 'email', 'SMS', 'Phone');
                        foreach ($touch as $how_touch) : ?>
                            <input type="checkbox" name="chkbox[]" value="<?php echo $how_touch; ?>">
                            <?php echo $how_touch; ?>
                        <?php endforeach; ?>
                    </div>
                    <br>
                    <div id="hobbie">
                        <label>7. Hobbies</label>
                        <?php $hobbie = array('Listening to Music', 'Travelling', 'Blogging', 'Sports', 'Art') ?>
                        <select name="hobbies[]" multiple>
                            <?php foreach ($hobbie as $ur_hobbie) : ?>
                                <option value="<?php echo $ur_hobbie; ?>">
                                    <?php echo $ur_hobbie; ?>
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </fieldset>
            </div>
            <div id="button">
                <input type="submit" name="register" value="Register Here">
            </div>
        </form>
    </div>
    <script>
        function showData(hide_data) {
            var div3 = document.getElementById("div3");
            div3.style.display = hide_data.checked ? "block" : "none";
        }
    </script>
</body>

</html>