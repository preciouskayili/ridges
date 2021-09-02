<?php include "controllers/addController.php";?>
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
    <title>Add Produce || Ridges</title>
</head>
<body class="bg-light">
    <div class="container mt-5 pt-5">
        <div class="card">
            <?php echo $invalidImage; ?>
            <?php echo $formErrors; ?>
            <div class="card-header" style="background-color: transparent;">
                <h3 class="card-title">Add produce</h3>
            </div>
            <div class="card-body">
                <form action="add.php" method="post" enctype="multipart/form-data">
                    <label for="imgUpload">Upload image</label>
                    <div class="md-form">
                        <input type="file" name="upload" id="image" class="form-control" style="padding: 10px;" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form">
                                <label for="title">Title</label>
                                <input type="text" value="<?php echo $title; ?>" name="title" id="title" class="form-control" autocomplete="off">
                                <p class="text-danger"><?php echo $errors["title"]; ?></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="md-form">
                                <label for="items">Number of items</label>
                                <input type="number" value="<?php echo $items; ?>" name="items" id="items" min="1" class="form-control" autocomplete="off">
                                <p class="text-danger"><?php echo $errors["items"]; ?></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="md-form">
                                <label for="items">Price</label>
                                <input type="number" min="1" value="<?php echo $price; ?>" name="price" id="price" class="form-control" autocomplete="off">
                                <p class="text-danger"><?php echo $errors["price"]; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form">
                                <label for="items">Description</label>
                                <input type="text" value="<?php echo $description; ?>" name="description" id="description" class="form-control" autocomplete="off">
                                <p class="text-danger"><?php echo $errors["description"]; ?></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="md-form">
                                <!-- <label for="items">Category</label> -->
                                <select class="form-control" name="category" required>
                                    <option disabled selected>Category</option>
                                    <option>Vegetables</option>
                                    <option>Grains</option>
                                    <option>Fruits</option>
                                    <option>Farm implements</option>
                                    <option>Tubers</option>
                                </select>
                                <p class="text-danger"><?php echo $errors["category"]; ?></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="md-form">
                                <!-- <label for="items">Category</label> -->
                                <select class="form-control" name="unit" required>
                                    <option disabled selected>Unit</option>
                                    <option>Bags</option>
                                    <option>Baskets</option>
                                    <option>Pieces</option>
                                    <option>Rubber</option>
                                </select>
                                <p class="text-danger"><?php echo $errors["unit"]; ?></p>
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/mdb.min.js"></script>
    <script type="text/javascript" src="../node_modules/mdbootstrap/js/script.js"></script>
</body>
</html>