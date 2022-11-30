<?php
include("../../config/connect.php");
include("../inc/header.php");
?>
<?php
$id_mapel = '';
$nama_mapel = '';
$err = 0;

// INSERT DATA
if (isset($_POST['add'])) {
  $nama_mapel = $_POST['nama_mapel'];
  $sql1 = "select * from mapel";
  $q1 = mysqli_query($conn, $sql1);
  while ($row = mysqli_fetch_array($q1)) {
    if ($row['nama_mapel'] == $nama_mapel) {
      $err = 1;
?>
      <script>
        alert("Nama mapel sudah ada");
        document.location = "./";
      </script>
    <?php
    }
  }
  if ($err != 1) {
    $sql2 = "insert into mapel(id_mapel, nama_mapel) values ('','$nama_mapel')";
    $q2 = mysqli_query($conn, $sql2);
    if ($q2) {
    ?>
      <script>
        alert("Data berhasil ditambahkan");
        document.location = "./";
      </script>
    <?php
    }
  }
}

// DELETE DATA
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $sql = "delete from mapel where id_mapel='$id'";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    ?>
    <script>
      alert("Data berhasil dihapus");
      document.location = "./";
    </script>
    <?php
  }
  // Reset AUTO_INCREMENT
  // $id = 5;
  // $sql = "alter table mapel AUTO_INCREMENT=$id";
  // $query = mysqli_query($conn, $sql);
}

// EDIT DATA
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $sql1 = "select * from mapel where id_mapel = '$id'";
  $q1 = mysqli_query($conn, $sql1);
  while ($row = mysqli_fetch_array($q1)) {
    $id_mapel = $row['id_mapel'];
    $nama_mapel = $row['nama_mapel'];
  }
  if (isset($_POST['edit'])) {
    $nama_mapel = $_POST['nama_mapel'];
    $sql2 = "update mapel set nama_mapel='$nama_mapel' where id_mapel='$id'";
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
    <form action="" method="post" name="editmapel" style="width: 40%;" class="card">
      <div class="card-body">
        <h3>Edit mapel</h3>
        <div class="mb-3">
          <label class="form-label">ID Mapel</label>
          <input type="text" name="nama_mapel" class="form-control form-control-sm" value="<?= $id_mapel ?>" disabled>
        </div>
        <div class="mb-3">
          <label class="form-label">Nama Mata Pelajaran</label>
          <input type="text" name="nama_mapel" class="form-control form-control-sm" value="<?= $nama_mapel ?>" required>
        </div>
        <div class="modal-footer">
          <a href="./" class="btn btn-sm btn-secondary">Back</a>
          <button type="submit" name="edit" class="btn btn-sm btn-primary ms-2">Edit Mapel</button>
        </div>
      </div>
    </form>
  </div>
<?php
}
?>
<?php
include("../inc/footer.php");
?>