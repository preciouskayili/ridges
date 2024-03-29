<?php
include '../config/db_connect.php';

$email = $username = $password = $re_pass = '';
$errors = array('username' => '', 'email' => '', 'password' => '', 're_pass' => '');

if (isset($_POST['signup'])) {

    // check username
    if (empty($_POST['username'])) {
        $errors['username'] = 'A username is required';
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        if (!preg_match('/^[a-z\s]{5,20}$/i', $username)) {
            $errors['username'] = 'Username must be 5-12 characters. No special characters and numbers allowed';
        }
    }

    // check email
    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required';
    } else {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Email must be a valid email address';
        }
    }

    // check password
    if (empty($_POST['password'])) {
        $errors['password'] = 'A password is required';
    } else {
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        if (!preg_match('/[a-z\w]{8,20}$/', $password)) {
            $errors['password'] = 'Password must be 8-20 characters';
        }
    }

// Check repeat password
    if (empty($_POST['re_pass'])) {
        $errors['re_pass'] = 'This field is required';
    } else {
        $re_pass = mysqli_real_escape_string($conn, $_POST['re_pass']);
        if (!preg_match('/^[\w@-]{8,20}$/', $re_pass)) {
            $errors['re_pass'] = 'Repeat password must be alphanumeric [8-20 characters]';
        }
    }

    if (array_filter($errors)) {
        //echo 'errors in form';
    } else {
        if ($password !== $re_pass) {
            $errors['re_pass'] = 'Passwords do not match';
        } else {
            $sql = "SELECT * FROM admin WHERE username='$username'";
            $usernameResult = $conn->query($sql);
            $numRows = mysqli_num_rows($usernameResult);

            if ($numRows >= 1) {
                $errors['username'] = 'Username already exists';
            } else {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // create sql
                $sql = "INSERT INTO admin(username,email,password) VALUES('$username','$email','$hashedPassword')";

                // save to db and check
                if (mysqli_query($conn, $sql)) {
                    // success
                    $_SESSION["username"] = $username;
                    header('Location: ../admin/dashboard.php');
                } else {
                    echo 'query error: ' . mysqli_error($conn);
                }
            }
        }
    }

} // end POST check
