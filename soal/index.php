<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
<?php
include("../inc/header.php");
include("../config/connect.php");
if (!$_SESSION) {
  header("location:../signin/");
}
?>
<div class="position-relative" style="z-index:1;">
  <div class="container">
    <div class="row justify-content-between text-center">
      <div class="col-12 text-start mt-3 mb-3">
        <h3 class="font-weight-bold">BANK SOAL</h3>
        <h4 class="font-weight-bold">Pilih Mata Pelajaran</h4>
      </div>
      <div class="col-md-4 col-lg-3 pb-4">
        <a href="./?id=matematika" class="text-decoration-none">
          <div class="p-4 bg-tutor rounded">
            <i class="fa-solid fa-calculator"></i>
            <h6 class="font-weight-bold mb-0 pt-3">Matematika</h6>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-lg-3 pb-4">
        <a href="./?id=fisika" class="text-decoration-none">
          <div class="p-4 bg-tutor rounded">
            <i class="fa-regular fa-lightbulb"></i>
            <h6 class="font-weight-bold mb-0 pt-3">Fisika</h6>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-lg-3 pb-4">
        <a href="./?id=kimia" class="text-decoration-none">
          <div class="p-4 bg-tutor rounded">
            <i class="fa-solid fa-flask-vial"></i>
            <h6 class="font-weight-bold mb-0 pt-3">Kimia</h6>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-lg-3 pb-4">
        <a href="./?id=biologi" class="text-decoration-none">
          <div class="p-4 bg-tutor rounded">
            <i class="fa-solid fa-dna"></i>
            <h6 class="font-weight-bold mb-0 pt-3">Biologi</h6>
          </div>
        </a>
      </div>
    </div>
    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "select mapel.nama_mapel, soal.* from mapel join soal on mapel.id_mapel=soal.id_mapel where nama_mapel='$id';";
      $query = mysqli_query($conn, $sql);
    ?>
      <div class="container m-auto">
        <div class="mt-4">
          <div class="text-center">
            <div class="text-primary">
              <h4>Materi <?= ucfirst($id) ?></h4>
            </div>
          </div>
          <div class="row justify-content-center">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <div class="card col-4 mx-3 my-4 shadow text-center">
                <div class="card-body">
                  <h5 class="card-title" style="height: 50px;"><?= $row['nama_soal'] ?></h5>
                  <div>
                    <a href="../asset/banksoal/<?= $row['file_soal'] ?>" target="_blank" class="btn btn-sm btn-success mb-3">View Online</a>
                    <a href="../asset/banksoal/<?= $row['file_soal'] ?>" download="" class="btn btn-sm btn-warning">Download</a>
                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    <?php
    }
    ?>

  </div>
</div>
<?php
include("../inc/footer.php");
?>