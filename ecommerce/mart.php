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

	<?php include("../templates/navbar.php") ?>
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
                                        <form id="addToCart<?php echo $product["id"]; ?>" action="mart.php" method="post">                                        
                                        </form>
                                        <button type="submit" form="addToCart<?php echo $product["id"]; ?>" name="add<?php echo $product["id"]; ?>" class="btn btn-primary btn-md mr-1 mb-2"><i
                                            class="fas fa-shopping-cart pr-2"></i>Add to cart</button>
                                        <a href="overview.php?id=<?php echo $product["id"]; ?>" class="btn btn-light btn-md mr-1 mb-2"><i
                                                class="fas fa-info-circle pr-2"></i>Details</a>
                                    </div>
                                    
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