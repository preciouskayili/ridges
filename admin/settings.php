<?php
include "../config/db_connect.php";
include "./middleware/unit.php";
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: ../Auth/login.php');
} else {
    // Allow user on page
}

if (isset($_POST["deleteUser"])) {
    $username = $_SESSION["username"];
    $sql = "DELETE FROM users WHERE username='$username'";
    $conn->query($sql);
    session_destroy();
}
?>
<?php setlocale(LC_ALL, "US");?>
<?php include "./middleware/category.php";?>
<?php include "./middleware/unit.php";?>
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
                        <h4 class="page-title"><i class="fas fa-cog"></i> Settings</h4>
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <div class="d-md-flex">
                            <ol class="breadcrumb ms-auto">
                                <li><a href="#" class="fw-normal">Dashboard/Settings</a></li>
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
                <!-- Category setting -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <div class="d-md-flex d-sm-block">
                                <h3 class="box-title">Categories</h3>
                                <div class="ms-auto">
                                    <form method="POST" id="categoryCreator" action="middleware/categoryCreator.php"
                                        autocomplete="off">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-list-ol"></i>
                                            </span>
                                            <input required type="text" id="category" name="category"
                                                class="form-control" placeholder="Category name" aria-label="Username"
                                                aria-describedby="basic-addon1">
                                            <button class="btn btn-primary" name="setCategory">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Category</th>
                                            <th class="border-top-0">Created at</th>
                                            <th class="border-top-0">Created by</th>
                                            <th class="border-top-0"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($categories as $key => $category): ?>
                                        <tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteCategoryModal<?php echo $category["id"] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Notice
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php
$id = $category["id"];
?>
                                                            <p><strong>You are about to delete sensitive data,</strong>
                                                                Are you sure want to do this?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <a href="middleware/categoryCreator.php?id=<?php echo $id; ?>&delete=true"
                                                                class="btn btn-danger">Yes
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <td><?php echo $category["id"] ?></td>
                                            <td>
                                                <p onclick="item_edit(this, this.nextElementSibling)">
                                                    <?php echo $category["category_name"] ?></p>
                                                <form class="col-md-9" style="display: none" method="POST"
                                                    id="categoryUpdate<?php echo $category["id"] ?>"
                                                    action="./middleware/categoryCreator.php?id=<?php echo $category['id'] ?>"
                                                    autocomplete="off">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fas fa-list-ol"></i>
                                                        </span>
                                                        <input required
                                                            value="<?php echo $category["category_name"]; ?>"
                                                            type="text" id="category" name="category"
                                                            class="form-control" placeholder="Category name"
                                                            aria-label="Category name" aria-describedby="basic-addon1">
                                                        <button class="btn btn-primary" type="submit"
                                                            name="updateCategory">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>

                                            <td><?php
$format = "M d,Y";
$created_at = new DateTime($category["created_at"]);
echo date_format($created_at, $format);
?>
                                            </td>
                                            <td><?php echo $category["created_by"] ?></td>
                                            <td>
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#deleteCategoryModal<?php echo $category["id"] ?>"
                                                    class="btn rounded btn-sm btn-danger text-white"><i
                                                        class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>

                                <div class="d-flex">
                                    <ul class="pagination mx-auto"
                                        style="display: <?php if (count($categories) == 0): echo "none";else:"flex";endif;?>">
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

                        <!-- ================================== -->
                        <!-- ========== Unit settings ========= -->
                        <!-- ================================== -->
                        <div class="white-box">
                            <div class="d-flex">
                                <h3 class="box-title">Units</h3>
                                <div class="ms-auto">
                                    <form method="POST" id="unitCreator" action="middleware/unitCreator.php"
                                        autocomplete="off">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-list-ol"></i>
                                            </span>
                                            <input required type="text" id="unit" name="unit" class="form-control"
                                                placeholder="Unit name" aria-label="Unit name"
                                                aria-describedby="basic-addon1">
                                            <button class="btn btn-primary" name="setUnit">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Unit</th>
                                            <th class="border-top-0">Created at</th>
                                            <th class="border-top-0">Created by</th>
                                            <th class="border-top-0"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($units as $key => $unit): ?>
                                        <tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="deleteUnitModal<?php echo $unit["id"] ?>"
                                                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Notice
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php $id = $unit["id"];?>
                                                            <p><strong>You are about to delete sensitive data,</strong>
                                                                Are you sure want to do this?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <a href="middleware/unitCreator.php?id=<?php echo $id; ?>&delete=true"
                                                                class="btn btn-danger">Yes
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <td><?php echo $unit["id"] ?></td>
                                            <td>
                                                <p onclick="item_edit(this, this.nextElementSibling)">
                                                    <?php echo $unit["unit"] ?></p>
                                                <form class="col-md-9" style="display: none" method="POST"
                                                    id="categoryUpdate<?php echo $unit["id"] ?>"
                                                    action="./middleware/unitCreator.php?id=<?php echo $unit['id'] ?>"
                                                    autocomplete="off">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="basic-addon1">
                                                            <i class="fas fa-list-ol"></i>
                                                        </span>
                                                        <input required value="<?php echo $unit["unit"]; ?>" type="text"
                                                            id="unit" name="unit" class="form-control"
                                                            placeholder="Unit type" aria-label="Unit type"
                                                            aria-describedby="basic-addon1">
                                                        <button class="btn btn-success" type="submit" name="updateUnit">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
                                            <td><?php
$format = "M d,Y";
$created_at = new DateTime($unit["created_at"]);
echo date_format($created_at, $format);
?>
                                            </td>
                                            <td><?php echo $unit["created_by"] ?></td>
                                            <td>
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#deleteUnitModal<?php echo $unit["id"] ?>"
                                                    class="btn rounded btn-sm btn-danger text-white"><i
                                                        class="fas fa-trash"></i></button>
                                            </td>

                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                <div class="d-flex">
                                    <ul class="pagination mx-auto"
                                        style="display: <?php if (count($units) == 0): echo "none";else:"flex";endif;?>">
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

                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title">Account</h3>
                        <form method="POST" action="../Auth/logout.php">
                            <button class="setting-link btn" name="logout" style="color:#2cabe3" type="submit">Logout <i class="fas fa-arrow-right"></i></button>
                        </form>
                        <form method="POST" action="./settings.php">
                            <button class="btn text-danger rounded" name="deleteUser" type="submit">Delete account</button>
                        </form>
                        <br />
                        <a href="./profile.php" class="setting-link">Visit profile <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

            </div>

            <!-- ============================================================== -->
            <!-- End Page Content -->
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
    </div>
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
    <!-- Form edit Javascript -->
    <script src="js/editForm.js"></script>
</body>

</html>