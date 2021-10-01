<?php include "controllers/cartController.php";?>

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
    <link rel="stylesheet" href="../mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../mdbootstrap/css/style.css">
    <title>Ridges</title>
</head>

<body>
    <?php include "../templates/navbar.php"; ?>
    <?php if (!isset($cartItems)): ?>
    <div class="container mt-5">
        <div class="alert alert-warning z-depth-1">
            <i class="fa fa-shopping-cart"> </i>
            Your shopping cart is empty, trying shopping for items and adding them to cart.
        </div>
    </div>
    <?php else: ?>
    <?php if (sizeof($cartItems) <= 0): ?>
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

                            <h5 class="mb-4">Cart: <span><?php $hide = (isset($cartItems)) ? count($cartItems) : "0";
echo $hide;?></span> item(s)</h5>
                            <?php foreach ($cartItems as $cart): ?>
                            <div class="row mb-4">
                                <div class="col-md-5 col-lg-3 col-xl-3">
                                    <div class="view overlay z-depth-1 rounded mb-3 mb-md-0">
                                        <a href="overview.php?id=<?php echo $cart["product_id"]; ?>">
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
                                                    <input class="form-control text-dark quantity" min="1" max="<?php echo $cart["number_of_items"] ?>" name="quantity" value="1"
                                                        type="number">
                                                </div>
                                                <small id="passwordHelpBlock" class="form-text text-muted text-center">
                                                    (Note, sold in <?php echo $cart["unit"]; ?>)
                                                </small>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="controllers/cartItemDelete.php?id=<?php echo $cart["product_id"]; ?>" type="button"
                                                    class="card-link-secondary text-danger small text-uppercase mr-3"><i
                                                        class="fas fa-trash-alt mr-1"></i> Remove item </a>

                                            </div>
                                            <p class="mb-0"><span><sub>NGN</sub><strong><?php echo number_format($cart["price"]); ?></strong></span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-4">
                            <?php endforeach;?>
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
                            <small class="text-muted">*If you order today</small>
                            <p class="mb-0"> <?php
                                $date = date("M d, Y");
                                $date = strtotime($date);
                                $date = strtotime("+7 day", $date);

                                echo date('M d, Y', $date);
                            ?> - <?php
                                $date2 = date("M d, Y");
                                $date2 = strtotime($date2);
                                $date2 = strtotime("+14 day", $date2);

                                echo date('M d, Y', $date2);
                            ?></p>
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
                                src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                                alt="Mastercard">
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
                            <form>
                                <script src="https://checkout.flutterwave.com/v3.js"></script>
                                <a href="checkout.php?" onClick="makePayment()" type="button" class="btn btn-primary btn-block waves-effect waves-light">go to
                                    checkout</a>
                                    <script>
                                        function makePayment() {
                                            FlutterwaveCheckout({
                                            public_key: "FLWPUBK-feaacb61c66fb8a0384a99345e5fff5c-X",
                                            tx_ref: "RX1",
                                            amount: 10,
                                            currency: "NGN",
                                            country: "NG",
                                            payment_options: " ",
                                            redirect_url: // specified redirect URL
                                                "http://localhost/ecommerce/mart.php",
                                            meta: {
                                                consumer_id: 23,
                                                consumer_mac: "92a3-912ba-1192a",
                                            },
                                            customer: {
                                                email: "preciouskayili@gmail.com",
                                                name: "<?php echo $_SESSION['username']; ?>",
                                            },
                                            callback: function (data) {
                                                console.log(data);
                                            },
                                            onclose: function() {
                                                // close modal
                                            },
                                            customizations: {
                                                title: "Ridges",
                                                description: "Payment for items in cart",
                                                logo: "http://localhost/ridges/im/logo.png",
                                            },
                                            });
                                        }
                                        </script>
                            </form>

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
    <?php endif;?>
    <?php endif;?>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../mdbootstrap/js/mdb.min.js"></script>
    <script type="text/javascript" src="../mdbootstrap/js/script.js"></script>
    <script>
        // Animations initialization
        new WOW().init();

        console.log("<?php echo $_SESSION["username"] ?>")
    </script>
</body>

</html>