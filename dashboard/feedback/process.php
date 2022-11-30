<?php
include("../../config/connect.php");
include("../inc/header.php");
?>

<?php
$id_review = $username = $user_review = $date = $type_review = $rating = '';
$err = 0;

// INSERT DATA
/*
if (isset($_POST['add'])) {
  $id_mapel = $_POST['id_mapel'];
  $nama_soal = $_POST['nama_soal'];
  $file_soal = $_FILES['file_soal']['name'];
  $path = "../../asset/banksoal/";
  $tmp = $_FILES['file_soal']['tmp_name'];
  move_uploaded_file($tmp, $path . $file_soal);
  if ($err != 1) {
    $sql2 = "insert into soal(id_soal, id_mapel, nama_soal, file_soal) values ('','$id_mapel', '$nama_soal', '$file_soal')";
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
*/

// DELETE DATA
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $sql = "delete from feedback where id_review='$id'";
  $q = mysqli_query($conn, $sql);
  if ($q) {
  ?>
    <script>
      alert("Data berhasil dihapus");
      document.location = "./";
    </script>
  <?php
  }
  // Reset AUTO_INCREMENT
  // $id = 1;
  // $sql = "alter table soal AUTO_INCREMENT=$id";
  // $query = mysqli_query($conn, $sql);
}

// EDIT DATA
/*
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $sql1 = "select * from soal where id_soal = '$id'";
  $q1 = mysqli_query($conn, $sql1);
  while ($row = mysqli_fetch_array($q1)) {
    $id_soal = $row['id_soal'];
    $id_mapel = $row['id_mapel'];
    $nama_soal = $row['nama_soal'];
    $file_soal = $row['file_soal'];
  }
  if (isset($_POST['edit'])) {
    $id_mapel = $_POST['id_mapel'];
    $nama_soal = $_POST['nama_soal'];
    $sql2 = "update soal set id_mapel='$id_mapel', nama_soal='$nama_soal' where id_soal='$id'";
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
    <form action="" method="post" name="editsoal" style="width: 40%;" class="card">
      <div class="card-body">
        <h3>Edit soal</h3>
        <div class="mb-3">
          <label class="form-label">ID Soal</label>
          <input type="text" name="id_soal" class="form-control form-control-sm" value="<?= $id_soal ?>" disabled>
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
          <label class="form-label">Nama Soal</label>
          <input type="text" name="nama_soal" class="form-control form-control-sm" value="<?= $nama_soal ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">File Soal</label>
          <input type="file" name="file_soal" class="form-control form-control-sm" value="<?= $file_soal ?>" disabled>
          <p><small class="blockquote-footer"><?= $file_soal ?></small></p>
        </div>
        <div class="modal-footer">
          <a href="./" class="btn btn-sm btn-secondary">Back</a>
          <button type="submit" name="edit" class="btn btn-sm btn-primary ms-2">Edit Soal</button>
        </div>
      </div>
    </form>
  </div>
<?php
}
*/
?>

<?php
include("../inc/footer.php");
?>