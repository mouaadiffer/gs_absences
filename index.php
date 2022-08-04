<?php include('inc/main.php');
      include('inc/admin.php');
      include('codes/config.php');
      if($adminid!=NULL)
      {
        echo"<script> window.setTimeout(function() { window.location.href = './dashboard'; }, 0);</script>";
      }
      $filename ="codes/config.php";
      if (file_exists($filename)){         
      }else{
       
          echo"<script> window.setTimeout(function() { window.location.href = './install/index'; }, 0);</script>";
      }
      ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
      Login
  </title>
  <!-- Favicon -->
  <link href="assets/img/brand/167707.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>

<body class="bg-info">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <img src="./assets/img/brand/school.png" class="navbar-brand-img" alt="..." style="max-height: 15rem;">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="../index.html">
                  <img src="assets/img/brand/blue.png" />
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="#">
                
                <span class="nav-link-inner--text"></span>
              </a>
            </li>
    
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-warning py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-3">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Bienvenue!</h1>
              <p class="text-lead text-white"> <?php echo $softwaredescrip ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">       
           
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
               Login  
              </div>
              <?php
                  if (!empty($_POST))
                  {
                      $email = mysqli_real_escape_string($conn, $_POST['email']);
                      $password = mysqli_real_escape_string($conn, $_POST['password']);
                      $rem = mysqli_real_escape_string($conn, $_POST['rem']);
                      $loginnow =  AdminLogin($conn,$email,$password,$rem);
                      if($loginnow=='success')
                      {
                         echo'<div class="alert alert-success" role="alert"><strong>Correct</strong>Bienvenue! </div>';
                         echo"<script> window.setTimeout(function() { window.location.href = 'dashboard'; }, 150);</script>";
                       }
                       elseif($loginnow=='error')
                       {
                         echo'<div class="alert alert-warning" role="alert"><strong>Erreur!</strong> Email ou mot de passe sont incorrectes </div>';
                       }
                  }
              ?>
              <form role="form" action="" method="post">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" placeholder="Email" type="email" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password" placeholder="Mot de passe" type="password" required="required">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id="customCheckLogin" value="1" name="rem" type="checkbox">
                  <label class="custom-control-label" for="customCheckLogin">
                    <span class="text-muted">Se souvenir de moi</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Se connecter</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-6 text-right">
            
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="py-5">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
               <div style="color: black;">© <?php echo date('Y') ?><a href="https://www.linkedin.com/in/mouad-iffer-50b060237/" class="font-weight-bold ml-1" style="color:black;"  target="_blank"><?php echo $softwarename; ?> </a></div>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
 
</body>

</html>