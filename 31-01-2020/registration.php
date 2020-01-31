<!DOCTYPE html>

<?php

$connection = mysqli_connect('localhost:3306', 'root', '', 'customer_portal');
if (!$connection) {
    echo "Connection Failed";
}

$sql = "SELECT C.cust_id, C.firstname , C.email, CA.address1, CA.city, HOBB.value hobbies FROM customers C LEFT JOIN customer_address CA ON C.cust_id = CA.addr_id LEFT JOIN customer_additional_info HOBB ON C.cust_id = HOBB.other_id and HOBB.fieldkey = 'hobbies'";

$result = mysqli_query($connection, $sql);

?>

<head>
    <title>Registration page</title>
</head>
<table border="1px">
    <tr>
        <th> ID </th>
        <th>First Name</th>
        <th>Email</th>
        <th>Address 1</th>
        <th>City</th>
        <th>Hobbies</th>
        <th colspan="2">Actions</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) :  ?>


        <tr>
            <td>
                <?php echo $row['cust_id']; ?>
            </td>
            <td>
                <?php echo $row['firstname']; ?>
            </td>
            <td>
                <?php echo $row['email']; ?>
            </td>
            <td>
                <?php echo $row['address1']; ?>
            </td>
            <td>
                <?php echo $row['city']; ?>
            </td>
            <td>
                <?php echo $row['hobbies']; ?>
            </td>
            <td>
                <a href="edit.php">Edit</a>
            </td>
            <td>
                <a href="delete.php?id=<?php echo  $row['cust_id']; ?>">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

<?php

require_once 'output.php';
require_once 'preparedData.php';
require_once 'databse.php';

?>
 
<body>

    <div id="main_container">
        <form action="registration.php" method="POST">
            <div id="div1">
                <fieldset>
                    <legend>Account Detail</legend>

                    <div id="prefix">
                        <?php $prefix = ["Mr", "Miss", "Mrs", "Dr"]; ?>
                        <select name="account[prefix]">
                            <?php foreach ($prefix as  $prevalue) : ?>
                                <?php $selected_val_1 = (output('account', 'prefix') == $prevalue) ? "selected" : '' ?>
                                <option value="<?php echo $prevalue; ?>" <?php echo $selected_val_1; ?>>
                                    <?php echo $prevalue; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>

                    </div>

                    <br>
                    <div id="firstname">
                        <label>1. First name </label>
                        : <input type="text" name="account[firstname]" value="<?php echo output('account', 'fname'); ?>">
                    </div>
                    <br>
                    <div id="lastname">
                        <label>2. Last Name </label>
                        : <input type="text" name="account[lastname]" value="<?php echo output('account', 'lname'); ?>">
                    </div>
                    <br>
                    <div id="dob">
                        <label>3. Date Of Birth </label>
                        : <input type="date" name="account[birthdate]" value="<?php echo output('account', 'dob'); ?>">
                    </div>
                    <br>
                    <div id="pnumber">
                        <label>4. Phone Number</label>
                        :<input type="number" name="account[pnumber]" value="<?php echo output('account', 'pnumber'); ?>">
                    </div>
                    <br>
                    <div id="email">
                        <label>5. E-mail</label>
                        :<input type="email" name="account[email]" value="<?php echo output('account', 'email'); ?>">
                    </div>
                    <br>
                    <div id="password">
                        <label>6. Password </label>
                        :<input type="password" name="account[password]" value="<?php echo output('account', 'password'); ?>">
                    </div>
                    <br>
                    <div id="confirmPassword">
                        <label>7. Confirm Password </label>
                        :<input type="password" name="account[confirm_password]" value="<?php echo output('account', 'confirmPassword'); ?>">
                    </div>
                    <br>
                </fieldset>


            </div>
            <div id="div2">
                <fieldset>
                    <legend>Address Information</legend>
                    <div id="address1">
                        <label>1. Address Line 1</label>
                        : <input type="text" name="address[address1]" value="<?php echo output('address', 'addr1'); ?>">
                    </div>
                    <br>
                    <div id="addr2">
                        <label>2. Address Line 2</label>
                        : <input type="text" name="address[address2]" value="<?php echo output('address', 'addr2'); ?>">
                    </div>
                    <br>
                    <div id="company">
                        <label>3. Company</label>
                        : <input type="text" name="address[company]" value="<?php echo output('address', 'company'); ?>">
                    </div>
                    <br>
                    <div id="city">
                        <label>4. City</label>
                        : <input type="text" name="address[city]" value="<?php echo output('address', 'city'); ?>">
                    </div>
                    <br>
                    <div id="state">
                        <label>5. State</label>
                        : <input type="text" name="address[state]" value="<?php echo output('address', 'state'); ?>">
                    </div>
                    <br>
                    <div id="country">
                        <label>6. Country </label>
                        <?php $country = ["india", "U.S.", "U.K.", "Nepal", "Bhutan", "Canada"] ?>

                        <select name="address[country]">

                            <?php foreach ($country as $value) : ?>
                                <?php $selected_val_2 = (output('address', 'country') == $value) ? "selected" : '' ?>
                                <option value="<?php echo $value; ?>" <?php echo $selected_val_2; ?>>
                                    <?php echo $value; ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>
                    <br>
                    <div id="postcode">
                        <label>7. Postal Code</label>
                        <input type="number" name="address[postcode]" value="<?php echo output('address', 'pincode'); ?>">
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
                        : <textarea name="other[about_yourself]" rows="6" cols="30"><?php echo output('other', 'about'); ?></textarea>
                    </div>
                    <br>
                    <div id="profile">
                        <label>2. Profile Image </label>
                        : <input type="file" name="other[profile]" value="<?php echo output('other', 'profile'); ?>">
                    </div>
                    <br>
                    <div id="resume">
                        <label>3. Upload Resume</label>
                        <input type="file" name="other[certificate]">
                    </div>
                    <br>
                    <div id="business_time">
                        <label>4. How long have you been in business?</label>
                        <?php $radio = array('UNDER 1 YEAR', '1-2 YEARS', '2-5 YEARS', '5-10 YEARS', 'OVER 10 YEARS');
                        foreach ($radio as $rvalue) : ?>
                            <?php $radio_val_1 = (output('other', 'radio') == $rvalue) ? "checked" : '' ?>
                            <input type="radio" name="other[time_in_business]" value="<?php echo $rvalue; ?>" <?php echo $radio_val_1; ?>> <?php echo $rvalue; ?>
                        <?php endforeach ?>
                    </div>
                    <br>
                    <div id="clients">
                        <label>5. Number of unique clients you see each week?</label>
                        <?php $clients = array('1-5', '6-10', '11-15', '15+') ?>
                        <select name="other[no_of_clients]">
                            <?php foreach ($clients as $num_cli) : ?>
                                <?php $selected_val_3 = (output('other', 'clients') == $num_cli) ? "selected" : '' ?>
                                <option value="<?php echo $num_cli; ?>" <?php echo $selected_val_3 ?>><?php echo $num_cli; ?> </option>
                            <?php endforeach ?>

                        </select>
                    </div>
                    <br>
                    <div id="touch">
                        <label>6. How do you like us to get in touch with you? </label>
                        <?php $touch = array('Post', 'email', 'SMS', 'Phone');
                        foreach ($touch as $how_touch) : ?>
                            <?php $checked_val_1 = array_intersect(output('other', 'chkbox', []), [$how_touch]) ? "checked" : "" ?>
                            <input type="checkbox" name="other[how_touch][]" value="<?php echo $how_touch; ?>" <?php echo $checked_val_1 ?>>
                            <?php echo $how_touch; ?>
                        <?php endforeach; ?>

                    </div>
                    <br>
                    <div id="hobbie">
                        <label>7. Hobbies</label>
                        <?php $hobbie = array('Listening to Music', 'Travelling', 'Blogging', 'Sports', 'Art') ?>
                        <select name="other[hobbies][]" multiple>
                            <?php foreach ($hobbie as $ur_hobbie) : ?>
                                <?php $selected_val_4 = array_intersect(output('other', 'hobbies'), [$ur_hobbie])  ? "selected" : '' ?>
                                <option value="<?php echo $ur_hobbie; ?>" <?php echo $selected_val_4; ?>>
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

<?php


?>