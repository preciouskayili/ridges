<?php

include "../config/db_connect.php";

$errors = array("title" => "", "items" => "", "price" => "", "description" => "", "category" => "", "unit" => "");
$invalidImage = "";
$formErrors = "";

$title = "";
$items = "";
$price = "";
$description = "";
if (isset($_POST['submit'])) {

    $target = "../image/";
    $uniqueId = uniqid() . '_' . time();
    $image = basename($_FILES['upload']['name']);
    $imageName = $uniqueId . $image;
    $temp_name = $_FILES['upload']['tmp_name'];
    $imagePath = $target . $uniqueId . $image;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["upload"]["tmp_name"]);

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $items = mysqli_real_escape_string($conn, $_POST['items']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $unit = mysqli_real_escape_string($conn, $_POST['unit']);

    if ($check !== false) {
        if (array_filter($errors)) {
            $formErrors = "There are errors in the form";
        } else {
            move_uploaded_file($_FILES['upload']['tmp_name'], $imagePath);
            $sql = "INSERT INTO products(title,description,img_path,category,price,unit,number_of_items,store) VALUES('$title', '$description','$imageName', '$category', '$price', '$unit', '$items', 'Precious')";
            $conn->query($sql);
            header("Location: mart.php");
        }
    } else {
        $invalidImage = "This image format is not supported";
        $uploadOk = 0;
    }
}
