<?php setlocale(LC_ALL, "US");?>
<?php include "relatedProducts.php";?>
<?php include "controllers/overviewController.php";?>
<?php

	$foreign_key = $description[0]["id"];
	$sql = "SELECT * FROM review WHERE product_id='$foreign_key' ORDER BY created_at DESC";
	if($result = $conn->query($sql)) {
		$reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

	if(isset($_POST["add_review"])) {
		$name = $_SESSION["username"];
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$review = mysqli_real_escape_string($conn, $_POST["review"]);
		$product_id = $description[0]["id"];

		$sql2 ="INSERT INTO review(name,email,review,product_id) VALUES('$name','$email','$review','$product_id')";
		if($conn->query($sql2)) {
			header('Location: overview.php' . "?id=" . $description[0]["id"]);
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="../mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../mdbootstrap/css/style.css">
    <link rel="stylesheet" href="../owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="../owlcarousel/dist/assets/owl.theme.default.min.css">
    <title>Ridges</title>
</head>

<body>
	<?php include "../templates/navbar.php"; ?>
    <!-- Navbar -->
    <div class="container mt-5">
        <!-- Classic tabs -->

        <div class="view overlay z-depth-1 rounded mb-3 mb-md-0">
            <img style="height: 600px;" class="img-fluid w-100" src="../image/<?php echo $description[0]["img_path"] ?>"
                alt="Sample">
        </div>

        <div class="classic-tabs border rounded px-4 pt-1">
            <ul class="nav tabs-primary nav-justified" id="advancedTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-dark active show" id="description-tab" data-toggle="tab" href="#description"
                        role="tab" aria-controls="description" aria-selected="true">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" id="info-tab" data-toggle="tab" href="#info" role="tab"
                        aria-controls="info" aria-selected="false">Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                        aria-controls="reviews" aria-selected="false">Reviews (<?php echo count($reviews) ?>)</a>
                </li>
            </ul>
            <hr>
            <div class="tab-content" id="advancedTabContent">
                <div class="tab-pane fade show active container-fluid" id="description" role="tabpanel"
                    aria-labelledby="description-tab">
                    <h5><?php echo $description[0]["title"] ?></h5>
                    <p class="small text-muted text-uppercase mb-2"><?php echo $description[0]["category"] ?></p>
                    <h6>NGN<?php echo number_format($description[0]["price"]); ?></h6>
                    <p class="pt-1"><?php echo $description[0]["description"]; ?></p>
                    <a href="./controllers/addToCart.php?id=<?php echo $id; ?>&img_path=<?php echo $description[0]["img_path"] ?>&title=<?php echo $description[0]["title"]; ?>&category=<?php echo $description[0]["category"]; ?>&price=<?php echo $description[0]["price"]; ?>&unit=<?php echo $description[0]["unit"]; ?>&number_of_items=<?php echo $description[0]["number_of_items"]; ?>"
                        class="btn btn-primary btn-sm rounded"><i class="fas fa-cart-plus"></i></a>
                </div>
                <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                    <h5>Additional Information</h5>
                    <table class="table table-striped table-bordered mt-3">
                        <thead>
                            <tr>
                                <th scope="row" class="w-150 dark-grey-text h6"><?php echo $description[0]["unit"]; ?>
                                    available</th>
                                <td><em><?php echo number_format($description[0]["number_of_items"]); ?></em></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="w-150 dark-grey-text h6">Store</th>
                                <td><em><?php echo $description[0]["store"] ?></em></td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="row" class="w-150 dark-grey-text h6">Category</th>
                                <td><em><?php echo $description[0]["category"] ?></em></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="w-150 dark-grey-text h6">Created at</th>
                                <td><em><?php echo $description[0]["created_at"]; ?></em></td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="row" class="w-150 dark-grey-text h6">Unit</th>
                                <td><em><?php echo $description[0]["unit"]; ?></em></td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <h5><span><?php echo count($reviews) ?></span> reviews for
                        <span><?php echo $description[0]["title"]; ?></span>
                    </h5>
                    <h5 class="mt-4">Add a review</h5>
                    <p>Your email address will not be published.</p>
                    <div>
                        <form action="overview.php?id=<?php echo $description[0]["id"] ?>" method="POST">
                            <!-- Your review -->
                            <div class="md-form md-outline">
                                <textarea id="form76" required name="review" class="md-textarea form-control pr-6"
                                    rows="4"></textarea>
                                <label for="form76">Your review</label>
                            </div>
                            <!-- Email -->
                            <div class="md-form md-outline">
                                <input type="email" required name="email" id="form77" class="form-control pr-6">
                                <label for="form77">Email</label>
                            </div>
                            <div class="text-right pb-2">
                                <button type="submit" name="add_review" class="btn btn-primary">Add a review</button>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <?php foreach($reviews as $review): ?>
                    <div class="media mt-3 mb-4">
                        <div class="media-body">
                            <div class="d-sm-flex justify-content-between">
                                <p class="mt-1 mb-2">
                                    <strong><?php echo $review["name"] ?></strong>
                                    <span>– </span><span><?php
$format     = "M d,Y";
$created_at = new DateTime($review["created_at"]);
echo date_format($created_at, $format);
?></span>
                                </p>
                            </div>
                            <p class="mb-0"><?php echo $review["review"] ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>


        </div>
        <!-- Classic tabs -->
        <!--Section: Block Content-->
        <div class="container mt-5 d-block ml-auto">
            <h3 class="mb-4">Related products</h3>
            <section class="text-center">

                <?php foreach ($relatedProducts as $related): ?>

                <!-- Card -->
                <div class="owl-carousel">
                    <div class="card">
                        <div class="view overlay z-depth-2 rounded">
                            <a href="overview.php?id=<?php echo $related["id"]; ?>">
                                <img style="height: 250px;" class="img-fluid w-100"
                                    src="../image/<?php echo $related["img_path"]; ?>" alt="Sample">
                        </div>
                        </a>

                        <div class="pt-4">
                            <h5><?php echo $related["title"]; ?></h5>
                            <h6>NGN <?php echo $related["price"]; ?></h6>
                        </div>
                    </div>
                </div>
                <!-- Card -->
                <?php endforeach;?>
            </section>
        </div>
    </div>
    <script type="text/javascript" src="../mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../mdbootstrap/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            autoplay: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            loop: false,
            responsive: {
                0: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 4,
                    nav: false
                }
            }
        });
    });
    </script>
    <script type="text/javascript" src="../mdbootstrap/js/mdb.min.js"></script>
    <script type="text/javascript" src="../mdbootstrap/js/script.js"></script>
    <script type="text/javascript" src="../owlcarousel/dist/owl.carousel.min.js"></script>
</body>

</html>