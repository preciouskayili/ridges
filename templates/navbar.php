<style>
	::placeholder {
		color: #a7afb7!important
;
	}
	.btn-primary {
		background-color: #3f51b5 !important;
	}
</style>
<!-- Navbar -->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #3f51b5 !important;">

	<a class="navbar-brand" href="#!">
		Ridges
	</a>

	<!-- Collapse button -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav1"
		aria-controls="basicExampleNav1" aria-expanded="false" aria-label="Toggle navigation">
		<i class="fa fa-align-center"></i>
	</button>


	<!-- Links -->
	<div class="collapse navbar-collapse" id="basicExampleNav1">
		<!-- Left -->
		<ul class="navbar-nav mr-auto">

			<li class="nav-item">
				<a href="mart.php" class="nav-link waves-effect">
					Shop
				</a>
			</li>
			<li class="nav-item">
				<a href="#!" class="nav-link waves-effect">
					Help
				</a>
			</li>
			<?php if (isset($_SESSION["email"])): ?>
			<li class="nav-item">
				<a href="add.php" class="nav-link waves-effect">
					<i class="fa fa-plus"></i> Add item
				</a>
			</li>
			<?php else:echo "";endif;?>
		</ul>
		<!-- Links -->
		<ul class="navbar-nav mx-auto">
			<form action="../ecommerce/mart.php" method="POST" class="m-0 form-inline">
					<div class="md-form md-outline m-0 w-100">
						<input name="keywords" placeholder="Keywords" autocomplete="off" type="text" id="form77" style="background-color: rgba(0, 0, 0, 0.2); border: none; color: white;" class="form-control m-0">
						<select name="category" type="text" id="form77" style="background-color: rgba(0, 0, 0, 0.2); border: none; color: white;" class="form-control m-0 p-2 rounded">
							<option disabled selected>Category</option>
							<option>Tubers</option>
							<option>Vegetables</option>
							<option>Fruits</option>
							<option>Photosynthesis</option>
						</select>
						<button name="search" class="btn btn-sm rounded btn-outline-white" style="background-color: #3F51B5;">&copy;</button>
					</div>
			</form>
		</ul>
		<!-- Right -->
		<ul class="navbar-nav ml-auto">
			<li>

			</li>
			<li class="nav-item">
				<a href="cart.php" class="nav-link navbar-link-2 waves-effect">
					<span class="badge badge-pill red"><?php $hide = (isset($_SESSION["cart"])) ? count($_SESSION["cart"]) : "0";
echo $hide;?></span>
					<i class="fas fa-shopping-cart pl-0"></i>
				</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user-circle"></i>
					<?php if (isset($_SESSION["email"])) {echo $_SESSION["email"];} else {echo "";}?>
				</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink-333">
					<a class="dropdown-item" href="#!">Action</a>
					<a class="dropdown-item" href="#!">Another action</a>
					<a class="dropdown-item" href="#!">Something else here</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
<!-- Navbar -->