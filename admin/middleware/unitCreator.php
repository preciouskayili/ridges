<?php
include "../../config/db_connect.php";
session_start();
    if(isset($_POST["setUnit"])) {
        $unit = mysqli_real_escape_string($conn, $_POST["unit"]);
        $created_by = $_SESSION["username"];

        $sql = "INSERT INTO units(unit,created_by) VALUES('$unit','$created_by')";
        if(mysqli_query($conn, $sql)) {
            header("Location: ../settings.php");
        }
    }

    if(isset($_POST['updateUnit'])) {
        if(isset($_GET["id"])) {
            $id = $_GET['id'];
            $unit = mysqli_real_escape_string($conn, $_POST['unit']);
            $sql = "UPDATE units SET unit='$unit' WHERE id='$id'";
            if($conn->query($sql)) {
                header('Location: ../settings.php');
            } else {
                header('Location: ../settings.php');
            }
        }
    }

    if(isset($_GET["delete"])) {
        if(isset($_GET["id"]))  {
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $sql = "DELETE FROM units WHERE id='$id'";
            
            if($conn->query($sql)) {
                header('Location: ../settings.php');
            } else {
                header('Location: ../settings.php');
            }
        } else {
            header('Location: ../settings.php');
       }
    }
?>