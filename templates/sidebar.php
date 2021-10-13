<?php
include "../config/db_connect.php";

$table_query = "SELECT units.unit, stores.store_name FROM units, stores";
$response = $conn->query($table_query);
$result = mysqli_fetch_all($response, MYSQLI_ASSOC);

?>
<html>
    <head>
        <link rel="stylesheet" href="../mdbootstrap/css/sidebar.css">
        <link rel="stylesheet" href="../owlcarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="../owlcarousel/dist/assets/owl.theme.default.min.css">
    </head>
    <style>
        select::focus {
            outline: 0 !important;
            border: 0 !important;
        }
    </style>
    <body>
        <div class="container-fluid shadow-sm p-3 pl-5">
            <div class="owl-carousel">
                <?php for ($i = 0; $i < 5; $i++): ?>
                    <div>
                        <a href="#" class="font-weight-bold text-dark ml-4">Bags</a>
                    </div>
                <?php endfor;?>
            </div>
        </div>
        <div class="sidenav shadow-lg bg-dark" id="nav">
            <p class="pt-3 mt-3" onclick="toggleNav(document.getElementById('nav'))" style="cursor: pointer; color: white; font-size: 40px;user-select: none;">&times;</p>
            <ul class="d-block">
                <li class="mt-4 mb-4 list">
                    <input type="number" required min="1" style="background-color: rgba(0, 0, 0, 0.2); border: none; color: white; backdrop-filter: blur(2rem);" placeholder="Filter by Price" class="form-control m-0 p-2 rounded" />
                </li>
                <li class="list mb-4">
                    <select style="background-color: rgba(0, 0, 0, 0.2); border: none; color: white; backdrop-filter: blur(2rem);" class="form-control m-0 p-2 rounded font-weight-bold">
                        <option disabled selected>-- Filter By Unit --</option>
                        <?php echo "Precious"; ?>
                        <?php for ($i = 0; $i < count($result); $i++): ?>
                            <option><?php echo ($result[$i]["unit"]); ?></option>
                        <?php endfor;?>
                    </select>
                </li>
                <li class="list mb-3">
                    <select style="background-color: rgba(0, 0, 0, 0.2); border: none; color: white; backdrop-filter: blur(2rem);" class="form-control m-0 p-2 rounded">
                        <option disabled selected>-- Filter By Store --</option>
                        <?php for ($i = 0; $i < count($result); $i++): ?>
                            <option><?php echo ($result[$i]["store_name"]); ?></option>
                        <?php endfor;?>
                    </select>
                </li>
                <li class="list mt-2">
                    <button class="btn btn-primary w-100 d-block mx-auto">Apply filter</button>
                </li>
                <li class="list text-center mt-3">
                    <a href="mart.php" class="text-center text-light">
                        Reset
                    </a>
                </li>
            </ul>
        </div>
    </body>
    <script>
        const toggleNav = (nav) => {
            if(nav.classList == "sidenav shadow-lg bg-dark") {
                nav.classList.add('active');
            } else {
                nav.classList.remove('active');
            }
        }
    </script>
    <script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            autoplay: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            margin: 20,
            loop: false,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 3,
                    nav: false
                }
            }
        });
    });
    </script>
    <script src="../owlcarousel/dist/owl.carousel.min.js"></script>
</html>