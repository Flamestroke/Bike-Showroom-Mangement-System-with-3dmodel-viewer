<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

if($_SESSION['username']=='admin'){
  header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Welcome <?php echo $_SESSION['username']?></title>
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
<body style="background: url(&quot;boot/img/hehe.gif&quot;) center / cover repeat, rgb(33,37,41);color: #ff6000;">
  <?php require 'partials/_navcust.php' ?>
    <div class="container">
    <h4 class= "text-center my-4" style ="display: flex;flex-direction: column;align-items: center;padding: 15px;" >Hey there, <?php echo $_SESSION['username']?>!</h4>
    <div class="row">
    <div class="col-md-4" >
    <div class="card text-white bg-secondary mb-3 border-primary mb-3" style="width: 18rem;border-radius: 15px;box-shadow: -3px -4px 0px 1px #ff6000;border-bottom-right-radius: 0px;">
  <img src="boot/img/unsp.jpg" class="card-img-top" alt="...">
  <div class="card-body my-2">
    <h5 class="card-title">Browse your Bikes</h5>
    <p class="card-text">Have a look at your favourite bike section in 3D</p>
    <a href="view_bookbike.php" class="btn btn-primary" style="margin-left: 10px;background: #ff6000;border-bottom-right-radius: 0px;border-top-right-radius: 10px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;" >View/Book Bikes</a>
  </div>
</div>
</div>

<div class="col-md-4">
    <div class="card text-white bg-secondary mb-3 border-primary mb-3" style="width: 18rem;border-radius: 15px;box-shadow: 0px 0px 0px 4px #ff6000;border-bottom-right-radius: 15px;">
  <img src="boot/img/usnpalsh.jpg" class="card-img-top" alt="...">
  <div class="card-body my-2">
    <h5 class="card-title">Our Partners</h5>
    <p class="card-text">50+ Companies ready to make a deal</p>
    <a href="view_comp.php" class="btn btn-primary" style="margin-left: 10px;background: #ff6000;border-bottom-right-radius: 0px;border-top-right-radius: 10px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;" >View Companies</a>
  </div>
</div>
</div>

<div class="col-md-4">
    <div class="card text-white bg-secondary mb-3 border-primary mb-3" style="width: 18rem;border-radius: 15px;box-shadow: 3px -4px 0px 1px #ff6000;border-bottom-left-radius: 0px;">
  <img src="boot/img/unspla.jpg" class="card-img-top" alt="...">
  <div class="card-body my-2">
    <h5 class="card-title">Track your Bookings</h5>
    <p class="card-text">View the Bike Bookings done by you</p>
    <a href="yourbookings.php" class="btn btn-primary" style="margin-left: 10px;background: #ff6000;border-bottom-right-radius: 0px;border-top-right-radius: 10px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;" >Track</a>
  </div>
</div>
</div>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/Swiper-Slider-Card-For-Blog-Or-Product-swiper.min.js"></script>
</body>

</html>