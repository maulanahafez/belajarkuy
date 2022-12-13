<?php
include("./inc/header.php");
if (!$_SESSION) {
  header("location:../signin/");
} elseif ($_SESSION['tipe_user'] == "murid") {
  header("location:../");
}
?>
<div class="row justify-content-evenly align-items-center mt-4">
  <div class="d-none">
    <h1><?= $_SESSION['tipe_user'] ?></h1>
    <h1><?= session_id() ?></h1>
  </div>
  <?php
  if ($_SESSION['tipe_user'] == "tentor" || $_SESSION['tipe_user'] == "pengelola" || $_SESSION['tipe_user'] == "pemilik") {
    if ($_SESSION['tipe_user'] == "pengelola" || $_SESSION['tipe_user'] == "pemilik") {
      ?>
      <a href="./user/" class="btn btn-dark col-3 mx-5 mb-4 shadow">
        <div>
          <h2><i class="fa-solid fa-users"></i></h2>
          <h5>USER</h5>
        </div>
      </a>
      <a href="./tentor/" class="btn btn-info col-3 mx-5 mb-4 shadow">
        <div>
          <h2><i class="fa-solid fa-chalkboard-user"></i></h2>
          <h5>TENTOR</h5>
        </div>
      </a>
      <a href="./mapel/" class="btn btn-success col-3 mx-5 mb-4 shadow">
        <div>
          <h2><i class="fa-solid fa-list"></i></h2>
          <h5>MAPEL</h5>
        </div>
      </a>
      <a href="./feedback/" class="btn btn-warning col-3 mx-5 mb-4 shadow">
        <div>
          <h2><i class="fa-solid fa-comments"></i></h2>
          <h5>FEEDBACK</h5>
        </div>
      </a>
      <?php
    }
    ?>
    <a href="./materi/" class="btn btn-primary col-3 mx-5 mb-4 shadow">
      <div>
        <h2><i class="fa-solid fa-book"></i></h2>
        <h5>MATERI</h5>
      </div>
    </a>
    <a href="./soal/" class="btn btn-secondary col-3 mx-5 mb-4 shadow">
      <div>
        <h2><i class="fa-solid fa-clipboard"></i></h2>
        <h5>SOAL</h5>
      </div>
    </a>
    <a href="../signin/signout.php" class="btn btn-danger col-3 mx-5 mb-4 shadow">
      <div>
        <h2><i class="fa-solid fa-right-from-bracket"></i></h2>
        <h5>SIGN OUT</h5>
      </div>
    </a>
  <?php
  }
  ?>
</div>
<?php
include("./inc/footer.php");
?>