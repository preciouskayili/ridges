
<!-- Navbar -->
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">

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
			<?php if(isset($_SESSION["email"])): ?>
			<li class="nav-item">
				<a href="add.php" class="nav-link waves-effect">
					<i class="fa fa-plus"></i> Add item
				</a>
			</li>
			<?php else: echo ""; endif; ?>
		</ul>
		<!-- Links -->
		<!-- Right -->
		<ul class="navbar-nav ml-auto">
			<li>
				<div class="form-inline">
					<div class="md-form text-white" style="margin: 0px;">
						<label>Search</label>
						<input type="text" class="form-control text-white" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
					</div>
					<button type="button" class="btn btn-primary btn-sm" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px;">
						Search
					</button>
				</div>
			</li>
			<li class="nav-item">
				<a href="cart.php" class="nav-link navbar-link-2 waves-effect">
					<span class="badge badge-pill red"><?php $hide = (isset($_SESSION["cart"])) ? count($_SESSION["cart"]) : "0"; echo $hide;?></span>
					<i class="fas fa-shopping-cart pl-0"></i>
				</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
					aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-user-circle"></i>
					<?php if(isset($_SESSION["email"])) { echo $_SESSION["email"]; } else { echo ""; } ?>
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