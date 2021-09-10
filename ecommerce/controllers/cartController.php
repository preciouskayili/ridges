<?php
    session_start();
    include "../config/db_connect.php";

    if($_SESSION["username"]) {
        $username = $_SESSION["username"];
        $sql = "SELECT * FROM cart WHERE username='$username'";
    
        $result = $conn->query($sql);
        $cartItems = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        header('Location: ../index.php');
    }
?>
