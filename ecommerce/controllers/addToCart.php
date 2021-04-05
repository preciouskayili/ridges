<?php
    // session_start();
    if(isset($_GET["id"])){
        $productInfo = array("id" => $_GET["id"], "img_path" => $_GET["img_path"], "title" => $_GET["title"], "category" => $_GET["category"], "price" => $_GET["price"], "unit" => $_GET["unit"], "number_of_items" => $_GET["number_of_items"]);
        $_SESSION["cart"][] = $productInfo;
        header("Location: ../mart.php");
    }else{
        echo "";
    } 
?>