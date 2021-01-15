<?php
    // session_start();
    $productInfo = array("id" => $product["id"], "img_path" => $product["img_path"], "title" => $product["title"], "category" => $product["category"], "price" => $product["price"], "unit" => $product["unit"], "number_of_items" => $product["number_of_items"]);
    if(isset($_POST["add$id"])){
        $_SESSION["cart"][] = $productInfo;
    }else{
        echo "";
    } 

?>