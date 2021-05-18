<?php session_start(); ?>
<?php include "controllers/newProducts.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="node_modules/mdbootstrap/css/style.css">
    <title>Ridges</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">

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
            </ul>
            <!-- Links -->
            <!-- Right -->
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="form-inline">
                        <div class="md-form text-white" style="margin: 0px;">
                            <label>Search</label>
                            <input type="text" class="form-control text-white" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                        </div>
                        <button type="button" class="btn btn-primary btn-sm" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;">
                            Search
                        </button>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="cart.php" class="nav-link navbar-link-2 waves-effect">
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
                        <a class="dropdown-item" href="#!">Login</a>
                        <a class="dropdown-item" href="#!">Create account</a>
                        <a class="dropdown-item" href="#!">Create store</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Navbar -->

    <div class="container-fluid mt-3">
        <h4>Categories</h4>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">
                        Fruit
                    </p>
                </div>
                <div class="card-footer">
                    100 products
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <!--Grid row-->
        <div class="row">
            <?php foreach ($newProducts as $new): ?>
            <!--Grid column-->
            <div class="col-lg-3 col-sm-6 col-md-6 mb-4">
                <!--Card-->
                <div class="card">
                    <!--Card image-->
                    <div class="view overlay">
                    <img src="./image/<?php echo $new["img_path"]; ?>" height="250" class="card-img-top"
                        alt="">
                    <a>
                        <div class="mask rgba-white-slight"></div>
                    </a>
                    </div>
                    <!--Card image-->
                    <!--Card content-->
                    <div class="card-body text-center">
                    <!--Category & Title-->
                    <a href="" class="grey-text">
                        <h5><?php echo $new["category"]; ?></h5>
                    </a>
                    <h5>
                        <strong>
                        <a href="" class="dark-grey-text"><?php echo $new["title"] ?>
                            <span class="badge badge-pill danger-color">NEW</span>
                        </a>
                        </strong>
                    </h5>
                    <h4 class="font-weight-bold blue-text">
                        <small>NGN</small>
                        <strong><?php echo $new["price"]; ?></strong>
                    </h4>
                    </div>
                    <!--Card content-->
                </div>
            <!--Card-->
        </div>
        <!--Grid column-->
        <?php endforeach;?>
    </div>



    <script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/script.js"></script>
</body>

</html>