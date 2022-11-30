<?php
include("../../config/connect.php");
include("../inc/header.php");
?>
<?php
$id_materi = $id_mapel = $nama_materi = $desc_materi = $file_materi = '';
$err = 0;

// INSERT DATA
if (isset($_POST['add'])) {
  $id_mapel = $_POST['id_mapel'];
  $nama_materi = $_POST['nama_materi'];
  $desc_materi = $_POST['desc_materi'];
  $file_materi = $_FILES['file_materi']['name'];
  $path = "../../asset/bankmateri/";
  $tmp = $_FILES['file_materi']['tmp_name'];
  move_uploaded_file($tmp, $path . $file_materi);
  if ($err != 1) {
    $sql2 = "insert into materi(id_materi, id_mapel, nama_materi, desc_materi, file_materi) values ('','$id_mapel', '$nama_materi', '$desc_materi', '$file_materi')";
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
  $sql1 = "select * from materi where id_materi='$id'";
  $q1 = mysqli_query($conn, $sql1);
  $path = "../../asset/bankmateri/";
  while ($row = mysqli_fetch_array($q1)) {
    $file_materi = $row['file_materi'];
  }
  unlink($path . $file_materi);
  $sql2 = "delete from materi where id_materi='$id'";
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
  $id = 6;
  $sql = "alter table materi AUTO_INCREMENT=$id";
  $query = mysqli_query($conn, $sql);
}

// EDIT DATA
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $sql1 = "select * from materi where id_materi = '$id'";
  $q1 = mysqli_query($conn, $sql1);
  while ($row = mysqli_fetch_array($q1)) {
    $id_materi = $row['id_materi'];
    $id_mapel = $row['id_mapel'];
    $nama_materi = $row['nama_materi'];
    $desc_materi = $row['desc_materi'];
    $file_materi = $row['file_materi'];
  }
  if (isset($_POST['edit'])) {
    $id_mapel = $_POST['id_mapel'];
    $nama_materi = $_POST['nama_materi'];
    $desc_materi = $_POST['desc_materi'];
    $sql2 = "update materi set id_mapel='$id_mapel', nama_materi='$nama_materi', desc_materi='$desc_materi' where id_materi='$id'";
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
    <form action="" method="post" name="editmateri" style="width: 40%;" class="card">
      <div class="card-body">
        <h3>Edit materi</h3>
        <div class="mb-3">
          <label class="form-label">ID Materi</label>
          <input type="text" name="id_materi" class="form-control form-control-sm" value="<?= $id_materi ?>" disabled>
        </div>
        <div class="mb-3">
          <label class="form-label">Mata Pelajaran</label>
          <select name="id_mapel" class="form-select form-select-sm" required>
            <option disabled>Pilih mata pelajaran</option>
            <option value="1" <?php if ($id_mapel == '1') {
                                echo "selected";
                              } ?>>Matematika</option>
            <option value="2" <?php if ($id_mapel == '2') {
                                echo "selected";
                              } ?>>Fisika</option>
            <option value="3" <?php if ($id_mapel == '3') {
                                echo "selected";
                              } ?>>Kimia</option>
            <option value="4" <?php if ($id_mapel == '4') {
                                echo "selected";
                              } ?>>Biologi</option>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Nama Materi</label>
          <input type="text" name="nama_materi" class="form-control form-control-sm" value="<?= $nama_materi ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Deskripsi Materi</label>
          <textarea name="desc_materi" cols="20" rows="2" class="form-control" required><?= $desc_materi ?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">File Materi</label>
          <input type="file" name="file_materi" class="form-control form-control-sm" value="<?= $file_materi ?>" disabled>
          <p><small class="blockquote-footer"><?= $file_materi ?></small></p>
        </div>
        <div class="modal-footer">
          <a href="./" class="btn btn-sm btn-secondary">Back</a>
          <button type="submit" name="edit" class="btn btn-sm btn-primary ms-2">Edit Materi</button>
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