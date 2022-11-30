<?php
include("../../config/connect.php");
include("../inc/header.php");
$sql = "select mapel.nama_mapel, soal.* from mapel join soal on mapel.id_mapel=soal.id_mapel;";
$query = mysqli_query($conn, $sql);
$i = 1;
?>

<!-- Modal -->
<div class="modal fade" id="soalModal" tabindex="-1" aria-labelledby="soalModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="soalModalLabel">Add New Soal</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="./process.php" method="POST" name="addsoal" enctype="multipart/form-data">
          <div class="mb-3">
            <label class="form-label">Mata Pelajaran</label>
            <select name="id_mapel" class="form-select form-select-sm" required>
              <option value="">Pilih mata pelajaran</option>
              <option value="1">Matematika</option>
              <option value="2">Fisika</option>
              <option value="3">Kimia</option>
              <option value="4">Biologi</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Nama Soal</label>
            <input type="text" name="nama_soal" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">File Soal (PDF)</label>
            <input type="file" name="file_soal" class="form-control" required accept=".pdf">
          </div>
          <div class="modal-footer">
            <a type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</a>
            <button type="reset" class="btn btn-sm btn-danger">Reset</button>
            <button type="submit" name="add" class="btn btn-sm btn-primary">Add Soal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Button -->
<div class="text-center">
  <h3 class="mb-3">SOAL TABLE</h3>
  <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#soalModal">
    Add Soal
  </button>
</div>

<!-- Table -->
<div class="mt-4">
  <table class="table text-center table-striped table-hover">
    <tr>
      <th>#</th>
      <th class="d-none">ID Soal</th>
      <th class="d-none">ID Mapel</th>
      <th>Nama Mapel</th>
      <th>Nama Soal</th>
      <th>File Soal</th>
      <th colspan="2">Action</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($query)) {
    ?>
      <tr>
        <td><?= $i ?></td>
        <td class="d-none"><?= $row['id_soal'] ?></td>
        <td class="d-none"><?= $row['id_mapel'] ?></td>
        <td><?= $row['nama_mapel'] ?></td>
        <td><?= $row['nama_soal'] ?></td>
        <td>
          <a href="../../asset/banksoal/<?= $row['file_soal'] ?>" target="_blank" class="btn btn-sm btn-secondary">View Online</a>
          <a href="../../asset/banksoal/<?= $row['file_soal'] ?>" download="" class="btn btn-sm btn-secondary">Download</a>
        </td>
        <td>
          <a href="./process.php?edit=<?= $row['id_soal'] ?>" class="btn btn-success btn-sm">Edit</a>
          <a href="./process.php?delete=<?= $row['id_soal'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
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