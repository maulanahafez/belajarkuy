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
    <div class="text-center mt-3 mb-3">
      <h3 class="font-weight-bold">BANK MATERI</h3>
      <h4 class="font-weight-bold">Pilih Mata Pelajaran</h4>
    </div>
    <div style="width: 30%;" class="text-center m-auto">
      <form action="./" method="get" name="search">
        <div class="input-group mb-3">
          <input type="search" name="s" class="form-control" placeholder="Search">
          <div class="input-group-append">
            <button class="input-group-text">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
    <div class="row justify-content-between text-center mt-5">
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

    <!-- MAPEL -->
    <?php
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $sql = "select mapel.nama_mapel, materi.* from mapel join materi on mapel.id_mapel=materi.id_mapel where nama_mapel='$id';";
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
              <div class="card col-4 mx-3 my-4 shadow">
                <div class="card-body">
                  <div class="text-start mb-3">
                    <span class="bg-info p-1 text-white rounded"><?= $row['nama_mapel'] ?></span>
                    <span class="bg-warning p-1 text-white rounded">Kelas <?= $row['kelas'] ?></span>
                  </div>
                  <div class="text-center">
                    <h5 class="card-title" style="height: 50px;"><?= $row['nama_materi'] ?></h5>
                    <p class="card-text" style="height: 120px;"><?= $row['desc_materi'] ?></p>
                    <div>
                      <a href="../asset/bankmateri/<?= $row['file_materi'] ?>" target="_blank" class="btn btn-sm btn-success mb-3">View Online</a>
                      <a href="../asset/bankmateri/<?= $row['file_materi'] ?>" download="" class="btn btn-sm btn-warning">Download</a>
                    </div>
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

    <!-- SEARCH -->
    <?php
    if (isset($_GET['s'])) {
      $s = $_GET['s'];
      $query = mysqli_query($conn, "select * from materi join mapel on materi.id_mapel=mapel.id_mapel where nama_materi like '%$s%'")
      ?>
      <div class="container m-auto">
        <div class="mt-4">
          <div class="text-center">
            <div class="text-primary">
              <h4>Hasil Pencarian '<?= strtoupper($s) ?>'</h4>
            </div>
          </div>
          <div class="row justify-content-center">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <div class="card col-4 mx-3 my-4 shadow">
                <div class="card-body">
                  <div class="text-start mb-3">
                    <span class="bg-info p-1 text-white rounded"><?= $row['nama_mapel'] ?></span>
                    <span class="bg-warning p-1 text-white rounded">Kelas <?= $row['kelas'] ?></span>
                  </div>
                  <div class="text-center">
                    <h5 class="card-title" style="height: 50px;"><?= $row['nama_materi'] ?></h5>
                    <p class="card-text" style="height: 120px;"><?= $row['desc_materi'] ?></p>
                    <div>
                      <a href="../asset/bankmateri/<?= $row['file_materi'] ?>" target="_blank" class="btn btn-sm btn-success mb-3">View Online</a>
                      <a href="../asset/bankmateri/<?= $row['file_materi'] ?>" download="" class="btn btn-sm btn-warning">Download</a>
                    </div>
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