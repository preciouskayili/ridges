<?php
include "./config/db_connect.php";
$invalidMail = "";
if (isset($_POST["add"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    $query = "SELECT * FROM `mailing_list` WHERE `email`='$email'";
    $response = $conn->query($query);

    if (mysqli_num_rows($response) >= 1) {
        $invalidMail = "Email address already exists.";
        print_r($response);
    } else {
        $sql = "INSERT INTO mailing_list(email) VALUES('$email')";
        $conn->query($sql);
    }
} else {
    // Not set yet
}
?>
<?php include "controllers/newProducts.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin/css/icons/font-awesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="./owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/dist/assets/owl.theme.default.min.css">
    <title>Ridges</title>
</head>
<style>
    nav {
        backdrop-filter: blur(2rem);
        background-color: rgba(255, 255, 255, 0.5);
    }
    .rounded--card {
        border-radius: 2rem !important;
    }

    .bg-img {
        background: linear-gradient(to right bottom, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url(img/bg.jpg);
        background-position: center;
        background-size: cover;
    }

    .cover {
        background: linear-gradient(
                        to right bottom, rgba(0, 0, 0, 0.4), 
                        rgba(0, 0, 0, 0.6)
                    ), url(img/farm-bg.jpg);
        background-position: center;
        background-size: cover;
        min-height: 60vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    input {
        color: #777 !important;
        height: 2.5rem !important;
    }
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light">

        <a class="navbar-brand" href="./index.php">
            Ridges
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav1"
            aria-controls="basicExampleNav1" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-align-center"></i>
        </button>


        <!-- Links -->
        <div class="collapse navbar-collapse" id="basicExampleNav1">
            <!-- Left -->
            <ul class="navbar-nav mr-auto">


                <li class="nav-item">
                    <a href="./ecommerce/mart.php" class="nav-link waves-effect">
                        Shop
                    </a>
                </li>
            </ul>
            <!-- Links -->
            <!-- Right -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="ecommerce/cart.php" class="nav-link navbar-link-2 waves-effect">
                        <span class="badge badge-pill red"><?php $hide = (!empty($_SESSION["cart"])) ? count($_SESSION["cart"]) : "0";
echo $hide;?></span>
                        <i class="fas fa-shopping-cart pl-0"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="user/login.php">Login</a>
                        <a class="dropdown-item" href="#!">Create account</a>
                        <a class="dropdown-item" href="#!">Create store</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- ===================== -->
    <!-- == Landing page design -->
    <!-- ====================== -->
    <div class="container-fluid cover" style="overflow-x: hidden;">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="font-weight-bold text-white text-justify">Discover, order and access the best farm produce.</h1>
                    <p class="text-justify" style="color: #ccc; font-size: 18px;">Ridges offers you a wide range of opportunities to harness in the
                            Agricultural sector as well as a merge of the technological and Agricultural sectors for
                            a wide market coverage. The platform provides statistical analysis of all the
                            happenings on the site, from the sales, to the most farm produce, and so on.</p>
                    <a href="./ecommerce/mart.php" class="btn btn-rounded rounded--card btn-success btn-lg"><i
                            class="fas fa-shopping-cart"></i> Start
                        shopping</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <h4 class="font-weight-bold">
            Recent products
        </h4>
        <div class="owl-carousel">
            <?php foreach ($newProducts as $newProduct): ?>
            <div class="pr-3">
                <img class="shadow rounded--card w-100" style="height: 200px" src="./image/<?php echo $newProduct["img_path"] ?>" alt="">
                <div class="d-flex">
                    <button title="Add to cart" class="btn btn-sm btn-primary"
                        style="padding: 10px; width: 40px; height: 40px;"><i class="fas fa-cart-plus"></i></button>
                    <div class="ml-2">
                        <h5 class="mt-2 font-weight-bold"><?php echo $newProduct["title"]; ?></h5>
                        <p>NGN<?php echo $newProduct["price"] ?></p>
                        <span class="badge badge-primary"><?php echo $newProduct["category"]; ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>

    <div class="col-md-12 shadow-lg mt-5 round--it mx-auto bg-img p-4">
        <div class="container-fluid">
            <h4 class="text-center text-white font-weight-bold">Join the innovation</h4>
            <p style="color: #ccc" class="d-block mx-auto text-justify col-md-6">Ridges is a smart market, creating
            a vast network of farmers as well as covering a wide market range to enhance productivity and profit.
            Ridges was born out of a need in the Agricultural sector that has been lingering for years.</p>
            <button class="btn btn-success d-block mx-auto" style="border-radius: 2rem;">Create an account</button>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="col-md-8 mx-auto mt-5">
            <h5 class="text-center font-weight-bold">Join our mailing list!</h5>
            <small class="text-danger font-weight-bold text-center" style="text-align: center"><?php echo $invalidMail; ?></small>
            <form action="index.php" method="POST">
                <div class="md-form input-group">
                    <input name="email" placeholder="Email address" required autocomplete="off" type="email" id="form77"
                        style="background-color: transparent; border: 1px solid #777; color: white;"
                        class="form-control m-0">
                    <button name="add" type="submit" class="btn rounded btn-md btn-dark" style="margin-top: 0.08rem"><i
                            class="fas fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-5 bg-primary text-center text-white text-lg-left">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © <?php echo date('Y') ?> Copyright:
            <a class="text-light" href="index.php">Presh Enterprise</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->


    <script type="text/javascript" src="mdbootstrap/js/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            autoplay: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            margin: 10,
            loop: true,
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
                    items: 4,
                    nav: false
                }
            }
        });
    });
    </script>
    <script type="text/javascript" src="mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="mdbootstrap/js/mdb.min.js"></script>
    <script type="text/javascript" src="mdbootstrap/js/script.js"></script>
    <script type="text/javascript" src="owlcarousel/dist/owl.carousel.min.js"></script>
</body>

</html>