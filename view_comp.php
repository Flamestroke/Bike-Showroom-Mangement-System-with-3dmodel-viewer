<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: login.php");
    exit;
}
include 'partials/_dbconnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>View Companies</title>
    <link rel="stylesheet" href="boot/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="boot/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="boot/css/baguetteBox.min.css">
    <link rel="stylesheet" href="boot/css/Navbar-Right-Links-Dark-icons.css">
    <link rel="stylesheet" href="boot/css/Swiper-Slider-Card-For-Blog-Or-Product-swiper.min.css">
    <link rel="stylesheet" href="boot/css/Swiper-Slider-Card-For-Blog-Or-Product-untitled.css">
    <link rel="stylesheet" href="boot/css/untitled-1.css">
    <link rel="stylesheet" href="boot/css/untitled.css">
    <link rel="stylesheet" href="boot/css/vanilla-zoom.min.css">
</head>
  <body>
  <?php require 'partials/_navcust.php' ?>
  
  <section class="py-5" style="background: linear-gradient(#212529 0%, #ff6000 99%);">
        <div class="container py-5" style="background: #d6d6d6;">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold" style="color: #ff6000;">Partners working with us</h2>
                    <p class="text-muted">50+ companies are listed on the website and it is growing day by day</p>
                </div>
            </div>
            <div class="col" style="max-width: 1100px;margin-top: -20px; margin:auto;">
                <div class="col">
                    <div class=" table table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                                    <th id="comp_logo" style="border-width: 0px;"></th>
                                    <th id="comp_name" style="border-width: 0px;"></th>
                                    <th id="comp_email" style="border-width: 0px;"></th>
                                    <th id="comp_bike_count" style="border-width: 0px;"></th>
                                    <th id="comp_desc" style="border-width: 0px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                              $sql = "SELECT * FROM `company`";
                              $result = mysqli_query($conn, $sql);
                              while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>
                                <td width='35%'style='border-width: 0px;border-color: rgb(255,255,255);'><img class='rounded img-fluid shadow w-100 fit-cover' style='height: 180px;' src='images/".$row['cmp_logo']."'></td>
                                <td class='fw-bold' style='width: 300px;color: #ff6000;border-width: 0px;font-size: 15px;'>". $row['cmp_name'] . "</td>
                                <td width='20%'style='color: #000000;border-width: 0px;font-size: 13px;'>". $row['cmp_desc'] . "</td>
                                <td style='width: 300px;border-width: 0px;font-weight: bold;'>". $row['no_of_bikes'] . "</td>
                                </tr>";
                             } 
                               ?>                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="boot/bootstrap/js/bootstrap.min.js"></script>
    <script src="boot/js/bs-init.js"></script>
    <script src="boot/js/baguetteBox.min.js"></script>
    <script src="boot/js/vanilla-zoom.js"></script>
    <script src="boot/js/theme.js"></script>
    <script src="boot/js/Swiper-Slider-Card-For-Blog-Or-Product-swiper.min.js"></script>
</body>

</html>