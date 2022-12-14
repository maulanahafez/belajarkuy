<?php
include("../inc/header.php");
include("../../config/connect.php");
if (!$_SESSION) {
?>
  <script>
    document.location = "/belajarkuy/signin/";
  </script>
<?php
}
if ($_SESSION['tipe_user'] == "murid") {
?>
  <script>
    document.location = "/belajarkuy/dashboard/";
  </script>
<?php
}
$sql = "select user.* from user where tipe_user = 'tentor';";
$query = mysqli_query($conn, $sql);
$i = 1;
?>

<!-- Modal Button -->
<div class="text-center">
  <h3 class="mb-3">TENTOR TABLE</h3>
  <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#tentorModal">
    Add Tentor
  </button>
</div>

<!-- Table -->
<div class="mt-4">
  <table class="table text-center table-striped table-hover">
    <tr>
      <th>#</th>
      <th>Username</th>
      <th>Nama User</th>
      <th>Password</th>
      <th>Email</th>
      <th>No Telp</th>
      <th>Tipe Pengguna</th>
      <th colspan="2">Action</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($query)) {
    ?>
      <tr>
        <td><?= $i ?></td>
        <td><?= $row['username'] ?></td>
        <td><?= $row['nama_user'] ?></td>
        <td class="d-none"><?= $row['password'] ?></td>
        <td>
          <?php
          for ($j = 0; $j < strlen($row['password']); $j++) {
            echo "&#9679;";
          }
          ?>
        </td>
        <td><?= $row['email_user'] ?></td>
        <td><?= $row['no_telp_user'] ?></td>
        <td><?= ucfirst($row['tipe_user']) ?></td>
        <td>
          <a href="./process.php?edit=<?= $row['username'] ?>" class="btn btn-success btn-sm">Edit</a>
          <a href="./process.php?delete=<?= $row['username'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
        </td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>
</div>

<!-- Modal -->
<div class="modal fade" id="tentorModal" tabindex="-1" aria-labelledby="tentorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="tentorModalLabel">Add New Tentor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./process.php" method="POST" name="addtentor">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="nama_user" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email_user" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">No Telp</label>
            <input type="text" name="no_telp_user" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control" required>
          </div>
          <div class="modal-footer">
            <a type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</a>
            <button type="reset" class="btn btn-sm btn-danger">Reset</button>
            <button type="submit" name="add" class="btn btn-sm btn-primary">Add Tentor</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<button class="btn btn-sm btn-warning" onclick="window.print()">Print</button>
<?php
include("../inc/footer.php")
?>