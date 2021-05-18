<?php


if (isset($_GET["id"])) {
        if(isset($_SESSION["username"])) {
    
        $productInfo = array("id" => $_GET["id"], "img_path" => $_GET["img_path"], "title" => $_GET["title"], "category" => $_GET["category"], "price" => $_GET["price"], "unit" => $_GET["unit"], "number_of_items" => $_GET["number_of_items"]);
        
        
    } else {
        header("Location: ../mart.php");
    }
     
} else {
    header("Location: ../mart.php");
}
