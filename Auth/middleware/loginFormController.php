<?php
    include('../../config/db_connect.php');

    $invalid = "";

    $email = $email = $password = '';
    $errors = array('username' => '', 'email' => '', 'password' => '');
    
    $query = "SELECT FROM users(status) WHERE username = 'Precious Solomon'";
    $feedback = $conn->query($query);

    $status = mysqli_fetch_all($feedback, MYSQLI_ASSOC);
    $statusArray = $status['status'];
    print_r($status);


    if (isset($_POST['submit'])) {
        

        // check email
        if (empty($_POST['username'])) {

            $errors['username'] = 'A username is required';
            
        } else {
            $email = $_POST['username'];
            if (!preg_match('/^[a-z]{5,12}$/i', $email)) {
                $errors['username'] = 'Username must contain 5-12 characters. No special chracters allowed';
            }
        }

         // check email
         if (empty($_POST['email'])) {
            $errors['email'] = 'An email is required';
        } else {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email must be a valid email address';
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
            //echo 'errors in form';
        } else {
            // escape sql chars
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // create sql
            $sql = "SELECT FROM adminauth(username,email,password) WHERE username = '$username', email = '$email' password = '$hashedPassword'";
            
            $query = "SELECT FROM adminauth(status) WHERE username = '$username', email = '$email' password = '$hashedPassword'";

            $feedback = $conn->query($query);

            $status = mysqli_fetch_all($feedback, MYSQLI_ASSOC);

            $statusArray = $status['status'];
            print_r($statusArray);
            $result = $conn -> query($sql);

            $numRows = mysqli_num_rows($result);
            // save to db and check
            if ($numRows == 1) {
                // success
                header('Location: ../index.php');
            } else {
                $invalid = "Your credentials do not match any of our records";
            }
            
        }
    } // end POST check

?>
