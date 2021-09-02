<?php
include "../config/db_connect.php";

if (isset($_POST["search"])) {

    if (!isset($_POST["keywords"])) {
        $keywords = "";
    } else {
        $keywords = $_POST["keywords"];
    }

    if (!isset($_POST["category"])) {
        $category = "";
    } else {
        $category = $_POST["category"];
    }

    $sql = "SELECT * FROM products WHERE title LIKE '%$keywords%' AND category LIKE '%$category%'";

    $response = $conn->query($sql);

    $products = mysqli_fetch_all($response, MYSQLI_ASSOC);
} else {
    $sql = "SELECT * FROM products";

    $response = $conn->query($sql);

    $products = mysqli_fetch_all($response, MYSQLI_ASSOC);

}
