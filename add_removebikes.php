<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}

if ($_SESSION['username'] != 'admin') {
  header("location: login.php");
  exit;
}
?>
<?php
$showAlert = false;
$showError = false;
include 'partials/_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get image name
  $image = $_FILES['image']['name'];
  // image file directory
  $target = "images/" . basename($image);

  $bikename = $_POST["bikename"];
  $compname = $_POST["company"];
  $type = $_POST["biketype"];
  $avail = $_POST["avail"];
  $bikeno = $_POST["bikeno"];
  $price = $_POST["price"];
  $sql = "INSERT INTO `bikes`(`bike_photo`,`bike_no`,`type`,`bike_name`,`availability`,`company`,`price`) VALUES ('$image','$bikeno','$type','$bikename','$avail','$compname','$price')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $showAlert = true;
  } else {
    $showError = true;
  }
  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
  } else {
    $msg = "Failed to upload image";
  }
}
$del = false;
if (isset($_GET['delete'])) {
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `bikes` WHERE `bike_no` = '$sno'";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    $del = true;
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,500&display=swap" rel="stylesheet">
  <title>Add/Remove Bikes</title>
  <style>
    .form-control {
      border-radius: 25px;
    }

    .btn {
      border-radius: 25px;
    }

    body {
      font-family: 'Poppins', sans-serif;
           
           background: linear-gradient(#212529 0%, #ff6000 99%);

      /* Full height */
      height: 100%;

      /* Center and scale the image nicely */
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;

    }

    img {
      float: left;
      margin: 5px;
      width: 230px;
      height: 150px;
    }
  </style>
</head>

<body>
  <?php require 'partials/_nav.php' ?>
  <?php
  if ($del) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Bike information deleted successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>';
  }

  if ($showError) {
    if(isset($_SESSION['status'])){
    echo $_SESSION['status'];
    unset ($_SESSION['status']);
    ?>
    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> Bike Number already exists or the Company is not available  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
   </button>
   </div>';
   <?php
  }}

  if ($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong>Bike information added successfully.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
   </button>
   </div>';
  }
  ?>

  <h3 class="text-center my-4" style="color:aliceblue;">Add Bike information</h3>
  <div class="container my-4">
    <form action="/Bike Showroom/add_removebikes.php" method="post" style="display: flex;
    flex-direction: column;
    color:aliceblue;
    align-items: center;
    padding:15px" enctype="multipart/form-data">
      <div class="form-group col-md-6">
        <label for="bikename">Bike Name</label>
        <input type="text" class="form-control" id="bikename" name="bikename" maxlength="20">
      </div>
      <div class="form-group col-md-6">
        <label for="company">Bike Company</label>
        <input type="text" class="form-control" id="company" name="company" maxlength="20">
      </div>
      <div class="form-group col-md-6">
        <label for="biketype">Bike Type</label>
        <input type="text" class="form-control" id="biketype" name="biketype" maxlength="20">
      </div>
      <div class="form-group col-md-6">
        <label for="bikeno">Bike Number</label>
        <input type="text" class="form-control" id="bikeno" aria-describedby="emailHelp" name="bikeno" maxlength="20">
      </div>
      <div class="form-group col-md-6">
        <label for="avail">Availability</label>
        <input type="text" class="form-control" id="avail" name="avail" maxlength="20">
      </div>
      <div class="form-group col-md-6">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" name="price" maxlength="20">
      </div>
      <div class="form-group col-md-6">
        <input type="hidden" name="size" value="1000000" class="form-control">
        <div class="form-group col-md-6">
          <label for="exampleFormControlTextarea1">Bike Photo</label>
          <input type="file" name="image">
        </div>
      </div>

      <button type="submit" class="btn btn-primary col-md-1" style='background: #3b3a3a;color: #ff6000;'>Submit</button>
    </form>
  </div>



  <section class="py-5" style="background: linear-gradient(#212529 0%, #ff6000 99%);">
        <div class="container py-5" style="background: #d6d6d6;">
        <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold" style="color: #ff6000;">Available Bike Details</h2>
                </div>
            </div>
            <div class="col" style="max-width: 1100px;margin-top: -20px; margin:auto;">
                <div class="col">
                    <div class=" table table-responsive">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">Bike Photo</th>
          <th scope="col">Bike Name</th>
          <th scope="col">Company</th>
          <th scope="col">Type</th>
          <th scope="col">Bike Number</th>
          <th scope="col">Availability</th>
          <th scope="col">Price</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $sql = "SELECT * FROM `bikes`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
            <td> <img src='images/" . $row['bike_photo'] . "' > </td>
            <td>" . $row['bike_name'] . "</td>
            <td>" . $row['company'] . "</td>
            <td>" . $row['type'] . "</td>
            <td>" . $row['bike_no'] . "</td>
            <td>" . $row['availability'] . "</td>
            <td>" . $row['price'] . "</td>
            <td> <button class='delete btn btn-sm btn-primary' style='background: #3b3a3a;color: #ff6000;' id=d" . $row['bike_no'] . ">Delete</button>  </td>
          </tr>";
        }
        ?>
                   </tbody>
                        </table>
                    </div>
                </div>
            </div>
    <a href="welcome_admin.php" class="btn btn-primary" style="background: var(--bs-orange);">Back</a>
        </div>
    </section>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable();

    });
  </script>

  <script>
    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to remove this bike!?")) {
          console.log("yes");
          window.location = `/Bike Showroom/add_removebikes.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        } else {
          console.log("no");
        }
      })
    })
  </script>
  <script src="boot/bootstrap/js/bootstrap.min.js"></script>
    <script src="boot/js/bs-init.js"></script>
    <script src="boot/js/baguetteBox.min.js"></script>
    <script src="boot/js/vanilla-zoom.js"></script>
    <script src="boot/js/theme.js"></script>
    <script src="boot/js/Swiper-Slider-Card-For-Blog-Or-Product-swiper.min.js"></script>
</body>

</html>