<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']=true){
    $loggedin = true;
}
else{
  $loggedin = false;
}

if($_SESSION['username']=='admin'){
  header("location: login.php");
    exit;
}
echo'<nav class="navbar navbar-dark navbar-expand-md bg-dark py-3">
<div class="container"><a class="navbar-brand d-flex align-items-center" href="index.php"><span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon" style="background: #ffa559;padding: 5px;"><i class="fa fa-motorcycle" style="color: #ff6000;"></i></span><span>Bikers Paradise</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5" style="color: rgb(255,96,0);"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon" style="color: rgb(255,96,0);"></span></button>
          <div class="collapse navbar-collapse" id="navcol-5">
              <ul class="navbar-nav ms-auto">
                  <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="index.php#features">Feature</a></li>
                  <li class="nav-item"><a class="nav-link" href="index.php#about">About</a></li>
                  <li class="nav-item"><a class="nav-link" href="3d.php">Visualizer</a></li>';
      
      if(!$loggedin){
      echo '</ul><a class="btn btn-primary ms-md-2" role="button" href="signup.php" style="background: var(--bs-white);border-radius: 10px;border-top-left-radius: 10px;border-bottom-right-radius: 0px;color: rgb(69,69,69);">Signup</a>
      <a class="btn btn-primary ms-md-2" role="button" href="login.php" style="background: var(--bs-orange);border-radius: 10px;border-top-left-radius: 10px;border-bottom-right-radius: 0px;">Login</a>';
    }
      if($loggedin){
        echo'</ul><a class="btn btn-primary ms-md-2" role="button" href="index.php" style="background: var(--bs-orange);border-radius: 10px;border-top-left-radius: 10px;border-bottom-right-radius: 0px;">Logout</a>
        </ul><a class="btn btn-primary ms-md-2" role="button" href="welcome_cust.php" style="background: var(--bs-white);border-radius: 10px;border-top-left-radius: 10px;border-bottom-right-radius: 0px;color: rgb(69,69,69);">Back</a>';
      }
      
    
  echo'</div>
</nav>';

?>