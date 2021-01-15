<?php

    // session_start();
    // $_SESSION["cart"] = array(array("name" => "angel"));
    $newItem = array("name" => "Precious","him" => "Hello");
    var_dump($newItem);
?>
<form action="session.php" method="post">
    <button type="submit" name="submit">Submit</button>
</form>