<?php
session_start();
include("../config/connect.php");
if (isset($_POST['edit'])) {
  $username = $_POST['username'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  $email_user = $_POST['email_user'];
  $no_telp_user = $_POST['no_telp_user'];
  $temp = 1;
  $sql1 = mysqli_query($conn, "select * from user");
  if ($username != $_SESSION['username']) {
    while ($row = mysqli_fetch_array($sql1)) {
      if ($username == $row['username']) {
        ?>
        <script>
          alert("Username already taken, please try another");
          document.location = "./";
        </script>
        <?php
        $temp = 0;
      }
    }
  }
  if($temp==1){
    $sql3 = mysqli_query($conn, "update user set username = '$username', password = '$password', nama_user = '$name', email_user = '$email_user', no_telp_user = '$no_telp_user' where username = '$username'");
    if ($sql3) {
      $sql2 = mysqli_query($conn, "select * from user where username = '$username'");
      while ($row = mysqli_fetch_array($sql2)){
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['name'] = $row['nama_user'];
        $_SESSION['email_user'] = $row['email_user'];
        $_SESSION['no_telp_user'] = $row['no_telp_user'];
        $_SESSION['tipe_user'] = $row['tipe_user'];
      }
      ?>
      <script>
        alert("Akun BERHASIL diubah");
        document.location = "./";
      </script>
      <?php
    }else{
      ?>
      <script>
        alert("Akun GAGAL diubah");
        document.location = "./";
      </script>
      <?php
    }
  }
}
?>
<h2><?= $_SESSION['name'] ?></h2>
<h2><?= $_SESSION['email_user'] ?></h2>
<h2><?= $_SESSION['no_telp_user'] ?></h2>
<h2><?= $_SESSION['username'] ?></h2>
<h2><?= $_SESSION['password'] ?></h2>