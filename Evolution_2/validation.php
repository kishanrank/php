<?php
session_start();

if (isset($_POST['register'])) {

    $conn = mysqli_connect('localhost:3306', 'root', '', 'login_session');
    if (!$conn) {
        echo "Connection with database is failed!!";
    } else {
        echo "Connection sucessfull!!" . "<br>";
    }
    $errors = [];

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $prefix = $_POST['prefix'];
    $info = $_POST['information'];

    if (!empty($username) && !empty($email) && !empty($phone_number) && !empty($password)) {

        if ($password != $confirm_password) {
            echo  "Both Password must be same.";
        }
        $check_user_query = "SELECT * FROM user_detail where username = $username";

        $result = mysqli_query($conn, $check_user_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            if ($user['username'] === $username) {
                echo  "User already exist with this name, please use another username";
            }
        }
        $password = md5($password);
        $add_query = "INSERT INTO user_detail (prefix, username, email, phone_number, password, information) VALUES ('$prefix','$username', '$email', '$phone_number', '$password', '$info')";

        echo $add_query;
        mysqli_query($conn, $add_query);
        $_SESSION['username'] = $username;
        $_SESSION['sucess'] = "You are now logged-in!!";
        header("Location: mainPage.php");
    }
    else {
        echo "Please enter a valid data";
    }
}


//////////////////

if (isset($_POST['login'])) {

    $conn = mysqli_connect('localhost:3306', 'root', '', 'login_session');

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username)) {
        echo "Please enter a username";
    }
    if (empty($password)) {
        echo "Please enter a password";
    }
    $password = md5($password);

    $query = "SELECT * FROM user_detail WHERE username='$username' AND password='$password'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        echo $row['username'];
        $_SESSION['username'] = $username;
        $_SESSION['sucess'] = "Logged in sucess!!";
        header("location: mainPage.php");
    } else {
        echo "Wrong username and password";
    }
}
