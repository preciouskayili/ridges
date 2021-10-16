<?php
include "../config/db_connect.php";

$sql1 = "SELECT * FROM units";
$sql2 = "SELECT * FROM stores";

$response1 = $conn->query($sql1);
$response2 = $conn->query($sql2);

$units = mysqli_fetch_all($response1, MYSQLI_ASSOC);
$stores = mysqli_fetch_all($response2, MYSQLI_ASSOC);
?>
<style>
    nav {
    -ms-overflow-style: none; /* for Internet Explorer, Edge */
    scrollbar-width: none; /* for Firefox */
    overflow-y: scroll;
}

    nav::-webkit-scrollbar {
        display: none; /* for Chrome, Safari, and Opera */
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="overflow-x: scroll">
        <div class="container-fluid">
            <ul class="navbar-nav d-flex flex-row ms-auto">
            <?php foreach ($units as $unit): ?>
                <li class="nav-item ml-4 mr-lg-0">
                    <a
                        href="#"
                        class="font-weight-bold text-dark"
                    >
                        <?php echo $unit["unit"]; ?>
                    </a>
                </li>
            <?php endforeach;?>
            </ul>
        </div>
    </nav>
</body>