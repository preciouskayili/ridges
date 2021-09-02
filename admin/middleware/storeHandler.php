<?php
    include "../../config/db_connect.php";
    if(isset($_POST["deleteStore"])) {
        if(isset($_GET["id"]))  {
            $id = $_GET['id'];
            $imagePath = $_GET["img_path"];
            unlink("../store_images/$imagePath");
            $sql = "DELETE FROM stores WHERE id='$id'";
            if($conn->query($sql)) {
                header('Location: ../store.php');
            } else {
                header('Location: ../store.php');
            }
        } else {
            header('Location: ../store.php');
       }
    }
?>