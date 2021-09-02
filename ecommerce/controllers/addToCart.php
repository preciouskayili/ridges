<?php
session_start();
include "../../config/db_connect.php";

if (isset($_GET["id"])) {
        if(isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
        $productInfo = array(
            "id" => mysqli_real_escape_string($conn, $_GET["id"]), 
            "img_path" => mysqli_real_escape_string($conn, $_GET["img_path"]), 
            "title" => mysqli_real_escape_string($conn, $_GET["title"]), 
            "category" => mysqli_real_escape_string($conn, $_GET["category"]), 
            "price" => mysqli_real_escape_string($conn, $_GET["price"]), 
            "unit" => mysqli_real_escape_string($conn, $_GET["unit"]), 
            "number_of_items" => mysqli_real_escape_string($conn, $_GET["number_of_items"])
        );

        $product_id = $productInfo["id"];
        $img_path = $productInfo["img_path"];
        $title = $productInfo["title"];
        $category = $productInfo["category"];
        $price = $productInfo["price"];
        $unit = $productInfo["unit"];
        $number_of_items = $productInfo["number_of_items"];

        $sql0 = "SELECT * FROM cart WHERE username='$username' AND product_id='$product_id'";
        $result = $conn->query($sql0);
        $numRows = mysqli_num_rows($result);

        if($numRows >= 1) {
            $_SESSION["cart_failed"] = "Item already exists in cart";
            header('Location: ../mart.php');
        } else {
            $sql = "INSERT INTO cart(product_id,img_path,title,category,price,unit,number_of_items,username) VALUES('$product_id','$img_path','$title','$category','$price','$unit','$number_of_items','$username')";
            if($conn->query($sql)) {
                header('Location: ../mart.php');
                $_SESSION["cart_message"] = "Added to cart successfully";
            } else {
                $_SESSION["cart_failed"] = "Failed to add to cart";
                header('Location: ../mart.php');
            }
        }

    } else {
        header("Location: ../mart.php");
    }
     
} else {
    header("Location: ../mart.php");
}