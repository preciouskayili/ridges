<?php

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
    <title>Dashboard || StoreName</title>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand text-white" href="#!">
            Ridges <small class="">dashboard</small>
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav1"
            aria-controls="basicExampleNav1" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-align-left"></i>
        </button>

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
    
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-md-3 mb-3">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5><i class="fas fa-shopping-cart bg-primary z-depth-1 text-center" style="
                            width: 40px;
                            height: 40px;
                            font-size: 20px;
                            border-radius: 50%;
                            padding-top: 10px;
                        "></i> Orders</h5>
                        <h3>20</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-warning">
                    <div class="card-body">
                        <h5>
                            <i class="fas fa-hourglass-half bg-warning z-depth-1 text-center" style="
                                width: 40px;
                                height: 40px;
                                font-size: 20px;
                                border-radius: 50%;
                                padding-top: 10px;
                            "></i> Pending orders
                        </h5>
                        <h3>1,000</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5><i class="fas fa-receipt bg-success z-depth-1 text-center" style="
                            width: 40px;
                            height: 40px;
                            font-size: 20px;
                            border-radius: 50%;
                            padding-top: 10px;
                        "></i> Delivered</h5>
                        <h3>10</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card bg-light">
                    <div class="card-body">
                        <h5>                        
                            <i class="fas fa-dollar-sign bg-light z-depth-1 text-center" style="
                                width: 40px;
                                height: 40px;
                                font-size: 20px;
                                border-radius: 50%;
                                padding-top: 10px;
                            "></i> Monthly revenue
                        </h5>
                        <h4>₦1000</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card bg-success">
                    <div class="card-body">
                        <h4 class="text-white">Recent Orders</h4>
                        <table class="table table-striped table-inverse table-responsive text-white">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Ordered at</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">Precious Solomon Kayili</td>
                                        <td>Basket of tomatoes</td>
                                        <td>NGN22,000</td>
                                        <td>January 22nd 2020</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Precious Solomon Kayili</td>
                                        <td>Basket of tomatoes</td>
                                        <td>NGN22,000</td>
                                        <td>January 22nd 2020</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Precious Solomon Kayili</td>
                                        <td>Basket of tomatoes</td>
                                        <td>NGN22,000</td>
                                        <td>January 22nd 2020</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Precious Solomon Kayili</td>
                                        <td>Basket of tomatoes</td>
                                        <td>NGN22,000</td>
                                        <td>January 22nd 2020</td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-success">
                    <div class="card-body">
                        <h4 class="text-white">Recent Orders</h4>
                        <table class="table table-striped table-inverse table-responsive text-white">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Ordered at</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">Precious Solomon Kayili</td>
                                        <td>Basket of tomatoes</td>
                                        <td>NGN22,000</td>
                                        <td>January 22nd 2020</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Precious Solomon Kayili</td>
                                        <td>Basket of tomatoes</td>
                                        <td>NGN22,000</td>
                                        <td>January 22nd 2020</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Precious Solomon Kayili</td>
                                        <td>Basket of tomatoes</td>
                                        <td>NGN22,000</td>
                                        <td>January 22nd 2020</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">Precious Solomon Kayili</td>
                                        <td>Basket of tomatoes</td>
                                        <td>NGN22,000</td>
                                        <td>January 22nd 2020</td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/mdb.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/script.js"></script>
</body>
</html>