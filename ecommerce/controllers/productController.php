<?php
    include("../config/db_connect.php");

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    
    $produce = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>