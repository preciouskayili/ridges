<?php
mysql: //b6fb8cbf7f7226:aa1eaa22@us-cdbr-east-03.cleardb.com/heroku_03b2d78cc6a16d2?reconnect=true

// Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"], 1);
$active_group = 'default';
$query_builder = true;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>
<?php
    // Connection data
    // $host = "localhost";
    // $database = "ridges";
    // $username = "Presh";
    // $password = "Legendpresh88!!";

    // Connect to database 
    // $conn = mysqli_connect($host, $username, $password, $database);
?>