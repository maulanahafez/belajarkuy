<?php
include("../../config/connect.php");
include("../inc/header.php");
$sql = "select * from mapel order by id_mapel";
$query = mysqli_query($conn, $sql);
$i = 1;
?>
<!-- Modal -->
<div class="modal fade" id="mapelModal" tabindex="-1" aria-labelledby="mapelModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="mapelModalLabel">Add New Mapel</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./process.php" method="POST" name="addmapel">
          <div class="mb-3">
            <label class="form-label">Nama Mata Pelajaran</label>
            <input type="text" name="nama_mapel" class="form-control" required>
          </div>
          <div class="modal-footer">
            <a type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</a>
            <button type="submit" name="add" class="btn btn-sm btn-primary">Add Mapel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Button -->
<div class="text-center">
  <h3 class="mb-3">MAPEL TABLE</h3>
  <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#mapelModal">
    Add Mapel
  </button>
</div>

<!-- Table -->
<div class="mt-4">
  <table class="table text-center table-striped table-hover">
    <tr>
      <th>#</th>
      <th class="d-none">ID Mapel</th>
      <th>Nama Mapel</th>
      <th colspan="2">Action</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($query)) {
    ?>
      <tr>
        <td><?= $i ?></td>
        <td class="d-none"><?= $row['id_mapel'] ?></td>
        <td><?= $row['nama_mapel'] ?></td>
        <td>
          <a href="./process.php?edit=<?= $row['id_mapel'] ?>" class="btn btn-success btn-sm">Edit</a>
          <a href="./process.php?delete=<?= $row['id_mapel'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
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