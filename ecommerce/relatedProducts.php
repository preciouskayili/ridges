<?php
    include("../config/db_connect.php");
    include("controllers/overviewController.php");
    $category = $description[0]["category"];
    $id = $description[0]['id'];
    $query = "SELECT * FROM products WHERE category = '$category' AND id='$id'";

    $report = $conn->query($query);

    $relatedProducts = mysqli_fetch_all($report, MYSQLI_ASSOC);

?>