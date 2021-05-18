<?php

    include("../config/db_connect.php");
    if(isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "SELECT * FROM products WHERE id = '$id'";

        $result = $conn->query($sql);

        $description = mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

?>