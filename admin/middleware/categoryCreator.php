<?php
    include "../../config/db_connect.php";
    session_start();    
    if(isset($_POST["setCategory"])) {
        $category_name = mysqli_real_escape_string($conn, $_POST["category"]);
        $created_by = $_SESSION["username"];

        $sql = "INSERT INTO category(category_name,created_by) VALUES('$category_name','$created_by')";
        if(mysqli_query($conn, $sql)) {
            header("Location: ../settings.php");
        }
    }

    if(isset($_GET["delete"])) {
        if(isset($_GET["id"]))  {
            $id = $_GET['id'];
            $sql = "DELETE FROM category WHERE id='$id'";
            if($conn->query($sql)) {
                header('Location: ../settings.php');
            } else {
                header('Location: ../settings.php');
            }
        } else {
            header('Location: ../settings.php');
        }
    } else {
        header('Location: ../settings.php');
    }
    if(isset($_POST['updateCategory'])) {
        if(isset($_GET["id"])) {
            $id = $_GET['id'];
            $category_name = mysqli_real_escape_string($conn, $_POST['category']);
            $sql = "UPDATE category SET category_name='$category_name' WHERE id='$id'";
            if($conn->query($sql)) {
                header('Location: ../settings.php');
            } else {
                header('Location: ../settings.php');
            }
        }
    }
?>