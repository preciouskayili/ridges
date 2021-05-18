<?php
include '../config/db_connect.php';

$email  = $email  = $password  = '';
$errors = array('username' => '', 'email' => '', 'password' => '');

if (isset($_POST['submit'])) {

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
  if (!preg_match('/^[\w@-]{8,20}$/', $password)) {
   $errors['password'] = 'Password must be alphanumeric(@, _ and - are also allowed) and must be 8-20 characters';
  }
 }

 if (array_filter($errors)) {
  //echo 'errors in form';
 } else {

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // create sql
  $sql = "INSERT INTO users(username,email,password) VALUES('$username','$email','$hashedPassword')";

  // save to db and check
  if (mysqli_query($conn, $sql)) {
   // success
   $_SESSION["username"] = $username;
   header('Location: welcome.php');
  } else {
   echo 'query error: ' . mysqli_error($conn);
  }
 }
} // end POST check
