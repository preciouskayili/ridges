<?php session_start(); ?>
<?php setlocale(LC_ALL, "US"); ?>
<?php include "./search.php" ?>
<?php include "controllers/productController.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"> -->
    <link rel="stylesheet" href="../admin/css/icons/font-awesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="../mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../mdbootstrap/css/style.css">
    <title>Ridges</title>
</head>

<body>
	<?php include "../templates/navbar.php" ?>
    <?php include "../templates/sidebar.php" ?>
    <?php if (count($products) == 0): include "./emptyResult.php";
endif; ?>
    <div class="container-fluid mt-5">
        <div class="row">
            
            <div class="col-lg-12 mb-3">
                <!--Section: Block Content-->
                <section>
                    <?php if(isset($_SESSION["cart_message"])) : ?>
                        <div class="alert alert-success" role="alert" data-mdb-color="success">
                        <i class="fas fa-check-circle me-3"></i> <?php echo $_SESSION["cart_message"]; ?>
                    </div>
                    <?php unset($_SESSION["cart_message"]); endif; ?>
                    <?php if(isset($_SESSION["cart_failed"])) : ?>
                        <div class="alert alert-danger" role="alert" data-mdb-color="danger">
                        <i class="fa fa-times me-3"></i> <?php echo $_SESSION["cart_failed"]; ?>
                    </div>
                    <?php unset($_SESSION["cart_failed"]); endif; ?>
                    <?php foreach ($products as $product): ?>
                    <?php $id = $product["id"]; ?>
                    <div class="row mb-4">
                        <div class="col-lg-3 col-md-5">

                            <div class="view overlay shadow mb-3 mb-md-0" style="border-radius: 1rem;">
                                <a href="overview.php?id=<?php echo $product["id"]; ?>">
                                    <img style="height: 250px;" class="img-fluid w-100"
                                        src="../image/<?php echo $product["img_path"]; ?>"
                                        alt="Sample">
                                </a>
                            </div>

                        </div>
                        <div class="col-md-7 col-lg-7 col-xl-8">
                            <div class="row">
                                <div class="col-lg-7 col-xl-7">

                                    <h5 class="text-uppercase text-truncate" title="<?php echo $product["title"] ?>"><?php echo $product["title"]; ?></h5>
                                    <p class="mb-2 text-muted text-uppercase small"><?php echo $product["category"]; ?></p>
                                    <p class="text-uppercase small">Unit: <?php echo $product["unit"]; ?></p>
                                    <hr>
                                    <p class="mb-lg-0"><?php echo $product["description"]; ?></p>
                                </div>
                                <div class="col-lg-5 col-xl-5">

                                    <h6 class="mb-3">NGN<span><?php echo number_format($product["price"]); ?></span></h6>
                                    <small class="text-muted">
                                    <?php
$format     = "M d,Y";
$created_at = new DateTime($product["created_at"]);
echo date_format($created_at, $format);
?></small>
                                    <div class="my-4">
                                        <a style="display: <?php if(isset($_SESSION["username"])) { echo "initial";} else { echo "none";} ?>"
                                        href="./controllers/addToCart.php?id=<?php echo $id; ?>&img_path=<?php echo $product["img_path"] ?>&title=<?php echo $product["title"]; ?>&category=<?php echo $product["category"]; ?>&price=<?php echo $product["price"]; ?>&unit=<?php echo $product["unit"]; ?>&number_of_items=<?php echo $product["number_of_items"]; ?>" 
                                        class="btn btn-primary btn-md mr-1"><i
                                            class="fas fa-shopping-cart pr-2"></i>Add to cart</a>
                                        <a href="overview.php?id=<?php echo $product["id"]; ?>" 
                                            class="btn btn-light btn-md mr-1"><i
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
            <div class="d-flex">
                <ul class="pagination mx-auto" style="display: <?php if(isset($product)): if (count($product) == 0): echo "none";else:"flex";endif; else: "none"; endif; ?>">
                    <li class="page-item">
                        <a class="page-link" href="?page=1">First</a>
                    </li>
                    <li class="<?php if ($page <= 1) {echo 'disabled page-item';} else {echo 'page-item';} ?>">
                        <a class="page-link" href="<?php if ($page <= 1) {echo '#';} else {echo "?page=" . ($page - 1);} ?>"><<</a>
                    </li>
                    <?php for ($i = 0; $i < $total_pages; $i++): ?>
                        <li class="<?php if ($page == $i + 1) {echo "page-item active";} else {echo "page-item";} ?>">
                            <a href="?page=<?php echo $i + 1; ?>" class="page-link">
                                <?php echo $i + 1; ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                    <li class="<?php if ($page >= $total_pages) {echo 'disabled page-item';} else {echo 'page-item';} ?>">
                        <a class="page-link" href="<?php if ($page >= $total_pages) {echo '#';} else {echo "?page=" . ($page + 1);} ?>">>></a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $total_pages; ?>">Last</a>
                    </li>
                </ul>
            </div>

        <script type="text/javascript" src="../mdbootstrap/js/jquery.min.js"> </script>
        <script type="text/javascript" src="../mdbootstrap/js/popper.min.js"></script>
        <script type="text/javascript" src="../mdbootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../mdbootstrap/js/mdb.min.js"></script>
        <script type="text/javascript" src="../mdbootstrap/js/script.js"></script>
        <script>
            setTimeout(() => $('.alert').fadeOut(), 5000);
        </script>
</body>

</html>