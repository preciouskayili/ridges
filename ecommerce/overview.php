<?php setlocale(LC_ALL, "US");?>
<?php include "relatedProducts.php";?>
<?php include "controllers/overviewController.php";?>
<?php
session_start();
$foreign_key = $description[0]["id"];
$sql = "SELECT * FROM review WHERE product_id='$foreign_key' ORDER BY created_at DESC";
$result = $conn->query($sql);
$reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (isset($_POST["add_review"])) {
    $name = $_SESSION["username"];
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $review = mysqli_real_escape_string($conn, $_POST["review"]);
    $product_id = $description[0]["id"];
    $sql2 = "INSERT INTO review(name,email,review,product_id) VALUES('$name','$email','$review','$product_id')";
    if ($conn->query($sql2)) {
        header('Location: overview.php' . "?id=" . $description[0]["id"]);
    }
}

if(!isset($_GET["id"])) {
    header('Location: mart.php');
} // else: Stay on the page
if(empty($_GET["id"])) {
    header('Location: mart.php');
} // else: stay on the page
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
    <style>
        .header {
            min-height: 100vh;
            overflow: hidden;
        }

        .header.row {
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
	<?php include "../templates/navbar.php";?>
    <!-- Navbar -->
    <div class="header bg-dark" style="display: flex; align-items: center; justify-content: center">
        <div class="col-md-11 col-sm-12">
            <div class="row">
                <div class="col-md-7 col-sm-12 mb-sm-3">
                    <img class="img-fluid w-100" src="../image/<?php echo $description[0]["img_path"] ?>"
                        alt="Sample">
                </div>
                <div class="col-md-5 my-auto">
                    <h2 class="font-weight-bold text-white"><?php echo $description[0]["title"]; ?></h2>
                    <p class="text-white font-weight-bold">NGN <?php echo $description[0]["price"]; ?></p>
                    <form action="overview.php">
                        <input name="quantity" id="num_items"  
                            type="number" 
                            class="form-control w-25 mt-3 mb-2" 
                            placeholder="Quantity"
                            min="1"
                            required
                            style="
                                background-color: rgba(256, 256, 256, 0.1); 
                                backdrop-filter: blur(2rem); 
                                border: none; color: white;" 
                            class="form-control m-0"
                            value="1"
                            max="<?php echo $description[0]['number_of_items']; ?>" 
                        />
                    </form>
                    <small class="text-white font-weight-bold">Unit: 
                    <?php 
                        echo $description[0]["unit"];
                    ?></small>
                    <p class="text-white text-justify">
                        <?php
                            echo $description[0]["description"]
                        ?>
                    </p>

                    <button id="addBtn" class="btn w-100 btn-warning" style="border-radius: 0px">
                        <i class="fas fa-shopping-cart" style="margin-right: 10px"></i>Add To Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
                        
    <!--Section: Block Content-->
    <div class="container mt-5 ml-auto" style="display: <?php if(empty($relatedProducts)) {
        echo "none";
    } else {
        echo "block";
    } ?>">
        <h3 class="mb-4">Related products</h3>
        <section class="text-center mb-4">
            <!-- Card -->
            <div class="owl-carousel">
                <?php foreach ($relatedProducts as $related): ?>
                <div class="card">
                    <div class="view overlay shadow rounded">
                        <a href="overview.php?id=<?php echo $related["id"]; ?>">
                            <img style="height: 250px;" class="img-fluid w-100 rounded"
                                src="../image/<?php echo $related["img_path"]; ?>" alt="Sample">
                        </a>
                    </div>
                    <div class="pt-4">
                        <h5><?php echo $related["title"]; ?></h5>
                        <h6>NGN <?php echo $related["price"]; ?></h6>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <!-- Card -->
        </section>
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
            margin: 20,
            loop: false,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 3,
                    nav: false
                }
            }
        });
    });
    </script>
    <script type="text/javascript" src="../mdbootstrap/js/mdb.min.js"></script>
    <script type="text/javascript" src="../mdbootstrap/js/script.js"></script>
    <script type="text/javascript" src="../owlcarousel/dist/owl.carousel.min.js"></script>
    <script type="text/javascript" src="./js/cart.js"></script>
    <script>
        const addButton = $("#addBtn");
        let numberOfItems;
        $('#num_items').on('change', function(e) {
            numberOfItems = parseInt(e.target.value);
            console.log(numberOfItems);
        })
        addButton.on('click', function() {
            console.log(typeof numberOfItems);
            if(numberOfItems < 1) {
                console.log("Error dey");
            } else {
                cartLS.add({
                    id: <?php echo $description[0]["id"] ?>, 
                    name: "<?php echo $description[0]["title"] ?>", 
                    price: <?php echo $description[0]["price"] ?>,
                }, numberOfItems)
            }
        })
    </script>
</body>

</html>