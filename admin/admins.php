<?php include "../config/db_connect.php";?>
<?php
include "./middleware/adminController.php";
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['is_admin'])) {
    header('Location: ../Auth/login.php');
} else {
    // Allow user on page
}
?>
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
        content="Ample Admin Lite is powerful and clean admin dashboard template, inspired from Bootstrap Framework">
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
        <div class="page-wrapper" style="min-height: 250px;">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Admin's</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard/Admin</a></li>
                            </ol>
                            <a href="./register.php"
                                class="btn btn-success  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
                                Register admin
                            </a>
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
                            <h3 class="box-title">Admin's</h3>

                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Profile</th>
                                            <th class="border-top-0">Username</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Created at</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (isset($admins) || count($admins) > 0): ?>
                                        <?php foreach ($admins as $key => $admin): ?>
                                        <tr>
                                            <td><?php echo $admin["id"] ?></td>
                                            <td>
                                                <img width="40px" height="40px" class="rounded-circle" src="./middleware/admin_image/<?php echo $admin['img_path']; ?>" alt="">
                                            </td>
                                            <td>
                                                <p>
                                                    <?php echo $admin["username"] ?>
                                                </p>
                                            </td>

                                            <td>
                                                <p>
                                                    <?php echo $admin["email"] ?>
                                                </p>
                                            </td>

                                            <td><?php
$format = "M d,Y";
$created_at = new DateTime($admin["created_at"]);
echo date_format($created_at, $format);
?>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                        <?php else: ?>
                                            <h3>No registered admins yet</h3>
                                        <?php endif;?>
                                    </tbody>
                                </table>

                                <div class="d-flex">
                                    <ul class="pagination mx-auto"
                                        style="display: <?php if (count($admins) == 0): echo "none";else:"flex";endif;?>">
                                        <li class="page-item">
                                            <a class="page-link" href="?page=1">First</a>
                                        </li>
                                        <li
                                            class="<?php if ($page <= 1) {echo 'disabled page-item';} else {echo 'page-item';}?>">
                                            <a class="page-link"
                                                href="<?php if ($page <= 1) {echo '#';} else {echo "?page=" . ($page - 1);}?>">
                                                << </a>
                                        </li>
                                        <?php for ($i = 0; $i < $total_pages; $i++): ?>
                                        <li
                                            class="<?php if ($page == $i + 1) {echo "page-item active";} else {echo "page-item";}?>">
                                            <a href="?page=<?php echo $i + 1; ?>" class="page-link">
                                                <?php echo $i + 1; ?>
                                            </a>
                                        </li>
                                        <?php endfor;?>
                                        <li
                                            class="<?php if ($page >= $total_pages) {echo 'disabled page-item';} else {echo 'page-item';}?>">
                                            <a class="page-link"
                                                href="<?php if ($page >= $total_pages) {echo '#';} else {echo "?page=" . ($page + 1);}?>">>></a>
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
            <?php include './partials/footer.php';?>
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
