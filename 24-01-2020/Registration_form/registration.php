<html>


<body>
    <form method="POST" action="registration.php">
        <div id="div1">
            <fieldset id="data1">
                <legend>Account Detail</legend>
                <table>
                    <tr>
                        <td><select id="prefix" name="prefix">
                                <option>Mr</option>
                                <option>Miss</option>
                                <option>Ms</option>
                                <option>Mrs</option>
                                <option>Dr</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>1. First name :</td>
                        <td> <input type="text" name="firstname" id="fname" value="<?php if (isset($_SESSION['firstname'])) {
                                                                                        echo $_SESSION['firstname'];
                                                                                    } ?>"> </td>
                    </tr>
                    <tr>
                        <td>2. Last name :</td>
                        <td> <input type="text" name="lastname" value="<?php if(isset($_SESSION['lastname'])) { echo $_SESSION['lastname']; } ?>"></td>
                    </tr>
                    <tr>
                        <td>3. Date of Birth :</td>
                        <td> <input type="date" name="dob" value="<?php if(isset($_SESSION['dob'])) { echo$_SESSION['dob']; } ?> "></td>
                    </tr>
                    <tr>
                        <td>4. Phone Number : </td>
                        <td><input type="number" name="pnumber" value="<?php if(isset($_SESSION['pnumber'])) { echo $_SESSION['pnumber']; } ?>"></td>
                    </tr>
                    <tr>
                        <td>5. Email :</td>
                        <td> <input type="email" name="email" value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; }  ?>"></td>
                    </tr>
                    <tr>
                        <td>6. Password :</td>
                        <td> <input type="password" name="password" value="<?php if(isset($_SESSION['password'])) { echo $_SESSION['password']; } ?>"></td>
                    </tr>
                    <tr>
                        <td>7. Confirm Password :</td>
                        <td> <input type="password" name="confirm_password"></td>
                    </tr>
                </table>
            </fieldset>
        </div>
        <div id="div2">
            <fieldset id="data2">
                <legend>Address Information</legend>
                <table>
                    <tr>
                        <td>1. Address Line 1 :</td>
                        <td> <input type="text" name="addr1" value="<?php if(isset($_SESSION['addr1'])) { echo $_SESSION['addr1']; } ?>"></td>
                    </tr>
                    <tr>
                        <td>2. Address Line 2 :</td>
                        <td> <input type="text" name="addr2" value="<?php if(isset($_SESSION['addr2'])) { echo $_SESSION['addr2']; } ?>"></td>
                    </tr>
                    <tr>
                        <td>3. Company :</td>
                        <td> <input type="text" name="company" value="<?php if(isset($_SESSION['company'])) { echo$_SESSION['company']; } ?>"></td>
                    </tr>
                    <tr>
                        <td>4. City :</td>
                        <td> <input type="text" name="city" value="<?php if(isset($_SESSION['city'])) ?>"></td>
                    </tr>
                    <tr>
                        <td>5. State :</td>
                        <td> <input type="text" name="state"></td>
                    </tr>
                    <tr>
                        <td>6. Country :</td>
                        <?php $country = ["india","U.S.","U.K.","Nepal","Bhutan","Canada"]?>
                        <td> <select name="country">
                            <?php foreach($country as $key => $value): ?>
                                <option value="<?php echo $value; ?>" ><?php echo $value; ?></option>
                            <?php endforeach ?>
                            </select></td>
                    </tr>
                    <tr>
                        <td> Postal code :</td>
                        <td> <input type="text" name="postcode"></td>
                    </tr>
                </table>
            </fieldset>
        </div>
        <div id="div3">
            <input type="checkbox" name="hide_data" id="hide_data" onclick="showData(this)"> Please check the box to explore other data.
        </div>
        <div id="div4" style="display: none">
            <fieldset id="data3">
                <legend>Other Information</legend>

                <table>
                    <tr>
                        <td>1. Describe Yourself :</td>
                        <td> <textarea rows="6" cols="30" name="textarea"></textarea></td>
                    </tr>
                    <tr>
                        <td>2. Profile Image :</td>
                        <td> <input type="file" name="profile"></td>
                    </tr>
                    <tr>
                        <td> Certificate Upload :</td>
                        <td> <input type="file" name="pdf"></td>
                    </tr>
                    <tr>
                        <td>4. How long have you been in business? </td>
                        <td><input type="radio" name="exp_time">UNDER 1 YEAR
                            <input type="radio" name="exp_time"> 1-2 YEARS
                            <input type="radio" name="exp_time"> 2-5 YEARS
                            <input type="radio" name="exp_time"> 5-10 YEARS
                            <input type="radio" name="exp_time"> OVER 10 YEARS </td>
                    </tr>

                    <tr>
                        <td> Number of unique clients you see each week? </td>
                        <td><select name="clients" required>
                                <option>Select Clints</option>
                                <option>1-5</option>
                                <option>6-10</option>
                                <option>11-15</option>
                                <option>15+</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td>6. How do you like us to get in touch with you? </td>
                        <td><input type="checkbox" name="touch[]" value="Post"> Post
                            <input type="checkbox" name="touch[]" value="Email"> Email
                            <input type="checkbox" name="touch[]" value="SMS"> SMS
                            <input type="checkbox" name="touch[]" value="Phone"> Phone </td>
                    </tr>
                    <tr>
                        <td>7. Hobbies :</td>
                        <td><select multiple name="hobbies[]">
                                <option>Listening to Music</option>
                                <option>Travelling</option>
                                <option>Blogging</option>
                                <option> Sports </option>
                                <option> Art </option>
                            </select></td>
                    </tr>
                </table>
            </fieldset>
        </div>
        <input type="submit" name="submit">
    </form>
    <script>
        function showData(hide_data) {
            var div4 = document.getElementById("div4");
            div4.style.display = hide_data.checked ? "block" : "none";
        }
    </script>
</body>

</html>

<?php

if (isset($_POST['submit'])) {

    foreach ($_POST as $key => $value) {
        $_SESSION['key'] = $_POST['key'];
    }

    $prefix = $_POST['prefix'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phonenumber = $_POST['pnumber'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $psw1 = $_POST['password'];
    $psw2 = $_POST['confirm_password'];
    $addr1 = $_POST['addr1'];
    $addr2 = $_POST['addr2'];
    $company = $_POST['company'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $postcode = $_POST['postcode'];
    $about = $_POST['textarea'];
    $time = $_POST['exp_time'];
    $touch = $_POST['touch'];
    $hobbies = $_POST['hobbies'];


    /*if ( isset( $_FILES['pdf'] ) ) {
        if ($_FILES['pdf']['type'] != "application/pdf") {
            echo "It must br pdf";
        }
    }*/
    echo $prefix;
    if (empty($firstname) && !preg_match("/^[a-zA-Z]*$/", $firstname)) {
        echo "Only letters and white space allowed in firstname" . '<br>';
    } else {
        echo $firstname . '<br>';
    }

    if (empty($lastname) && !preg_match("/^[a-zA-Z]*$/", $lastname)) {
        echo "Only letters and white space allowed lastname" . '<br>';
    } else {
        echo $lastname . '<br>';
    }

    if (empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid format and please re-enter valid email" . '<br>';
    } else {
        echo $email . '<br>';
    }

    if (empty($phonenumber) && !preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phonenumber)) {
        echo "Invalid Mobile Number!" . '<br>';
    } else {
        echo $phonenumber . '<br>';
    }

    if (empty($psw1)) {
        echo "Please enter a password." . '<br>';
    } else {
        echo $psw1 . '<br>';
    }

    if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $psw1)) {
        echo "Please enter a valid password with minimum 8 digit and with uppercase and lowercase." . '<br>';
        /* at least one lowercase char
        at least one uppercase char
        at least one digit
        at least one special sign of @#-_$%^&+=§!?*/
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $addr1)) {
        echo "Only letters and white space allowed in address field." . "<br>";
    } else {
        echo $addr1 . '<br>';
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $addr2)) {
        echo "Only letters and white space allowed in address field." . "<br>";
    } else {
        echo $addr2 . '<br>';
    }

    if (!empty($company)) {
        echo $company . '<br>';
    } else {
        echo "Enter a company name" . "<br>";
    }

    if (!empty($city)) {
        echo $city . '<br>';
    } else {
        echo "Enter a city name" . "<br>";
    }

    if (!empty($state)) {
        echo $state;
    } else {
        echo "enter a state name" . "<br>";
    }

    if (empty($country)) {
        echo "please select a country" . '<br>';
    } else {
        echo $country . '<br>';
    }

    if (empty($postcode) && strlen($postcode) != 6) {
        echo "please enter a valid postal code" . '<br>';
    } else {
        echo $postcode . '<br>';
    }

    if (empty($about) && strlen($about) <= 50) {
        echo "Your info should be atleast 50 character" . '<br>';
    } else {
        echo $about;
    }

    if (!empty($time)) {
        echo "In business From : " . $_POST['exp_time'] . '<br>';
    } else {
        echo "Please enter a time in business from" . "<br>";
    }


    if (!empty($clients)) {
        echo "Number of Clients : " . $clients . '<br>';
    } else {
        echo "Please enter a number of clients" . "<br>";
    }

    if (!empty($touch)) {
        echo "How to Connect : ";
        foreach ($_POST['touch'] as $touch1) {
            echo $touch1 . ", ";
        }
        echo '<br>';
    } else {
        echo "Please choose a media to connect to you" . "<br>";
    }

    if (!empty($hobbies)) {
        echo "Your Hobbies : ";
        foreach ($_POST['hobbies'] as $hobbies1) {
            echo $hobbies1 . ", ";
        }
        echo '<br>';
    } else {
        echo "Please enter your Hobbies" . "<br>";
    }
}


?>