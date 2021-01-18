<?php include("controllers/newProducts.php"); ?>
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
    <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">

        <a class="navbar-brand" href="#!">
            <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="30" alt="mdb logo">
        </a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav1"
            aria-controls="basicExampleNav1" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-align-center"></i>
        </button>

        <div class="col-md-6">
            <div class="flex-center">
                <div class="row">
                    <div class="col-md-9">
                        <div class="md-form" style="margin: 0px;">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-white btn-outline-white btn-md"><i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="basicExampleNav1">

            <!-- Right -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="cart.php" class="nav-link navbar-link-2 waves-effect">
                        <span class="badge badge-pill red">1</span>
                        <i class="fas fa-shopping-cart pl-0"></i>
                    </a>
                </li>

                </li>
                <li class="nav-item">
                    <a href="ecommerce/mart.php" class="nav-link waves-effect">
                        Shop
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#!" class="nav-link waves-effect">
                        <i class="fas fa-store"></i> Create store
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

    <div class="container-fluid bg-dark z-depth-1 p-5" style="min-height: 100vh;">
        <div class="row mt-3">
            <div class="col-md-3 col-sm-3 mb-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3"><b>My markets</b></h5>
                        <p>Fruits and vegetables</p>
                        <p>Farm equipments</p>
                        <p>Farm implements</p>
                        <p>Farm equipments</p>
                        <p class="pb-2">Fertilizer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 mb-5">
                <div id="carouselId" class="carousel slide carousel-fade" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>
                        <li data-target="#carouselId" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img height="400" class="col-md-12" src="img\anete-lusina-zwsHjakE_iI-unsplash.jpg"
                                alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3><b>Title</b></h3>
                                <p>This is a good picture</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img height="400" class="col-md-12" src="img\hector-martinez-EG49vTtKdvI-unsplash.jpg"
                                alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h2><b>Title</b></h2>
                                <p>Another picture that is good</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img height="400" class="col-md-12" src="img\jason-blackeye-2SPPbNbVQ3Y-unsplash.jpg"
                                alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h2><b>Title</b></h2>
                                <p>Another fine picture</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" style="padding: 9px;">
                        <p>
                            <i class="fa fa-question text-center"
                                style="padding-top: 10px;border: 1px solid orange; border-radius: 50%; height: 40px; width: 40px;"></i>
                            Help center
                            <br>
                            <small class="text-muted">Stuck? get help and guidiance, with our active customer care service.</small>
                        </p>
                        <p>
                            <i class="fa fa-money-bill text-center"
                                style="padding-top: 10px;border: 1px solid orange; border-radius: 50%; height: 40px; width: 40px;"></i>
                            Quick loans
                            <br>
                            <small class="text-muted">Get CBN loans with your account details</small>
                        </p>
                        <p>
                            <i class="fa fa-store text-center"
                                style="padding-top: 10px;border: 1px solid orange; border-radius: 50%; height: 40px; width: 40px;"></i>
                            Quick store
                            <br>
                            <small class="text-muted">Get your online store instantly up and running in a few
                                clicks.</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Container -->
    <div class="container-fluid">
        <div class="card-body">
            <h3 class="text-center">New products</h3>
            <hr  class="w-25 bg-dark"/>
            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                <!--Controls-->
                <div class="controls-top text-center mt-5">
                    <a class="btn-floating z-depth-1" href="#multi-item-example" data-slide="prev" style="border-radius: 50%;"><i
                            class="fas fa-chevron-left text-white" style="padding-top: 10px; border-radius: 50%; height: 40px; width: 40px; border: 1px solid #007bff; background-color: #007bff;"></i></a>
                    <a class="btn-floating z-depth-1" href="#multi-item-example" data-slide="next" style="border-radius: 50%;"><i
                            class="fas fa-chevron-right text-white" style="padding-top: 10px; border-radius: 50%; height: 40px; width: 40px; border: 1px solid #007bff; background-color: #007bff;"></i></a>
                </div>
                <!--/.Controls-->

                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                    <li data-target="#multi-item-example" data-slide-to="1"></li>

                </ol>
                <!--/.Indicators-->

                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    <!--First slide-->
                    <div class="carousel-item active">

                        <?php for($i = 0; $i < 4; $i++): ?>
                        <div class="col-md-3" style="float:left">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                    src="image/<?php echo $newProducts[$i]["img_path"]; ?>"
                                    alt="Card image cap"
                                    height="200"
                                    >
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $newProducts[$i]["title"]; ?></h4>
                                    <p class="card-text">NGN1000</p>
                                    <div class="d-flex mx-auto">
                                        <a class="btn btn-light btn-sm text-dark" title="Details"><i class="fas fa-ellipsis-v"></i></a>
                                        <a class="btn btn-danger btn-sm" title="Add to favourites"><i class="fa fa-heart"></i></a>
                                        <a class="btn btn-primary btn-sm" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endfor; ?>

                    </div>
                    <!--/.First slide-->

                    <!--Second slide-->
                    <div class="carousel-item">

                        <?php for($i = 4;4 == $i < 8;$i++): ?>
                        <div class="col-md-3" style="float:left">
                            <div class="card mb-2">
                                <img class="card-img-top"
                                    src="image/<?php echo $newProducts[$i]["img_path"]; ?>"
                                    alt="Card image cap"
                                    height="200">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $newProducts[$i]["title"]; ?></h4>
                                    <p class="card-text">NGN1000</p>
                                    <div class="d-flex mx-auto">
                                        <a class="btn btn-light btn-sm text-dark" title="Details"><i class="fas fa-ellipsis-v"></i></a>
                                        <a class="btn btn-danger btn-sm" title="Add to favourites"><i class="fa fa-heart"></i></a>
                                        <a class="btn btn-primary btn-sm" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endfor; ?>

                    </div>
                    <!--/.Second slide-->



                </div>
                <!--/.Slides-->

            </div>
            <!--/.Carousel Wrapper-->
        </div>
    </div>

    <script type="text/javascript" src="node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/mdb.min.js"></script>
    <script type="text/javascript" src="node_modules/mdbootstrap/js/script.js"></script>
</body>

</html>