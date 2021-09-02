<?php
    include "../../config/db_connect.php";
    if(isset($_GET["id"])) {
        $id = mysqli_real_escape_string($conn, $_GET["id"]);
        $username = $_SESSION['username'];
        $sql = "DELETE FROM cart WHERE product_id='$id' AND username='$username'";
        if($conn->query($sql)) {
            header('Location: ../cart.php');
        } else {
            // Not working
        }
    }
?>