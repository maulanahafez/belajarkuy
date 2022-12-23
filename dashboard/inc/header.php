<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard BelajarKuy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    @media print{
      .no--print{
        display: none;
      }
    }
  </style>
  <link rel="icon" href="/belajarkuy/asset/images/favicon.ico" type="image/x-icon type">
</head>

<body>
  <div class="container-fluid">
    <div class="row flex-nowrap">
      <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark no--print">
        <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
          <div class="d-flex align-items-center pb-3 mb-md-0 me-md-auto">
            <a href="/belajarkuy/" class="text-decoration-none text-white">
              <span class="fs-5 d-none d-sm-inline">BelajarKuy</span>
            </a>
          </div>
          <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
            <?php
            if ($_SESSION['tipe_user'] == "tentor" || $_SESSION['tipe_user'] == "pengelola" || $_SESSION['tipe_user'] == "pemilik") {
            ?>
              <li class="nav-item">
                <a href="/belajarkuy/dashboard/" class="nav-link align-middle px-0">
                  <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-light"><i class="fa-solid fa-gauge me-3"></i>Dashboard</span>
                </a>
              </li>
              <?php
              if ($_SESSION['tipe_user'] == "pengelola" || $_SESSION['tipe_user'] == "pemilik") {
              ?>
                <li class="nav-item">
                  <a href="/belajarkuy/dashboard/user/" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-light"><i class="fa-solid fa-users me-3"></i>User</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/belajarkuy/dashboard/tentor/" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-light"><i class="fa-solid fa-chalkboard-user me-3"></i>Tentor</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/belajarkuy/dashboard/mapel/" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-light"><i class="fa-solid fa-list me-3"></i>Mapel</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/belajarkuy/dashboard/feedback/" class="nav-link align-middle px-0">
                    <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-light"><i class="fa-solid fa-comments me-3"></i>Feedback</span>
                  </a>
                </li>
              <?php
              }
              ?>
              <li class="nav-item">
                <a href="/belajarkuy/dashboard/materi/" class="nav-link align-middle px-0">
                  <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-light"><i class="fa-solid fa-book me-3"></i>Materi</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/belajarkuy/dashboard/soal/" class="nav-link align-middle px-0">
                  <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-light"><i class="fa-solid fa-clipboard me-3"></i>Soal</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/belajarkuy/dashboard/jadwal/" class="nav-link align-middle px-0">
                  <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-light"><i class="fa-solid fa-calendar-days me-3"></i>Jadwal</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="/belajarkuy/signin/signout.php" class="nav-link align-middle px-0">
                  <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline text-light"><i class="fa-solid fa-right-from-bracket me-3"></i>Sign Out</span>
                </a>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
      <div class="col py-3">
        <a href="../" class="btn btn-sm btn-secondary"><i class="fa-solid fa-arrow-left"></i> Back</a>