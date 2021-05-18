<?php include("middleware/loginFormController.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | Ridges</title>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../node_modules/mdbootstrap/css/style.css">

  <style>

        html,
        body,
        header,
        .view {
          height: 100vh;
        }

        @media (max-width: 740px) {
          html,
          body,
          header,
          .view {
            height: 815px;
          }
        }

        @media (min-width: 800px) and (max-width: 850px) {
          html,
          body,
          header,
          .view  {
            height: 650px;
          }
        }

        .intro-2 {
            background: url("../../imgs/img1.jpg")no-repeat center center;
            background-size: cover;
        }
        .top-nav-collapse {
            background-color: #3f51b5 !important;
        }
        .navbar:not(.top-nav-collapse) {
            background: transparent !important;
        }
        @media (max-width: 768px) {
            .navbar:not(.top-nav-collapse) {
                background: #3f51b5 !important;
            }
        }
        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #3f51b5!important;
            }
        }

        .card {
            background-color: rgba(229, 228, 255, 0.2);
        }
        .md-form label {
            color: #ffffff;
        }
        h6 {
            line-height: 1.7;
        }


        .card {
            margin-top: 30px;
            /*margin-bottom: -45px;*/

        }

        .md-form input[type=text]:focus:not([readonly]),
        .md-form input[type=password]:focus:not([readonly]) {
            border-bottom: 1px solid #8EDEF8;
            box-shadow: 0 1px 0 0 #8EDEF8;
        }
        .md-form input[type=text]:focus:not([readonly])+label,
        .md-form input[type=password]:focus:not([readonly])+label {
            color: #8EDEF8;
        }

        .md-form .form-control {
            color: #fff;
        }


    </style>

</head>

<body>


  <!--Main Navigation-->
  <header>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
      <div class="container">
        <a class="navbar-brand" href="#"><strong>MDB</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7"
          aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../../../index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">FAQs</a>
            </li>
          </ul>
          <form class="form-inline">
            <div class="md-form my-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            </div>
          </form>
        </div>
      </div>
    </nav>

    <!--Intro Section-->
    <section class="view intro-2">
		<img src="../img/anete-lusina-zwsHjakE_iI-unsplash.jpg" style="background-position: 50% 50%" alt="">
      <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

              <!--Form with header-->
              <div class="card wow fadeIn" data-wow-delay="0.3s">
                <div class="card-body">
                  
                  <form action="login.php" method="post">
                    <!--Header-->
                    <div class="form-header purple-gradient text-center text-white" style="padding: 10px;">
                      <h3><i class="fas fa-user mt-2 mb-2"></i> Log in:</h3>
                    </div>
  
                    <!--Body-->
                    
                    <div class="md-form">
                      <i class="fas fa-envelope prefix white-text"></i>
                      <input type="text" id="orangeForm-email" name="username" class="form-control" value="<?php if(isset($_POST['username'])){
                        echo $_POST['username'];
                      } ?>">
                      <label for="orangeForm-username">Your username</label>
                      <p class="text-danger"><?php echo $invalid ?></p>
                      <p class="text-warning"><?php echo $errors['username']; ?></p>
                    </div>
  
                    <div class="md-form">
                      <i class="fas fa-lock prefix white-text"></i>
                      <input type="password" id="orangeForm-pass" name="password" class="form-control">
                      <label for="orangeForm-pass">Your password</label>
                      <p class="text-warning"><?php echo $errors['password']; ?></p>
                    </div>
  
                    <div class="text-center">
                      <button type="submit" class="btn purple-gradient btn-lg" name="submit">Login</button>
                      <p class="text-white">Don't have an account? <a href="register.php" style="text-decoration: none; color: #8EDEF8; border-bottom:1px dashed #8EDEF8;">Sign up here!</a></p>
                      <hr>
                      <div class="inline-ul text-center d-flex justify-content-center">
                        <a class="p-2 m-2 fa-lg tw-ic"><i class="fab fa-twitter white-text"></i></a>
                        <a class="p-2 m-2 fa-lg li-ic"><i class="fab fa-linkedin-in white-text"> </i></a>
                        <a class="p-2 m-2 fa-lg ins-ic"><i class="fab fa-instagram white-text"> </i></a>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
              <!--/Form with header-->

            </div>
          </div>
        </div>
      </div>
    </section>

  </header>
  <!--Main Navigation-->


	<!--  SCRIPTS  -->
	<script type="text/javascript" src="../node_modules/mdbootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../node_modules/mdbootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="../node_modules/mdbootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../node_modules/mdbootstrap/js/mdb.min.js"></script>
	<script type="text/javascript" src="../node_modules/mdbootstrap/js/script.js"></script>
</body>

</html>
