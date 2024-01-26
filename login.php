<?php
$login = false;
$showError = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "Select * from customer where c_username ='$username' AND c_password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: welcome_cust.php");
    } else {
        $showError = "Invalid credentials";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "Select * from admin where a_username ='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: welcome_admin.php");
    } else {
        $showError = "Invalid credentials";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="boot/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="boot/css/baguetteBox.min.css">
    <link rel="stylesheet" href="boot/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="boot/css/Swiper-Slider-Card-For-Blog-Or-Product-swiper.min.css">
    <link rel="stylesheet" href="boot/css/Swiper-Slider-Card-For-Blog-Or-Product-untitled.css">
    <link rel="stylesheet" href="boot/css/untitled.css">
    <link rel="stylesheet" href="boot/css/vanilla-zoom.min.css">
</head>

<body>
    <?php require 'partials/_nav.php' ?>

    <?php
    if ($login) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success.</strong> You are now logged in.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
    }

    if ($showError) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error.</strong> ' . $showError . '
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';
    }
    ?>
    <main class="page login-page">
        <section class="clean-block clean-form dark" style="background: rgb(49,49,49);">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Log In</h2>
                </div>
                <form action="/Bike Showroom/login.php" method="post" style="border-radius: 15px;box-shadow: -3px -4px 0px 1px #ff6000;border-bottom-right-radius: 0px;">
                    <div class="mb-3"><label class="form-label" for="username">Username</label><input class="form-control" type="username" id="username" name="username"></div>
                    <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control" type="password" id="password" name="password" required></div>
                    <div class="mb-3">
                    </div><button type="submit" class="btn btn-primary" style="background: #ff6000;border-top-left-radius: 10px;border-top-right-radius: 10px;border-bottom-right-radius: 0px;border-bottom-left-radius: 10px;">Log In</button>
                </form>
            </div>
        </section>
    </main>
    <footer class="page-footer dark">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h5 style="color: #ff6000;">Get started</h5>
                    <ul>
                        <li><a href="#" style="color: #ffa559;">Home</a></li>
                        <li><a href="#" style="color: #ffc696;">Sign up</a></li>
                        <li><a href="#" style="color: #ffe6c7;">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5 style="color: #ff6000;">About us</h5>
                    <ul>
                        <li><a href="#" style="color: #ffa559;">Company Information</a></li>
                        <li><a href="#" style="color: #ffc696;">Contact us</a></li>
                        <li><a href="#" style="color: #ffe6c7;">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5 style="color: #ff6000;">Support</h5>
                    <ul>
                        <li><a href="#" style="color: #ffa559;">FAQ</a></li>
                        <li><a href="#" style="color: #ffc696;">Help desk</a></li>
                        <li><a href="#" style="color: #ffe6c7;">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <h5 style="color: #ff6000;">Legal</h5>
                    <ul>
                        <li><a href="#" style="color: #ffa559;">Terms of Service</a></li>
                        <li><a href="#" style="color: #ffc696;">Terms of Use</a></li>
                        <li><a href="#" style="color: #ffe6c7;">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2023 Copyright Text</p>
        </div>
    </footer>
    <script src="boot/bootstrap/js/bootstrap.min.js"></script>
    <script src="boot/js/bs-init.js"></script>
    <script src="boot/js/baguetteBox.min.js"></script>
    <script src="boot/js/vanilla-zoom.js"></script>
    <script src="boot/js/theme.js"></script>
    <script src="boot/js/Swiper-Slider-Card-For-Blog-Or-Product-swiper.min.js"></script>
</body>

</html>