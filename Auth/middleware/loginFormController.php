<?php
include '../config/db_connect.php';

$invalid = "";

$username = $password = '';
$errors   = array('username' => '', 'email' => '', 'password' => '');

if (isset($_POST['submit'])) {

    // check email
    if (empty($_POST['username'])) {
        $errors['username'] = 'A username is required';

    } else {
        $username = $_POST['username'];
        if (!preg_match('/^[a-z]{5,12}$/i', $username)) {
            $errors['username'] = 'Username must contain 5-12 characters. No special characters allowed';
        }
    }

    // check password
    if (empty($_POST['password'])) {
        $errors['password'] = 'A password is required';
    } else {
        $password = $_POST['password'];
        if (!preg_match('/^[\w@-]{8,20}$/', $password)) {
            $errors['password'] = 'Password must be alphanumeric(@, _ and - are also allowed) and must be 8-20 characters';
        }
    }

    if (array_filter($errors)) {
        echo 'errors in form';
    } else {
        // escape sql chars
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // create sql
        $sql = "SELECT FROM users(username,password) WHERE username = '$username' AND password = '$hashedPassword'";

        $result  = $conn->query($sql);
        print_r($result);
        $numRows = mysqli_num_rows($result);
        // save to db and check
        if ($numRows == 1) {
            // success
            $_SESSION["username"] = $username;
            header('Location: ../ecommerce/mart.php');
        } else {
            $invalid = "Your credentials do not match any of our records";
            echo ($invalid);
        }

    }
} // end POST check
