<?php

include "../config/db_connect.php";
$invalidImage = "";

$store_name = "";
$store_location = "";
$phone_number = "";
$email_address = "";
if (isset($_POST['createStore'])) {

    $target = "./store_images/";
    $uniqueId = uniqid() . '_' . time();
    $image = basename($_FILES['upload_image']['name']);
    $imageName = $uniqueId . $image;
    $temp_name = $_FILES['upload_image']['tmp_name'];
    $imagePath = $target . $uniqueId . $image;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["upload_image"]["tmp_name"]);


    $store_name = mysqli_real_escape_string($conn, $_POST['store_name']);

    $store_location = mysqli_real_escape_string($conn, $_POST['store_location']);

    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);

    $email_address = mysqli_real_escape_string($conn, $_POST['email_address']);

    if ($check !== false) {
        echo "Working";
        move_uploaded_file($_FILES['upload_image']['tmp_name'], $imagePath);
        $sql = "INSERT INTO stores(store_name,img_path,store_location,phone_number,email_address) VALUES('$store_name', '$imageName','$store_location', '$phone_number', '$email_address')";
        $conn->query($sql);
        header("Location: store.php");
    } else {
        $invalidImage = "This file type is not supported";
        $uploadOk = 0;
    }
}
