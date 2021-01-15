<?php include("controllers/productController.php"); ?>
<?php
    $cartCheck = (isset($_SESSION["cart"])) ? $cartItemsNumber = count($_SESSION["cart"]) : 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/style.css">
    <title>Ridges</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" href="#!">
            Ridges
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav1"
            aria-controls="basicExampleNav1" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-align-center"></i>
        </button>

        <div class="col-md-6">
            <div class="flex-center">
                <div class="row">
                    <div class="col-md-12 col-sm-12 form-inline flex-center">
                        <input type="text" class="form-control text-dark" placeholder="Search" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                        <select name="" id="" class="form-control" style="border-radius: 0px;">
                            <option value="">Hello</option>
                            <option value="">Hello</option>
                            <option value="">Fruits</option>
                        </select>
                        <button class="btn btn-white btn-md z-depth-0" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; margin-left: 0px;"><i class="fa fa-search"></i>
                        </button>
                    </div>
                    <!-- <div class="col-md-3">
                    </div> -->
                </div>
            </div>
        </div>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="basicExampleNav1">

            <!-- Right -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="cart.php" class="nav-link navbar-link-2 waves-effect">
                        <span class="badge badge-pill red"><?php $hide = (isset($_SESSION["cart"])) ? count($_SESSION["cart"]) : "0"; echo $hide;?></span>
                        <i class="fas fa-shopping-cart pl-0"></i>
                    </a>
                </li>

                </li>
                <li class="nav-item">
                    <a href="mart.php" class="nav-link waves-effect">
                        Shop
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#!" class="nav-link waves-effect">
                        Help
                    </a>
                </li>
                <li class="nav-item">
                    <a href="add.php" class="nav-link waves-effect">
                        <i class="fa fa-plus"></i> Add item
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
    <div class="container-fluid mt-5">
        <div class="row">
            

            <div class="col-md-10">
                <!--Section: Block Content-->
                <section>
                    <?php foreach($produce as $product): ?>
                    <?php $id = $product["id"]; ?>
                    <?php include("controllers/addToCart.php"); ?>
                    <div class="row mb-4">
                        <div class="col-md-5 col-lg-3 col-xl-3">

                            <div class="view overlay z-depth-1 rounded mb-3 mb-md-0">
                                <a href="overview.php?id=<?php echo $product["id"]; ?>">
                                    <img style="height: 250px;" class="img-fluid w-100"
                                        src="../image/<?php echo $product["img_path"]; ?>"
                                        alt="Sample">
                                </a>
                            </div>

                        </div>
                        <div class="col-md-7 col-lg-9 col-xl-9">
                            <div class="row">
                                <div class="col-lg-7 col-xl-7">

                                    <h5 class="text-uppercase"><?php echo $product["title"]; ?></h5>
                                    <p class="mb-2 text-muted text-uppercase small"><?php echo $product["category"]; ?></p>
                                    <p class="text-uppercase small">Unit: <?php echo $product["unit"]; ?></p>
                                    <hr>
                                    <p class="mb-lg-0"><?php echo $product["description"]; ?></p>
                                </div>
                                <div class="col-lg-5 col-xl-5">

                                    <h6 class="mb-3"><span><?php echo $product["price"]; ?></span></h6>
                                    <div class="my-4">
                                        <form id="addToCart" action="mart.php" method="post">                                        
                                        </form>
                                        <button type="submit" form="addToCart" name="add<?php echo $product["id"]; ?>" class="btn btn-primary btn-md mr-1 mb-2"><i
                                            class="fas fa-shopping-cart pr-2"></i>Add to cart</button>
                                        <a href="overview.php?id=<?php echo $product["id"]; ?>" class="btn btn-light btn-md mr-1 mb-2"><i
                                                class="fas fa-info-circle pr-2"></i>Details</a>
                                    </div>
                                    <button type="button"
                                        class="btn btn-danger btn-md px-3 mb-lg-2 material-tooltip-main"
                                        data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i
                                            class="fas fa-heart"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </section>
                <!--Section: Block Content-->
            </div>
        </div>


        <script type="text/javascript" src="../node_modules/mdbootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="../node_modules/mdbootstrap/js/popper.min.js"></script>
        <script type="text/javascript" src="../node_modules/mdbootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../node_modules/mdbootstrap/js/mdb.min.js"></script>
        <script type="text/javascript" src="../node_modules/mdbootstrap/js/script.js"></script>
</body>

</html>