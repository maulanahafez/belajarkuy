<?php
include("../../config/connect.php");
include("../inc/header.php");
?>
<?php
$username = '';
$password = '';
$nama_user = '';
$err = 0;

// INSERT DATA
if (isset($_POST['add'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $nama_user = $_POST['nama_user'];
  $sql1 = "select * from user";
  $q1 = mysqli_query($conn, $sql1);
  while ($row = mysqli_fetch_array($q1)) {
    if ($row['username'] == $username) {
      $err = 1;
    ?>
      <script>
        alert("Username sudah ada");
        document.location = "./";
      </script>
    <?php
    }
  }
  if ($err != 1) {
    $sql2 = "insert into user(username, password, nama_user) values ('$username','$password','$nama_user')";
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
  $sql = "delete from user where username='$id'";
  $query = mysqli_query($conn, $sql);
  if ($query) {
    ?>
    <script>
      alert("Data berhasil dihapus");
      document.location = "./";
    </script>
    <?php
  }
}

// EDIT DATA
if (isset($_GET['edit'])) {
  $id = $_GET['edit'];
  $sql1 = "select * from user where username = '$id'";
  $q1 = mysqli_query($conn, $sql1);
  while ($row = mysqli_fetch_array($q1)) {
    $username = $row['username'];
    $password = $row['password'];
    $nama_user = $row['nama_user'];
  }
  if (isset($_POST['edit'])) {
    $password = $_POST['password'];
    $nama_user = $_POST['nama_user'];
    $sql2 = "update user set password='$password', nama_user='$nama_user' where username='$id'";
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
    <form action="" method="post" name="edituser" style="width: 40%;" class="card">
      <div class="card-body">
        <h3>Edit user </h3>
        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" name="nama_user" class="form-control form-control-sm" value="<?= $nama_user ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control form-control-sm" value="<?= $username ?>" disabled>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control form-control-sm" value="<?= $password ?>" required>
        </div>
        <div class="modal-footer">
          <a href="./" class="btn btn-sm btn-secondary">Back</a>
          <button type="submit" name="edit" class="btn btn-sm btn-primary ms-2">Edit User</button>
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