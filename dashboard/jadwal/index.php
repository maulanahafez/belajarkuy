<?php
include("../inc/header.php");
include("../../config/connect.php");
if(!$_SESSION){
  ?>
  <script>
    document.location = "/belajarkuy/signin/";
  </script>
  <?php
}
if ($_SESSION['tipe_user'] == "murid" || $_SESSION['tipe_user'] == "tentor") {
  ?>
  <script>
    document.location = "/belajarkuy/dashboard/";
  </script>
  <?php
}
$sql = "select * from jadwal order by id_jadwal";
$query = mysqli_query($conn, $sql);
$i = 1;
?>
<!-- Modal Button -->
<div class="text-center">
  <h3 class="mb-3">JADWAL TABLE</h3>
  <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#jadwalModal">
    Add Jadwal
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="jadwalModal" tabindex="-1" aria-labelledby="jadwalModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="jadwalModalLabel">Add New Jadwal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./process.php" method="POST" name="addjadwal" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Tahun Ajaran</label>
            <input type="text" name="tahun_ajaran" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">File Jadwal</label>
            <input type="file" name="file_jadwal" class="form-control" required>
          </div>
          <div class="modal-footer">
            <a type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</a>
            <button type="submit" name="add" class="btn btn-sm btn-primary">Add Jadwal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="mt-4">
  <table class="table text-center table-striped table-hover">
    <tr>
      <th>#</th>
      <th class="d-none">ID Jadwal</th>
      <th>Tahun Ajaran</th>
      <th>File Jadwal</th>
      <th colspan="2">Action</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($query)) {
    ?>
      <tr>
        <td><?= $i ?></td>
        <td class="d-none"><?= $row['id_jadwal'] ?></td>
        <td><?= $row['tahun_ajaran'] ?></td>
        <td>
          <a href="../../asset/jadwal/<?= $row['file_jadwal'] ?>" target="_blank" class="btn btn-sm btn-secondary">View</a>
          <a href="../../asset/jadwal/<?= $row['file_jadwal'] ?>" download="" class="btn btn-sm btn-secondary">Download</a>
        </td>
        <td>
          <a href="./process.php?edit=<?= $row['id_jadwal'] ?>" class="btn btn-success btn-sm">Edit</a>
          <a href="./process.php?delete=<?= $row['id_jadwal'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
        </td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>
</div>
<?php
include("../inc/footer.php")
?>