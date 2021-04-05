<?php include("controllers/cartController.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/style.css">
    <title>Ridges</title>
</head>

<body>
    <style>
        input {
            color: white !important;
        }
    </style>
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">

        <div class="col-md-6 d-flex ml-auto">
            <div class="">
                <div class="row">
                    <div class="col-md-9">
                        <div class="md-form" style="margin: 0px;">
                            <label for="">Search</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-white btn-outline-white btn-md"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <a class="navbar-brand">
            <div class="text-center text-white">
                <h3>Cart</h3>
            </div>
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav1"
            aria-controls="basicExampleNav1" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-align-center"></i>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="basicExampleNav1">

            <!-- Right -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="#!" class="nav-link navbar-link-2 waves-effect">
                        <span class="badge badge-pill red"><?php $hide = (isset($_SESSION["cart"])) ? count($_SESSION["cart"]) : "0"; echo $hide;?></span>
                        <i class="fas fa-shopping-cart pl-0"></i>
                    </a>
                </li>

                </li>
                <li class="nav-item">
                    <a href="#!" class="nav-link waves-effect">
                        Shop
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#!" class="nav-link waves-effect">
                        Contact
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#!" class="nav-link waves-effect">
                        <i class="fa fa-plus"></i>Add item
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href="#!">Action</a>
                        <a class="dropdown-item" href="#!">Another action</a>
                        <a class="dropdown-item" href="#!">Something else here</a>
                    </div>
                </li>
            </ul>

        </div>
        <!-- Links -->

    </nav>
    <!-- Navbar -->
    <?php if(!isset($_SESSION["cart"])) : ?>
    <div class="container mt-5">
        <div class="alert alert-warning z-depth-1">
            <i class="fa fa-shopping-cart"> </i>
            Your shopping cart is empty, trying shopping for items and adding them to cart.
        </div>
    </div>
    <?php else : ?>
    <?php if(sizeof($_SESSION["cart"]) <= 0): ?>
    <div class="container mt-5">
        <div class="alert alert-warning z-depth-1">
            <i class="fa fa-shopping-cart"> </i>
            Your shopping cart is empty, trying shopping for items and adding them to cart.
        </div>
    </div>
    <?php else: ?>
    <!--Section: Block Content-->
    <section>
        <div class="container-fluid mt-5">
            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-lg-8">

                    <!-- Card -->
                    <div class="card wish-list mb-3">
                        <div class="card-body">

                            <h5 class="mb-4">Cart: <span><?php $hide = (isset($_SESSION["cart"])) ? count($_SESSION["cart"]) : "0"; echo $hide;?></span> item(s)</h5>
                            <?php foreach($_SESSION["cart"] as $cart): ?>
                            <div class="row mb-4">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <div class="view overlay z-depth-1 rounded mb-3 mb-md-0">
                                        <a href="overview.php?id=<?php echo $cart["id"]; ?>">
                                            <img class="img-fluid w-100"
                                                style="height: 200px;"
                                                src="../image/<?php echo $cart["img_path"]; ?>"
                                                alt="Sample">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-7 col-lg-9 col-xl-9">
                                    <div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5><?php echo $cart["title"]; ?></h5>
                                                <p class="mb-3 text-muted text-uppercase small"><?php echo $cart["category"]; ?></p>
                                                <p class="mb-2 text-muted text-uppercase small">Unit: <?php echo $cart["unit"]; ?></p>
                                                <p class="mb-3 text-muted text-uppercase small">Number of items available: <?php echo $cart["number_of_items"]; ?></p>
                                            </div>
                                            <div>
                                                <div class="def-number-input number-input safari_only mb-0 w-100">                                                    
                                                    <input class="form-control text-dark quantity" min="1" name="quantity" value="1"
                                                        type="number">
                                                </div>
                                                <small id="passwordHelpBlock" class="form-text text-muted text-center">
                                                    (Note, sold in <?php echo $cart["unit"]; ?>)
                                                </small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="#!" type="button"
                                                    class="card-link-secondary small text-uppercase mr-3"><i
                                                        class="fas fa-trash-alt mr-1"></i> Remove item </a>
                                                
                                            </div>
                                            <p class="mb-0"><span><strong><?php echo number_format($cart["price"]); ?></strong></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <?php endforeach; ?>
                            <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Do not delay the
                                purchase,
                                adding
                                items to your cart does not mean booking them.</p>

                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    <div class="card mb-3">
                        <div class="card-body">

                            <h5 class="mb-4">Expected shipping delivery</h5>

                            <p class="mb-0"> Thu., 12.03. - Mon., 16.03.</p>
                        </div>
                    </div>
                    <!-- Card -->

                    <!-- Card -->
                    <div class="card mb-3">
                        <div class="card-body">

                            <h5 class="mb-4">We accept</h5>

                            <img class="mr-2" width="45px"
                                src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                                alt="Visa">
                            <img class="mr-2" width="45px"
                                src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                                alt="American Express">
                            <img class="mr-2" width="45px"
                                src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                                alt="Mastercard">
                            <img class="mr-2" width="45px"
                                src="https://z9t4u9f6.stackpathcdn.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png"
                                alt="PayPal acceptance mark">
                        </div>
                    </div>
                    <!-- Card -->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4">

                    <!-- Card -->
                    <div class="card mb-3">
                        <div class="card-body">

                            <h5 class="mb-3">The total amount of</h5>

                            <ul class="list-group list-group-flush">
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Temporary amount
                                    <span>$25.98</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    Shipping
                                    <span>Gratis</span>
                                </li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>The total amount of</strong>
                                        <strong>
                                            <p class="mb-0">(including VAT)</p>
                                        </strong>
                                    </div>
                                    <span><strong>$53.98</strong></span>
                                </li>
                            </ul>

                            <button type="button" class="btn btn-primary btn-block waves-effect waves-light">go to
                                checkout</button>

                        </div>
                    </div>
                    <!-- Card -->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>

    </section>
    <!--Section: Block Content-->
    <?php endif; ?>
    <?php endif; ?>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/mdb.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/script.js"></script>
    <script>
        // Animations initialization
        new WOW().init();
    </script>
</body>

</html>