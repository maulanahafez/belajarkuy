<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
<?php
include("../inc/header.php");
include("../config/connect.php");
if (!$_SESSION) {
  header("location:../signin/");
}
$q = mysqli_query($conn, "select * from jadwal where tahun_ajaran='2022/2023'");
while ($row = mysqli_fetch_array($q)) {
  $tahun_ajaran = $row['tahun_ajaran'];
  $file_jadwal = $row['file_jadwal'];
}
?>
<div class="position-relative">
  <div class="container text-center">
    <h3 class="font-weight-bold mt-3 text-uppercase">Jadwal Kelas BelajarKuy</h3>
    <h4 class="font-weight-bold">Tahun Ajaran <?= $tahun_ajaran ?></h4>
    <div class="my-4">
      <a href="../asset/jadwal/<?= $file_jadwal ?>" class="btn btn-success btn-sm" download="">Download Jadwal</a>
    </div>
    <table class="table table-striped table-hover">
      <tr>
        <th></th>
        <th>SENIN</th>
        <th>SELASA</th>
        <th>RABU</th>
        <th>KAMIS</th>
        <th>JUMAT</th>
      </tr>
      <tr>
        <th>16.00 s.d. 17.30</th>
        <td></td>
        <td>
          <h4>FISIKA A</h4>
          <p></p>
          <p class="fw-bold">Tentor : Kak Uus</p>
        </td>
        <td>
          <h4>BIOLOGI B</h4>
          <p></p>
          <p class="fw-bold">Tentor : Kak Bisma</p>
        </td>
        <td>
          <h4>KIMIA B</h4>
          <p></p>
          <p class="fw-bold">Tentor : Kak Pilar</p>
        </td>
        <td>
          <h4>FISIKA B</h4>
          <p></p>
          <p class="fw-bold">Tentor : Kak Uus</p>
        </td>
      </tr>
      <tr>
        <th>18.30 s.d. 20.00</th>
        <td>
          <h4>MATEMATIKA A</h4>
          <p></p>
          <p class="fw-bold">Tentor : Kak Tara</p>
        </td>
        <td>
          <h4>BIOLOGI A</h4>
          <p></p>
          <p class="fw-bold">Tentor : Kak Bisma</p>
        </td>
        <td>
          <h4>KIMIA A</h4>
          <p></p>
          <p class="fw-bold">Tentor : Kak Pilar</p>
        </td>
        <td>
          <h4>MATEMATIKA A</h4>
          <p></p>
          <p class="fw-bold">Tentor : Kak Tara</p>
        </td>
        <td></td>
      </tr>
    </table>
  </div>
</div>
<?php
include("../inc/footer.php");
?>