<?php
    include "../config/db_connect.php";
    if(isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM stores WHERE id='$id'";
        $result = $conn->query($sql);
        $storeDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if(isset($_POST["updateStore"])){
            function escapeString($value) {
                mysqli_real_escape_string($conn, $value);
            };
            $store_name = escapeString($_POST["store_name"]);
            $store_location = escapeString($_POST["store_location"]);
            $phone_number = escapeString($_POST["phone_number"]);
            $email_address = escapeString($_POST["email_address"]);

            if(isset($_FILES['upload_image'])) {
                $target = "./store_images/";
                $uniqueId = uniqid() . '_' . time();
                $image = basename($_FILES['upload_image']['name']);
                $imageName = $uniqueId . $image;
                $temp_name = $_FILES['upload_image']['tmp_name'];
                $imagePath = $target . $uniqueId . $image;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
    
                $check = getimagesize($_FILES["upload_image"]["tmp_name"]);

                if ($check !== false) {
                    move_uploaded_file($_FILES['upload_image']['tmp_name'], $imagePath);
                    $sql = "UPDATE stores SET store_name='$store_name',img_path='$imageName',store_location='$store_location',phone_number='$phone_number',email_address='$email_address')";
                } else {
                    $invalidImage = "This file type is not supported";
                    $uploadOk = 0;
                }
            } else {
                $sql = "UPDATE stores SET store_name='$store_name',store_location='$store_location',phone_number='$phone_number',email_address='$email_address' WHERE id='$id'";
            }
            if($conn->query($sql)) {
                header('Location: store.php');
            } else {
                // Stay on this page
            }
        } 
    } else {
        header('Location: ./store.php');
}
?>
<?php include "./middleware/storeCreator.php"; ?>
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
                        <h4 class="page-title">Edot store</h4>
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
                            <h3 class="box-title">Edit store</h3>
                            <small class="text-muted">Please fill in the forms below.</small>
                            <form action="./editStore.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <small class="text-danger"><?php echo $invalidImage; ?></small>
                                    <div class="col-md-6">
                                        <div class="input-group mt-3 mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="far fa-id-card"></i>
                                            </span>
                                            <input value="<?php echo $storeDetails[0]['store_name']; ?>" required type="text" id="store_name" name="store_name" class="form-control" placeholder="Store name" aria-label="Store name" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
    
                                    <div class="col-md-6">
                                        <div class="input-group mt-3 mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-location-arrow"></i>
                                            </span>
                                            <input value="<?php echo $storeDetails[0]['store_location'] ?>" required type="address" id="store_location" name="store_location" class="form-control" placeholder="Store location" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
    
                                    <div class="col-md-6">
                                        <div class="input-group mt-3 mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-phone"></i>
                                            </span>
                                            <input value="<?php echo $storeDetails[0]['phone_number'] ?>" required type="tel" id="phone_number" name="phone_number" class="form-control" placeholder="Phone number" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
    
                                    <div class="col-md-6">
                                        <div class="input-group mt-3 mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-at"></i>
                                            </span>
                                            <input value="<?php echo $storeDetails[0]['email_address'] ?>" required type="email" id="email_address" name="email_address" class="form-control" placeholder="Email address" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>

                                    <div class="col-md-6 set-display" style="display: none">
                                        <div class="input-group mt-3 mb-3">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-file-image"></i>
                                            </span>
                                            <input required type="file" id="upload_image" name="upload_image" class="form-control" placeholder="Upload image" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <small class="text-muted">Upload store logo</small>
                                    </div>
    
                                    <div class="col-md-6 clear-img">
                                        <img width="70" height="70" id="image" class="border border-3 p-1 border-danger rounded-circle mr-3" src="store_images/<?php echo $storeDetails[0]["img_path"]; ?>" alt="Store logo">
                                        <button type="button" class="btn btn-danger btn-sm text-white delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                    
                                </div>
                                <div class="d-flex">
                                    <a class="mt-1" href="./store.php"><i class="fas fa-arrow-left"></i> Go back to stores</a>
                                    <button type="submit" name="updateStore" class="ms-auto btn btn-primary"><i class="fas fa-plus"></i> Create store</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        
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
    <script>
    $(document).ready(function(){

        // Delete
        $('.delete').click(function(e){
            e.preventDefault();
            // Selecting image source
            let imgElement_src = $('#image').attr("src");

            // AJAX request
            $.ajax({
                url: './middleware/delete.php',
                type: 'post',
                data: {path: imgElement_src},
                success: function(response){

                // Changing image source when remove
                if(response == 1) {
                    $('.set-display').css({
                        "display": "block"
                    })
                    $('.clear-img').css({
                        "display": "none"
                    })
                    $('#upload_image').prop('required', true);
                    $('#upload_image').prop('disabled', false);
                } else {
                    $('#upload_image').prop('disabled', true);
                }
                }
            });
        });
    });
    </script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
</body>

</html>
