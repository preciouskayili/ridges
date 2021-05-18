<?php
    include "../../config/db_connect.php";
    if(isset($_POST["setCategory"])) {
        $category_name = mysqli_real_escape_string($conn, $_POST["category"]);
        $created_by = 'Precious';

        $sql = "INSERT INTO category(category_name,created_by) VALUES('$category_name','$created_by')";
        if(mysqli_query($conn, $sql)) {
            header("Location: ../settings.php");
        }
    }
?>