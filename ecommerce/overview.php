<?php setlocale(LC_ALL, "US");?>
<?php include "relatedProducts.php";?>
<?php include "controllers/overviewController.php";?>
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
	<style>
        input {
            color: white !important;
        }
    </style>
	<!-- Navbar -->
	<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">

		<a class="navbar-brand" href="#!">
			<img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="30" alt="mdb logo">
		</a>

		<!-- Collapse button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav1"
			aria-controls="basicExampleNav1" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fa fa-align-center"></i>
		</button>

		<div class="col-md-6">
			<div class="flex-center">
				<div class="row">
					<div class="col-md-9">
						<div class="md-form" style="margin: 0px;">
							<input type="text" class="form-control" placeholder="Search">
						</div>
					</div>
					<div class="col-md-3">
						<button class="btn btn-white btn-outline-white btn-md"><i class="fa fa-search"></i>
							</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Links -->
		<div class="collapse navbar-collapse" id="basicExampleNav1">

			<!-- Right -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="../cart.php" class="nav-link navbar-link-2 waves-effect">
						<span class="badge badge-pill red"><?php $hide = (isset($_SESSION["cart"])) ? count($_SESSION["cart"]) : "0";
echo $hide;?></span>
						<i class="fas fa-shopping-cart pl-0"></i>
					</a>
				</li>

				</li>
				<li class="nav-item">
					<a href="mart.php" class="nav-link waves-effect">
						Shop
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link waves-effect">
						Help
					</a>
				</li>
				<li class="nav-item">
					<a href="#!" class="nav-link waves-effect">
						Sign in
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-user-circle"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink-333">
						<a class="dropdown-item" href="#!">Action</a>
						<a class="dropdown-item" href="#!">Another action</a>
						<a class="dropdown-item" href="#!">Something else here</a>
					</div>
				</li>
			</ul>

		</div>
		<!-- Links -->

	</nav>

	<!-- Navbar -->
	<div class="container mt-5">
		<!-- Classic tabs -->

		<div class="view overlay z-depth-1 rounded mb-3 mb-md-0">
			<img style="height: 600px;" class="img-fluid w-100"
				src="../image/<?php echo $description[0]["img_path"] ?>"
				alt="Sample">
		</div>

		<div class="classic-tabs border rounded px-4 pt-1">
			<ul class="nav tabs-primary nav-justified" id="advancedTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link text-dark active show" id="description-tab" data-toggle="tab" href="#description"
						role="tab" aria-controls="description" aria-selected="true">Description</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info"
						aria-selected="false">Information</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-dark" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
						aria-controls="reviews" aria-selected="false">Reviews (1)</a>
				</li>
			</ul>
			<hr>
			<div class="tab-content" id="advancedTabContent">
				<div class="tab-pane fade show active container-fluid" id="description" role="tabpanel"
					aria-labelledby="description-tab">
					<h5><?php echo $description[0]["title"] ?></h5>
					<p class="small text-muted text-uppercase mb-2"><?php echo $description[0]["category"] ?></p>
					<h6><?php echo $description[0]["price"] ?></h6>
					<p class="pt-1"><?php echo $description[0]["description"]; ?></p>
					<a href="./controllers/addToCart.php?id=<?php echo $id; ?>&img_path=<?php echo $description[0]["img_path"] ?>&title=<?php echo $description[0]["title"]; ?>&category=<?php echo $description[0]["category"]; ?>&price=<?php echo $description[0]["price"]; ?>&unit=<?php echo $description[0]["unit"]; ?>&number_of_items=<?php echo $description[0]["number_of_items"]; ?>" class="btn btn-primary rounded"><i class="fas fa-cart-plus"></i></a>
				</div>
				<div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
					<h5>Additional Information</h5>
					<table class="table table-striped table-bordered mt-3">
						<thead>
							<tr>
								<th scope="row" class="w-150 dark-grey-text h6"><?php echo $description[0]["unit"]; ?> available</th>
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
					<h5><span>1</span> review for <span><?php echo $description[0]["title"]; ?></span></h5>
					<div class="media mt-3 mb-4">
						<img class="d-flex mr-3 z-depth-1"
							src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" width="62"
							alt="Generic placeholder image">
						<div class="media-body">
							<div class="d-sm-flex justify-content-between">
								<p class="mt-1 mb-2">
									<strong>Marthasteward </strong>
									<span>– </span><span>January 28, 2020</span>
								</p>
							</div>
							<p class="mb-0">Nice one, love it!</p>
						</div>
					</div>
					<hr>
					<h5 class="mt-4">Add a review</h5>
					<p>Your email address will not be published.</p>
					<div>
						<!-- Your review -->
						<div class="md-form md-outline">
							<textarea id="form76" class="md-textarea form-control pr-6" rows="4"></textarea>
							<label for="form76">Your review</label>
						</div>
						<!-- Name -->
						<div class="md-form md-outline">
							<input type="text" id="form75" class="form-control pr-6">
							<label for="form75">Name</label>
						</div>
						<!-- Email -->
						<div class="md-form md-outline">
							<input type="email" id="form77" class="form-control pr-6">
							<label for="form77">Email</label>
						</div>
						<div class="text-right pb-2">
							<button type="button" class="btn btn-primary">Add a review</button>
						</div>
					</div>
				</div>
			</div>


		</div>
		<!-- Classic tabs -->
		<!--Section: Block Content-->
		<div class="container mt-5 d-block ml-auto">
			<h3 class="mb-4">Related products</h3>
			<section class="text-center">

				<!-- Grid row -->
				<div class="row">

				<?php foreach ($relatedProducts as $related): ?>
				  <!-- Grid column -->
				  <div class="col-md-6 col-lg-3 mb-5">

					<!-- Card -->
					<div class="">

					  <div class="view overlay z-depth-2 rounded">
						  <a href="overview.php?id=<?php echo $related["id"]; ?>">
							  <img style="height: 250px;" class="img-fluid w-100"
								src="../image/<?php echo $related["img_path"]; ?>" alt="Sample">
							</div>
						  </a>

					  <div class="pt-4">

						<h5><?php echo $related["title"]; ?></h5>
						<h6><?php echo $related["price"]; ?></h6>
					  </div>

					</div>
					<!-- Card -->

				  </div>
				  <!-- Grid column -->
				<?php endforeach;?>
				</div>
				<!-- Grid row -->

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