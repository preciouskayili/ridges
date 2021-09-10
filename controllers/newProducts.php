<?php
include "config/db_connect.php";

$sql = "SELECT * FROM products ORDER BY created_at DESC LIMIT 10";

$result = $conn->query($sql);
$newProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);
