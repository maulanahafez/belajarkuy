<?php
// include("../config/connect.php");
if (!isset($_SESSION)) {
  session_start();
}
$err = 0;
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
  <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>BelajarKuy</title>
  <link rel="stylesheet" href="/belajarkuy/style.css">
  <link rel="icon" href="/belajarkuy/asset/images/favicon.ico" type="image/x-icon type">

  <!-- Feedback -->
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>

  <!-- Rating -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>


<body>
  <div class="page-wrape">
    <div class="position-relative">
      <div class="hero-shape"></div>
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container py-2">
          <a class="navbar-brand font-weight-bold" href="/belajarkuy/">
            BelajarKuy
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <?php
              if ($_SESSION) {
                if ($_SESSION['tipe_user'] == "pengelola" || $_SESSION['tipe_user'] == "pemilik" || $_SESSION['tipe_user'] == "tentor") {
                  ?>
                  <li class="nav-item">
                    <a class="nav-link" href="/belajarkuy/dashboard/">
                      Dashboard
                    </a>
                  </li>
                  <?php
                }
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="/belajarkuy/">
                    Home
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/belajarkuy/materi">
                    Bank Materi
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/belajarkuy/soal">
                    Bank Soal
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/belajarkuy/jadwal">
                    Jadwal
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/belajarkuy/feedback">
                    Feedback
                  </a>
                </li>
              <?php
              }
              ?>
            </ul>
            <?php
            if (!$_SESSION) {
            ?>
              <span class="fw-bold">
                Sign in to access website
              </span>
            <?php
            }
            ?>
            <?php if (!$_SESSION) {
            ?>
              <div class="ml-lg-5"><a class="btn btn-success" href="/belajarkuy/signin">Sign In</a> </div>
            <?php
            } else {
            ?>
              <div class="dropdown ml-lg-3">
                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Account
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/belajarkuy/my/">My Account</a></li>
                  <li><a class="dropdown-item" href="/belajarkuy/signin/signout.php">Sign Out</a></li>
                </ul>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </nav>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>