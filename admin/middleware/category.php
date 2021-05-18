<?php
    include "../config/db_connect.php";

    $sql = "SELECT * FROM category";
    $result = $conn->query($sql);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>