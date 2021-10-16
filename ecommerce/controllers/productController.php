<?php
    include("../config/db_connect.php");

    if(isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }

    $products_per_page = 18;
    $offset = ($page-1) * $products_per_page;

    $total_pages_sql = "SELECT COUNT(*) FROM products";
    $result = $conn->query($total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $products_per_page);

    if(isset($_GET["c"])) {
        $c = mysqli_real_escape_string($_GET["c"]);
        $sql = "SELECT * FROM products WHERE category='$c' ORDER BY created_at ASC LIMIT $offset, $products_per_page";
    } else {
        $sql = "SELECT * FROM products ORDER BY created_at ASC LIMIT $offset, $products_per_page";
    }
    $response = $conn->query($sql);
    $produce = mysqli_fetch_all($response, MYSQLI_ASSOC);
    
?>