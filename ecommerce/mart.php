<?php session_start();?>
<?php setlocale(LC_ALL, "US");?>
<?php include "./search.php"?>
<?php include "controllers/productController.php";?>

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
    <link rel="stylesheet" href="../owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../owlcarousel/dist/assets/owl.theme.default.min.css">
    <title>Ridges</title>
</head>
<body>
    <?php include "../templates/navbar.php"?>
    <?php include "../templates/sidebar.php"?>

    <div class="container-fluid mt-4" style="width: 95%">
        <div class="row">
            <div class="mr-auto">
                <h2 class="font-weight-bold">Products</h2>
            </div>
            <div class="ml-auto">
                <select name="category" class="font-weight-bold" id="form77" style="border: none !important; color: #aaa; line-spacing: 1.15" class="form-control m-0 p-2 rounded text-muted">
                    <option disabled selected>SORT BY</option>
                </select>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="row">

            <div class="col-lg-12 mb-3">
                <!--Section: Block Content-->
                <section>
                    <?php if (isset($_SESSION["cart_message"])): ?>
                        <div class="alert alert-success" role="alert" data-mdb-color="success">
                        <i class="fas fa-check-circle me-3"></i> <?php echo $_SESSION["cart_message"]; ?>
                    </div>
                    <?php unset($_SESSION["cart_message"]);endif;?>
                    <?php if (isset($_SESSION["cart_failed"])): ?>
                        <div class="alert alert-danger" role="alert" data-mdb-color="danger">
                        <i class="fa fa-times me-3"></i> <?php echo $_SESSION["cart_failed"]; ?>
                    </div>
                    <?php unset($_SESSION["cart_failed"]);endif;?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="d-none d-lg-block col-lg-3 mx-auto">
                                <h4 class="font-weight-bold mb-3">Categories:</h4>

                                <?php foreach ($categories as $category): ?>
                                    <form action="mart.php" method="get">
                                        <div class="form-check mb-1">
                                          <input
                                            class="form-check-input"
                                            type="radio"
                                            name="c"
                                            value="<?php $category["category_name"]?>"
                                            id="flexRadioDefault1"
                                          />
                                          <label class="form-check-label" for="flexRadioDefault2">
                                            <?php echo $category["category_name"]; ?>
                                          </label>
                                        </div>
                                    </form>
                                <?php endforeach;?>

                                <hr class="my-3">

                                <h4 class="font-weight-bold mb-3">Stores:</h4>

                                <?php foreach ($stores as $store): ?>
                                    <div class="form-check">
                                    <input
                                        style="border: 5px solid #ccc !important"
                                        class="form-check-input"
                                        type="checkbox"
                                        value=""
                                        id="flexCheckChecked"
                                    />
                                    <label class="form-check-label" for="flexCheckChecked">
                                        <?php echo $store["store_name"]; ?>
                                    </label>
                                    </div>
                                <?php endforeach;?>
                            </div>
                            <div class="col-lg-9 col-md-12">
                                <div class="row">
                                <?php if (count($products) == 0): include "./emptyResult.php";
endif;?>
                                <?php foreach ($products as $product): ?>
                                    <?php $id = $product["id"];?>
                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                            <div class="card-img-top">
                                                    <div class="view overlay shadow mb-3 mb-md-0" style="border-radius: 1rem;">
                                                        <a href="overview.php?id=<?php echo $product["id"]; ?>">
                                                            <img style="height: 150px;" class="img-fluid w-100"
                                                                src="../image/<?php echo $product["img_path"]; ?>"
                                                                alt="Sample">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body text-center">
                                                    <h4 class="font-weight-bold text-truncate" title="<?php echo $product['title'] ?>"><?php echo $product["title"] ?></h4>
                                                    <small class="text-muted"><?php echo "NGN" . $product["price"]; ?></small>
                                                    <br />
                                                    <span class="badge badge-primary"><?php echo $product["store"]; ?></span>
                                                </div>
                                            </div>

                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                <!--Section: Block Content-->
                </div>
            </div>
            <div class="d-flex">
                <ul class="pagination mx-auto" style="display: <?php if (isset($product)): if (count($product) == 0): echo "none";else:"flex";endif;else:"none";endif;?>">
                    <li class="page-item">
                        <a class="page-link" href="?page=1">First</a>
                    </li>
                    <li class="<?php if ($page <= 1) {echo 'disabled page-item';} else {echo 'page-item';}?>">
                        <a class="page-link" href="<?php if ($page <= 1) {echo '#';} else {echo "?page=" . ($page - 1);}?>"><<</a>
                    </li>
                    <?php for ($i = 0; $i < $total_pages; $i++): ?>
                        <li class="<?php if ($page == $i + 1) {echo "page-item active";} else {echo "page-item";}?>">
                            <a href="?page=<?php echo $i + 1; ?>" class="page-link">
                                <?php echo $i + 1; ?>
                            </a>
                        </li>
                    <?php endfor;?>
                    <li class="<?php if ($page >= $total_pages) {echo 'disabled page-item';} else {echo 'page-item';}?>">
                        <a class="page-link" href="<?php if ($page >= $total_pages) {echo '#';} else {echo "?page=" . ($page + 1);}?>">>></a>
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
            $('input[type=radio]').on('change', function() {
                $(this).closest("form").submit();
            });
            $(document).ready(function() {
                $(".owl-carousel").owlCarousel({
                    autoplay: true,
                    autoplayHoverPause: true,
                    responsiveClass: true,
                    margin: 20,
                    loop: false,
                    responsive: {
                        0: {
                            items: 10,
                            nav: false
                        },
                        600: {
                            items: 10,
                            nav: false
                        },
                        1000: {
                            items: 20,
                            nav: false
                        }
                    }
                });
            });
        </script>
        <script src="../owlcarousel/dist/owl.carousel.min.js"></script>
        <script>
            setTimeout(() => $('.alert').fadeOut(), 5000);
        </script>
</body>

</html>