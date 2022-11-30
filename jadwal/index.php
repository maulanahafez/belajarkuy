<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
<?php
include("../inc/header.php");
include("../config/connect.php");
if (!$_SESSION) {
  header("location:../signin/");
}
?>
<div class="position-relative">
  <div class="container text-center">
    <h3 class="font-weight-bold mt-3 text-uppercase">Jadwal Kelas BelajarKuy</h3>
    <h4 class="font-weight-bold">Tahun Ajaran ...</h4>
    <div class="my-4">
      <a href="../asset/jadwal/" class="btn btn-success btn-sm">Download Jadwal</a>
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
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <th>18.30 s.d. 20.00</th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
  </div>
</div>
<?php
include("../inc/footer.php");
?>