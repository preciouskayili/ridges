<?php 
    if(!isset($_SESSION['username'])) {
        header('Location: ../Auth/login.php');
    } else {
        // Allow user on page
    }
?>
<?php setlocale(LC_ALL, "US"); ?>
<?php include "./middleware/category.php"; ?>
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
                        <h4 class="page-title"><i class="fas fa-cog"></i> Settings</h4>
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
                <!-- Category setting -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                          <div class="d-flex">
                              <h3 class="box-title">Categories</h3>
                              <button class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-plus"></i>
                              </button>
                          </div>
                          <div class="table-responsive">
                              <table class="table text-nowrap">
                                  <thead>
                                      <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Category</th>
                                        <th class="border-top-0">Created at</th>
                                        <th class="border-top-0">Created by</th>
                                        <th class="border-top-0">Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>
																			<?php foreach($categories as $category) : ?>
                                        <tr>
                                          <td><?php echo $category["id"] ?></td>
                                          <td><?php echo $category["category_name"] ?></td>
                                          <td><?php
																						$format="M d,Y";
																						$created_at = new DateTime($category["created_at"]);
																						echo date_format($created_at, $format);
																						?>
																					</td>
																					<td><?php echo $category["created_by"] ?></td>
                                          <td>
                                              <button type="button" data-bs-toggle="modal" data-bs-target="#editModal" class="btn rounded btn-sm btn-primary text-white"><i class="fas fa-edit"></i></button>
                                              <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn rounded btn-sm btn-danger text-white"><i class="fas fa-trash"></i></button>
                                          </td>
                                      </tr>
																			<?php endforeach; ?>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                        
                        <!-- Modal for CRUD Operations -->
                        <!-- Create modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="categoryCreator" action="middleware/categoryCreator.php" autocomplete="off">
                                            <label class="lead" for="category">Category Name</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fas fa-list-ol"></i>
                                                </span>
                                                <input required type="text" id="category" name="category" class="form-control" placeholder="Category name" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="setCategory" form="categoryCreator" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delete alert modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Notice</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="categoryDelete" action="./middleware/categoryCreator.php?id=<?php echo $category['id'] ?>" method="POST">

                                        </form>
                                        <p><strong>You are about to delete a category,</strong> are you sure you want to delete this category.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="deleteCategory" form="categoryDelete" class="btn btn-danger">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="categoryUpdate" action="./middleware/categoryCreator.php?id=<?php echo $category['id'] ?>" autocomplete="off">
                                            <label class="lead" for="category">Category Name</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <i class="fas fa-list-ol"></i>
                                                </span>
                                                <input required type="text" id="category" value="<?php echo $category['category_name'] ?>" name="category" class="form-control" placeholder="Category name" aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="updateCategory" form="categoryUpdate" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Account</h3>
                            <a class="setting-link" href="#">Logout <i class="fas fa-arrow-right"></i></a>
                            <br />
                            <a href="#" class="setting-link">Visit profile <i class="fas fa-arrow-right"></i></a>
                            <br />
                            <button class="btn mt-3 btn-danger text-white rounded" type="submit">Delete account</button>
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
