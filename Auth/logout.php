<?php
    session_start();
    if(isset($_POST["logout"])) {
        if(session_destroy()) {
            header('Location: ../index.php');
        } else {
            echo("<h1>Logout failed</h1>");
        }
    }
?>