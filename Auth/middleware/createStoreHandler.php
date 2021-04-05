<?php
	include("../config/db_connect.php");
	$error = array("phone" => "");

	$store_name = "";
	$phone = "";
	$address = "";

	if(isset($_POST["create"])) {
		$store_name = $_POST["store-name"];
		$phone = $_POST["phone-number"];
		$address = $_POST["store-address"];
	
		if(preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/", $phone)) {	
			$sql = "INSERT INTO `stores`(`store-name`, `phone-number`, `store-address`) VALUES('$store_name', '$phone', '$address')";

			if($conn->query($sql)) {
				header("Location: ../ecommerce/mart.php");
			} else {
				echo "Error";
			}
		} else {
			$error["phone"] = "Invalid phone number";
		}
	}


?>