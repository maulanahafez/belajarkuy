<?php
include("./inc/header.php");
include("../config/connect.php");
if (!$_SESSION) {
  header("location:../signin/");
} elseif ($_SESSION['tipe_user'] == "murid") {
  header("location:../");
}
$q1 =  mysqli_query($conn, "select count(username) as count from user");
while ($row = mysqli_fetch_array($q1)) {
  $username = $row['count'];
}
$q2 =  mysqli_query($conn, "select count(username) as count from user where tipe_user = 'tentor'");
while ($row = mysqli_fetch_array($q2)) {
  $tentor = $row['count'];
}
$q3 =  mysqli_query($conn, "select count(id_mapel) as count from mapel");
while ($row = mysqli_fetch_array($q3)) {
  $mapel = $row['count'];
}
$q4 =  mysqli_query($conn, "select count(id_review) as count from feedback");
while ($row = mysqli_fetch_array($q4)) {
  $feedback = $row['count'];
}
$q5 =  mysqli_query($conn, "select count(id_materi) as count from materi");
while ($row = mysqli_fetch_array($q5)) {
  $materi = $row['count'];
}
$q6 =  mysqli_query($conn, "select count(id_soal) as count from soal");
while ($row = mysqli_fetch_array($q6)) {
  $soal = $row['count'];
}
?>
<div class="row justify-content-evenly align-items-center mt-5">
  <div class="d-none">
    <h1><?= $_SESSION['tipe_user'] ?></h1>
    <h1><?= session_id() ?></h1>
  </div>
  <?php
  if ($_SESSION['tipe_user'] == "tentor" || $_SESSION['tipe_user'] == "pengelola" || $_SESSION['tipe_user'] == "pemilik") {
    if ($_SESSION['tipe_user'] == "pengelola" || $_SESSION['tipe_user'] == "pemilik") {
    ?>
      <a href="./user/" class="btn btn-secondary col-3 mx-5 mb-4 shadow-lg">
        <div>
          <div class="row justify-content-evenly align-items-center">
            <div class="col-4">
              <h1><i class="fa-solid fa-users"></i></h1>
            </div>
            <div class="col-6">
              <h4><?= $username ?></h4>
              <h5 class="fst-italic">USER</h5>
            </div>
          </div>
        </div>
      </a>
      <a href="./tentor/" class="btn btn-info col-3 mx-5 mb-4 shadow-lg">
        <div>
          <div class="row justify-content-evenly align-items-center">
            <div class="col-4">
              <h1><i class="fa-solid fa-chalkboard-user"></i></h1>
            </div>
            <div class="col-6">
              <h4><?= $tentor ?></h4>
              <h5 class="fst-italic">TENTOR</h5>
            </div>
          </div>
        </div>
      </a>
      <a href="./mapel/" class="btn btn-success col-3 mx-5 mb-4 shadow-lg">
        <div>
          <div class="row justify-content-evenly align-items-center">
            <div class="col-4">
              <h1><i class="fa-solid fa-list"></i></h1>
            </div>
            <div class="col-6">
              <h4><?= $mapel ?></h4>
              <h5 class="fst-italic">MAPEL</h5>
            </div>
          </div>
        </div>
      </a>
      <a href="./feedback/" class="btn btn-warning col-3 mx-5 mb-4 shadow-lg">
        <div>
          <div class="row justify-content-evenly align-items-center">
            <div class="col-4">
              <h1><i class="fa-solid fa-comments"></i></h1>
            </div>
            <div class="col-6">
              <h4><?= $feedback ?></h4>
              <h5 class="fst-italic">FEEDBACK</h5>
            </div>
          </div>
        </div>
      </a>
    <?php
    }
    ?>
    <a href="./materi/" class="btn btn-primary col-3 mx-5 mb-4 shadow-lg">
      <div>
        <div>
          <div class="row justify-content-evenly align-items-center">
            <div class="col-4">
              <h1><i class="fa-solid fa-book"></i></h1>
            </div>
            <div class="col-6">
              <h4><?= $materi ?></h4>
              <h5 class="fst-italic">MATERI</h5>
            </div>
          </div>
        </div>
      </div>
    </a>
    <a href="./soal/" class="btn btn-danger col-3 mx-5 mb-4 shadow-lg">
      <div>
        <div>
          <div class="row justify-content-evenly align-items-center">
            <div class="col-4">
              <h1><i class="fa-solid fa-clipboard"></i></h1>
            </div>
            <div class="col-6">
              <h4><?= $soal ?></h4>
              <h5 class="fst-italic">SOAL</h5>
            </div>
          </div>
        </div>
      </div>
    </a>
    <!-- <a href="../signin/signout.php" class="btn btn-danger col-3 mx-5 mb-4 shadow-lg">
      <div>
        <h2><i class="fa-solid fa-right-from-bracket"></i></h2>
        <h5>SIGN OUT</h5>
      </div>
    </a> -->
  <?php
  }
  ?>
</div>
<?php
include("./inc/footer.php");
?>