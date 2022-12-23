<?php
include("../../config/connect.php");
include("../inc/header.php");
?>
<?php
$id_soal = $id_mapel = $kelas = $nama_soal = $file_soal = '';
$err = 0;

// INSERT DATA
if (isset($_POST['add'])) {
  $tahun_ajaran = $_POST['tahun_ajaran'];
  $file_jadwal = $_FILES['file_jadwal']['name'];
  $path = "../../asset/jadwal/";
  $tmp = $_FILES['file_jadwal']['tmp_name'];
  move_uploaded_file($tmp, $path . $file_jadwal);
  if ($err != 1) {
    $sql2 = "insert into jadwal(id_jadwal, tahun_ajaran, file_jadwal) values ('','$tahun_ajaran','$file_jadwal')";
    $q2 = mysqli_query($conn, $sql2);
    if ($q2) {
      ?>
      <script>
        alert("Data berhasil ditambahkan");
        document.location = "./";
      </script>
      <?php
    } else {
    ?>
      <script>
        alert("Data gagal ditambahkan");
        document.location = "./";
      </script>
    <?php
    }
  }
}

// DELETE DATA
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $sql1 = "select * from jadwal where id_jadwal='$id'";
  $q1 = mysqli_query($conn, $sql1);
  $path = "../../asset/jadwal/";
  while ($row = mysqli_fetch_array($q1)) {
    $file_jadwal = $row['file_jadwal'];
  }
  unlink($path . $file_jadwal);
  $sql2 = "delete from jadwal where id_jadwal='$id'";
  $q2 = mysqli_query($conn, $sql2);
  if ($q2) {
    ?>
    <script>
      alert("Data berhasil dihapus");
      document.location = "./";
    </script>
    <?php
  }
  // Reset AUTO_INCREMENT
  // $id = 1;
  // $sql = "alter table jadwal AUTO_INCREMENT=$id";
  // $query = mysqli_query($conn, $sql);
}

// EDIT DATA
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $sql1 = "select * from jadwal where id_jadwal = '$id'";
  $q1 = mysqli_query($conn, $sql1);
  while ($row = mysqli_fetch_array($q1)) {
    $id_jadwal = $row['id_jadwal'];
    $tahun_ajaran = $row['tahun_ajaran'];
    $file_jadwal = $row['file_jadwal'];
  }
  if (isset($_POST['edit'])) {
    $id_jadwal = $_POST['id_jadwal'];
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $sql2 = "update jadwal set id_jadwal='$id_jadwal', tahun_ajaran='$tahun_ajaran' where id_jadwal='$id'";
    $q2 = mysqli_query($conn, $sql2);
    if ($q2) {
    ?>
      <script>
        alert("Data berhasil diperbarui");
        document.location = "./";
      </script>
    <?php
    } else {
    ?>
      <script>
        alert("Data GAGAL diperbarui");
        document.location = "./";
      </script>
  <?php
    }
  }
  ?>
  <div class="container d-flex align-items-center justify-content-center" style="min-height: 80vh;">
    <form action="" method="post" name="editjadwal" style="width: 40%;" class="card">
      <div class="card-body">
        <h3>Edit Jadwal</h3>
        <div class="mb-3 d-none">
          <label class="form-label">ID Jadwal</label>
          <input type="text" name="id_jadwal" class="form-control form-control-sm" value="<?= $id_jadwal ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Tahun Ajaran</label>
          <input type="text" name="tahun_ajaran" class="form-control form-control-sm" value="<?= $tahun_ajaran ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">File Jadwal</label>
          <input type="file" name="file_jadwal" class="form-control form-control-sm" value="<?= $file_jadwal ?>" disabled>
          <p><small class="blockquote-footer"><?= $file_jadwal ?></small></p>
        </div>
        <div class="modal-footer">
          <a href="./" class="btn btn-sm btn-secondary">Back</a>
          <button type="submit" name="edit" class="btn btn-sm btn-primary ms-2">Edit Jadwal</button>
        </div>
      </div>
    </form>
  </div>
  <?php
}