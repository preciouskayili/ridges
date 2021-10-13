<?php
session_start();
include "../config/db_connect.php";
setlocale(LC_ALL, "US");
if (!isset($_SESSION['username']) || !isset($_SESSION['is_admin'])) {
    header('Location: ../Auth/login.php');
} else {
    // Allow user on page
}

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}

$products_per_page = 5;
$offset = ($page - 1) * $products_per_page;

$total_pages_sql = "SELECT COUNT(*) FROM products";
$result = $conn->query($total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $products_per_page);

if (isset($_GET["apply_category"])) {
    if ($_GET["apply_category"] == "def") {
        $sql = "SELECT * FROM products LIMIT $offset, $products_per_page";
        $result = $conn->query($sql);
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        $category = mysqli_real_escape_string($conn, $_GET["apply_category"]);
        $sql = "SELECT * FROM products WHERE category='$category' LIMIT $offset, $products_per_page";
        $result = $conn->query($sql);
        $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

} else {
    $sql = "SELECT * FROM products LIMIT $offset, $products_per_page";
    $result = $conn->query($sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$admins_sql = "SELECT username, img_path, email, created_at FROM admin ORDER BY created_at DESC LIMIT 5";
$query = $conn->query($admins_sql);
$recent_admins = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>
<?php include "./middleware/category.php";?>
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
    <title>Rides Admin Lite Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
    <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <!-- Custom CSS -->
    <link href="css/style.min.css" rel="stylesheet">
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
        <?php include './partials/topbar.php';?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <?php include './partials/sidebar.php';?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard</a></li>
                            </ol>
                            <a href="createProducts.php"
                                class="btn btn-primary  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
                                <i class="fa fa-plus"></i> Create product
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <button type="button" onclick="window.open('../index.php')" class="btn btn-primary shadow-lg flex-center" style="border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;">Go to site</button>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info shadow">
                            <h3 class="box-title">Stores</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <span class="counter text-success">
                                    <?php
$store_sql = "SELECT * FROM stores";
$store_query = $conn->query($store_sql);
echo (mysqli_num_rows($store_query));
?>
                                </span>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info shadow">
                            <h3 class="box-title">Products</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                               <span class="counter text-purple"><?php if (isset($products)): echo count($products);else:echo "0";endif;?></span>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="white-box analytics-info shadow">
                            <h3 class="box-title">Orders</h3>
                            <ul class="list-inline two-part d-flex align-items-center mb-0">
                                <span class="counter text-info">
                                    <?php
$orders_sql = "SELECT * FROM `orders`";
echo (mysqli_num_rows($conn->query($orders_sql)));
?>
                                </span>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- RECENT SALES -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box shadow">
                            <div class="d-md-flex mb-3">
                                <h3 class="box-title mb-0">Products</h3>
                                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                                    <form action="./dashboard.php" id="apply_category" method="GET">
                                        <select name="apply_category" class="form-select row border-top">
                                            <option selected disabled>-- Choose a category --</option>
                                            <option value="def">Default</option>
                                            <?php foreach ($categories as $category): ?>
                                                <option><?php echo $category["category_name"] ?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Image</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Store</th>
                                            <th class="border-top-0">Date</th>
                                            <th class="border-top-0">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!isset($products) || empty($products)): ?>
                                            <h1 class="font-weight-bold text-center">No products found</h1>
                                        <?php else: ?>
                                        <?php foreach ($products as $product): ?>
                                        <tr>
                                            <td><?php echo $product["id"]; ?></td>
                                            <td>
                                                <img width="40px" height="40px" class="rounded-circle" src="../image/<?php echo $product['img_path']; ?>" alt="">
                                            </td>
                                            <td class="txt-oflo">
                                                <a class="text-dark" href="middlware/editProduct.php?id=<?php echo $product["id"]; ?>">
                                                    <strong><?php echo $product["title"]; ?></strong>
                                                </a>
                                            </td>
                                            <td><?php echo $product["store"]; ?></td>
                                            <td class="txt-oflo">
                                            <?php
$format = "M d,Y";
$created_at = new DateTime($product["created_at"]);
echo date_format($created_at, $format);
?></td>
                                            <td><span class="text-success">NGN<?php echo $product["price"]; ?></span></td>
                                        </tr>
                                        <?php endforeach;?>
                                        <?php endif;?>
                                    </tbody>
                                </table>
                                <div class="d-flex">
                                    <ul class="pagination mx-auto" style="display: <?php if (isset($product)): if (count($product) == 0): echo "none";else:"flex";endif;else:echo "none";endif;?>">
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent Comments -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- .col -->
                    <div class="col-md-12 col-lg-8 col-sm-12">
                        <div class="card white-box p-0">
                            <div class="card-body">
                                <h3 class="box-title mb-0">Recent Orders</h3>
                            </div>
                            <div class="comment-widgets">
                                <!-- Comment Row -->
                                <?php
$new_order_sql = "SELECT * FROM orders LIMIT 5";
$new_order_query = $conn->query($new_order_sql);
$new_orders = mysqli_fetch_all($new_order_query, MYSQLI_ASSOC);

foreach ($new_orders as $order):
?>
                                    <div class="d-flex flex-row comment-row p-3 mt-0">
                                        <div class="p-2"><img src="../image/<?php echo $order['img_path']; ?>" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text ps-2 ps-md-3 w-100">
                                            <h5 class="font-medium"><?php echo $order['title']; ?></h5>
                                            <span class="mb-3 d-block"><?php echo $order["number_of_items"] ?> <?php echo $order["unit"] ?> </span>
                                            <div class="comment-footer d-md-flex align-items-center">
                                                    <span class="badge bg-primary rounded"><?php echo $order["category"] ?></span>

                                                <div class="text-muted fs-2 ms-auto mt-2 mt-md-0">
                                                    <?php
                                                        $format = "M d,Y";
                                                        $created_at = new DateTime($order["ordered_at"]);
                                                        echo date_format($created_at, $format);
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="card white-box p-0">
                            <div class="card-heading">
                                <h3 class="box-title mb-0">Recent admin's</h3>
                            </div>
                            <div class="card-body">
                                <ul class="chatonline">
                                    <?php foreach ($recent_admins as $admin): ?>
                                    <li class="">
                                        <div class="call-chat">
                                            <button onclick="sendmail('<?php echo $admin['email'] ?>')" class="btn btn-success text-white btn-circle btn" type="button">
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                        </div>
                                        <a href="javascript:void(0)" class="d-flex align-items-center"><img
                                                src="./middleware/admin_image/<?php echo $admin['img_path']; ?>" style="height: 50px; width: 50px;" alt="user-img" class="img-circle">
                                            <div class="ms-2">
                                                <span class="text-dark"><?php echo $admin["username"]; ?><small
                                                        class="d-block text-success d-block"><?php
$format = "M d,Y";
$created_at = new DateTime($admin["created_at"]);
echo date_format($created_at, $format);
?></small></span>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 2021 © Ample Admin brought to you by <a
                    href="https://www.wrappixel.com/">wrappixel.com</a>
            </footer>
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
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <script>
        $("#apply_category").change(function() {
            $(this).submit();
        });
        function sendmail(mail) {
            location.href = `mailto:${mail}`;
        }
    </script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartist chart-->
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
</body>

</html>
