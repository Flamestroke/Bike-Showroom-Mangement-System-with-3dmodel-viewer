<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}

if($_SESSION['username']!='admin'){
  header("location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Welcome Admin</title>
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
  <body style="background: url(boot/img/nene.gif) center / cover repeat, rgb(33,37,41);color: #ff6000 ;">
  <?php require 'partials/_nav.php' ?>
  <div class="container">
  <h4 class= "text-center my-4" style ="display: flex;flex-direction: column;align-items: center;padding: 15px;" >Hey there, Admin!</h4>
    <div class="row">
    <div class="col-md-4" >
    <div class="card text-white bg-secondary mb-3 border-primary mb-3" style="width: 18rem;border-radius: 15px;box-shadow: -3px -4px 0px 1px #ff6000;border-bottom-right-radius: 0px;">
  <img src="boot/img/unsp.jpg" class="card-img-top" alt="...">
  <div class="card-body my-2">
    <h5 class="card-title">Add new Bikes</h5>
    <p class="card-text">Add new Bikes to the Site</p>
    <a href="add_removebikes.php" class="btn btn-primary" style="margin-left: 10px;background: #ff6000;border-bottom-right-radius: 0px;border-top-right-radius: 10px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;" >Add/Remove Bikes</a>
  </div>
</div>
</div>

<div class="col-md-4">
    <div class="card text-white bg-secondary mb-3 border-primary mb-3" style="width: 18rem;border-radius: 15px;box-shadow: 0px 0px 0px 4px #ff6000;border-bottom-right-radius: 15px;">
  <img src="boot/img/usnpalsh.jpg" class="card-img-top" alt="...">
  <div class="card-body my-2">
    <h5 class="card-title">Add Partners</h5>
    <p class="card-text">Add new Company Partners</p>
    <a href="add_removecomp.php" class="btn btn-primary" style="margin-left: 10px;background: #ff6000;border-bottom-right-radius: 0px;border-top-right-radius: 10px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;" >Add/Remove Companies</a>
  </div>
</div>
</div>

<div class="col-md-4">
    <div class="card text-white bg-secondary mb-3 border-primary mb-3" style="width: 18rem;border-radius: 15px;box-shadow: 3px -4px 0px 1px #ff6000;border-bottom-left-radius: 0px;">
  <img src="boot/img/book.jpg" class="card-img-top" alt="...">
  <div class="card-body my-2">
    <h5 class="card-title">Customer Bookings</h5>
    <p class="card-text">View Customer Bike Bookings</p>
    <a href="cust_bookings.php" class="btn btn-primary" style="margin-left: 10px;background: #ff6000;border-bottom-right-radius: 0px;border-top-right-radius: 10px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;" >View Bookings</a>
  </div>
</div>
</div>
    </div>
    </div>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="boot/bootstrap/js/bootstrap.min.js"></script>
    <script src="boot/js/bs-init.js"></script>
    <script src="boot/js/baguetteBox.min.js"></script>
    <script src="boot/js/vanilla-zoom.js"></script>
    <script src="boot/js/theme.js"></script>
    <script src="boot/js/Swiper-Slider-Card-For-Blog-Or-Product-swiper.min.js"></script>

  </body>
</html>