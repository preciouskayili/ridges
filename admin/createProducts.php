<?php
    session_start();
    include "../config/db_connect.php";
    $sql ="SELECT * FROM category";
    $sql2 = "SELECT * FROM units";
    $sql3 = "SELECT * FROM stores";

    $query = $conn->query($sql);
    $query2 = $conn->query($sql2);
    $query3 = $conn->query($sql3);

    $categories = mysqli_fetch_all($query, MYSQLI_ASSOC);
    $units = mysqli_fetch_all($query2, MYSQLI_ASSOC);
    $stores = mysqli_fetch_all($query3, MYSQLI_ASSOC)
?>
<?php include "./middleware/createProduct.php"; ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Ample Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include './partials/topbar.php'; ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <?php include './partials/sidebar.php'; ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="min-height: 250px;">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Products</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Create products</h3>
                            <small class="text-muted">Please fill in the forms below.</small><small
                                class="text-muted">Please fill in the forms below.</small>

                            <?php echo $formErrors; ?>

                            <form action="createProducts.php" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <small class="text-danger"><?php echo $invalidImage; ?></small>
                                    <div class="col-md-6">
                                        <div class="input-group mt-3 mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="far fa-id-card"></i>
                                            </span>
                                            <input required value="<?php echo $title ?>" required type="text" id="title"
                                                name="title" class="form-control" placeholder="Store name"
                                                aria-label="Store name" aria-describedby="basic-addon1">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mt-3 mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="far fa-id-card"></i>
                                            </span>
                                            <input required value="<?php echo $items ?>" required type="number"
                                                id="items" name="items" class="form-control" min="1"
                                                placeholder="Number of available items"
                                                aria-label="Number of available items" aria-describedby="basic-addon1">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mt-3 mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="far fa-id-card"></i>
                                            </span>
                                            <input required value="<?php echo $price ?>" min="1" required type="number" id="price"
                                                name="price" class="form-control" placeholder="Product price"
                                                aria-label="Product price" aria-describedby="basic-addon1">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    <div class="input-group mt-3 mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="far fa-id-card"></i>
                                            </span>
                                            <select required type="text" id="title" name="title"
                                                class="form-control" placeholder="Store name" aria-label="Store name"
                                                aria-describedby="basic-addon1">
                                                <option disabled selected>-- Store name --</option>
                                                
                                                <?php foreach($stores as $store): ?>
                                                    <option><?php $store["store_name"] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mt-3 mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="far fa-id-card"></i>
                                            </span>
                                            <select required type="text" id="title" name="title"
                                                class="form-control" placeholder="Store name" aria-label="Store name"
                                                aria-describedby="basic-addon1">
                                                <option>Option 1</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mt-3 mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="far fa-id-card"></i>
                                            </span>
                                            <textarea required required type="text" id="description" name="description"
                                                class="form-control" placeholder="Product description"
                                                aria-label="Product description" aria-describedby="basic-addon1"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-dark">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include './partials/footer.php'; ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>