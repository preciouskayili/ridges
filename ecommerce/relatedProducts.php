<?php
    include("../config/db_connect.php");
    include("controllers/overviewController.php");
    $category = $description[0]["category"];

    $query = "SELECT * FROM products WHERE category = '$category' LIMIT 4";

    $report = $conn->query($query);

    $relatedProducts = mysqli_fetch_all($report, MYSQLI_ASSOC);

?>