<?php
    include("../config/db_connect.php");

    $sql = "SELECT * FROM products ORDER BY created_at DESC";
    $result = $conn->query($sql);
    
    $produce = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>