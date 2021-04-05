<?php include("./middleware/createStoreHandler.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create Store</title>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/style.css">

	<style>
		.form-border .form-control {
			border: 2px solid #bdbdbd !important;
			outline: none !important;
		}
		.form-border:active {
			border: 2px solid #1266f1;
			outline: none !important;
		}
		label {
			color: #7c7c7c;
		}
		*,*:focus,*:hover{
			outline:none !important;
			-webkit-appearance: none !important;
		}
		.form-border:focus {
			border: 2px solid #1266f1;
			outline: none !important;
		}
	</style>
</head>
<body class="bg-light">
	<?php include "../templates/navbar.php";?>

	<div class="container-fluid bg-primary p-5 text-white text-center">
		<h5>Create a store</h5>
	</div>

	<div class="container-fluid" style="margin-top: -2rem;">
		<div class="col-md-9 d-block mx-auto">
			<div class="card">
				<div class="card-body">
					<p class="card-title">Fill out your store details:</p>

					<form action="./createStore.php" method="post">
						<label for="storeName">Store Name</label>
						<input value="<?php echo $store_name; ?>" required style="outline: none" id="storeName" class="form-border form-control mb-3" placeholder="e.g Nigerian Agro" type="text" name="store-name">

						<label for="phoneNumber">Phone number</label>
						<p class="text-warning"><?php echo $error["phone"]; ?></p>
						<input value="<?php echo $phone; ?>" required class="form-border form-control mb-3" type="tel" placeholder="e.g +234 ... ...." name="phone-number" id="phoneNumber">

						<label for="storeAddress">Store Address</label>
						<input value="<?php echo $address; ?>" required class="form-border form-control mb-3" placeholder="e.g Bukuru, Jos Nigeria" type="address" name="store-address" id="storeAddress">

						<button name="create" class="btn ml-0 rounded btn-primary">Create store</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--  SCRIPTS  -->
	<script type="text/javascript" src="../node_modules/mdbootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../node_modules/mdbootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="../node_modules/mdbootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../node_modules/mdbootstrap/js/mdb.min.js"></script>
	<script type="text/javascript" src="../node_modules/mdbootstrap/js/script.js"></script>
</body>
</html>