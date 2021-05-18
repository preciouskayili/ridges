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

    if (empty($_POST['title'])) {
        $errors["title"] = "<i class=\"fa fa-info-circle\"></i> Title cannot be empty";
    } else {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
    }
    if (empty($_POST['items'])) {
        $errors["items"] = "<i class=\"fa fa-info-circle\"></i> Items cannot be empty";
    } else {
        $items = mysqli_real_escape_string($conn, $_POST['items']);
    }
    if (empty($_POST['price'])) {
        $errors["price"] = "<i class=\"fa fa-info-circle\"></i> Price cannot be empty";
    } else {
        $price = mysqli_real_escape_string($conn, $_POST['price']);
    }
    if (empty($_POST['description'])) {
        $errors["description"] = "<i class=\"fa fa-info-circle\"></i> Description cannot be empty";
    } else {
        $description = mysqli_real_escape_string($conn, $_POST['description']);
    }
    if (empty($_POST['category'])) {
        $errors["category"] = "<i class=\"fa fa-info-circle\"></i> Category cannot be empty";
    } else {
        $category = mysqli_real_escape_string($conn, $_POST['category']);
    }
    if (empty($_POST['unit'])) {
        $errors["unit"] = "<i class=\"fa fa-info-circle\"></i> Unit cannot be empty";
    } else {
        $unit = mysqli_real_escape_string($conn, $_POST['unit']);
    }

    if ($check !== false) {
        if (array_filter($errors)) {
            $formErrors = "
                <div class=\"z-depth-1 alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    Holy guacamole! You should check the form fields below, there might be empty ones.
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                ";
        } else {
            move_uploaded_file($_FILES['upload']['tmp_name'], $imagePath);
            $sql = "INSERT INTO products(title,description,img_path,category,price,unit,number_of_items,store) VALUES('$title', '$description','$imageName', '$category', '$price', '$unit', '$items', 'Precious')";
            $conn->query($sql);
            header("Location: mart.php");
        }
    } else {
        $invalidImage = "
                <div class=\"z-depth-1 alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    Holy guacamole! You should check the image field below.
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>
                ";
        $uploadOk = 0;
    }
}
