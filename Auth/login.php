<?php 
    session_start();
?>
<?php include "./middleware/loginFormController.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login || Ridges</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<script>
    const showPassword = () => {

        const password = document.getElementById("password")

        if(password.type === 'text') {
            password.type = 'password'
        } else {
            password.type = 'text'
        }
    }
</script>
<body>

    <div class="main">
        <!-- Sign in  Form -->
        <section class="sign-in">
            <div class="container" style="margin-top: 10px">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sign up"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2>
                        <small style="color: red"><?php echo $invalid ?></small>
                        <form method="POST" action="./login.php" autocomplete="off" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input value="<?php echo $username ?>" type="text" name="username" id="username" placeholder="Your Username"/>
                            </div>
                            <small><?php echo $errors['username'] ?></small>
                            <div class="form-group d-flex">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <small><?php echo $errors['password'] ?></small>
                            <div class="form-group">
                                <input type="checkbox" onclick="showPassword()" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span></span>Show Password</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                            <a href="./signup.php" class="signup-image-link">Create an account</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>