<?php
    include "../config/db_connect.php";

    if(isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    $products_per_page = 5;
    $offset = ($page-1) * $products_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM units";
    $result = $conn->query($total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $products_per_page);

    $sql = "SELECT * FROM `category` ORDER BY `category`.`created_at` DESC LIMIT $offset, $products_per_page";
    $result = $conn->query($sql);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>