<?php
include("./inc/header.php");
session_start();
if (!$_SESSION) {
  header("location:../signin/");
} elseif ($_SESSION['username'] != "admin") {
  header("location:../");
}
?>
<div class="row justify-content-evenly align-items-center mt-4">
  <a href="./user/" class="btn btn-info col-3 mx-5 mb-4 shadow">
    <div>
      <h2><i class="fa-solid fa-users"></i></h2>
      <h5>USER</h5>
    </div>
  </a>
  <a href="./mapel/" class="btn btn-success col-3 mx-5 mb-4 shadow">
    <div>
      <h2><i class="fa-solid fa-list"></i></h2>
      <h5>MAPEL</h5>
    </div>
  </a>
  <a href="./materi/" class="btn btn-warning col-3 mx-5 mb-4 shadow">
    <div>
      <h2><i class="fa-solid fa-book"></i></h2>
      <h5>MATERI</h5>
    </div>
  </a>
  <a href="./soal/" class="btn btn-primary col-3 mx-5 mb-4 shadow">
    <div>
      <h2><i class="fa-solid fa-clipboard"></i></h2>
      <h5>SOAL</h5>
    </div>
  </a>
  <a href="./feedback/" class="btn btn-secondary col-3 mx-5 mb-4 shadow">
    <div>
      <h2><i class="fa-solid fa-comments"></i></h2>
      <h5>FEEDBACK</h5>
    </div>
  </a>
  <a href="../signin/signout.php" class="btn btn-danger col-3 mx-5 mb-4 shadow">
    <div>
      <h2><i class="fa-solid fa-right-from-bracket"></i></h2>
      <h5>SIGN OUT</h5>
    </div>
  </a>
</div>
<?php
include("./inc/footer.php");
?>