<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
<?php
session_start();
include("../config/connect.php");
include("../inc/header.php");
if (!$_SESSION) {
  header("location:../signin/");
}
?>
<div class="container my-4">
  <?= strlen($_SESSION['password']) ?>
  <div class="card m-auto p-3 shadow" style="width: 40%;">
    <div class="card-body">
      <div class="card-title text-center mb-4">
        <h2>Account Profile</h2>
      </div>
      <div class="card-text">
        <div class="my-3">
          <small>Username</small>
          <h5 class="fw-bold">
            <?= $_SESSION['username'] ?>
          </h5>
        </div>
        <div class="my-3">
          <small>Name</small>
          <h5 class="fw-bold">
            <?= $_SESSION['name'] ?>
          </h5>
        </div>
        <div class="my-3">
          <small>Email</small>
          <h5 class="fw-bold">
            <?= $_SESSION['email_user'] ?>
          </h5>
        </div>
        <div class="my-3">
          <small>Email</small>
          <h5 class="fw-bold">
            <?= $_SESSION['no_telp_user'] ?>
          </h5>
        </div>
        <div class="my-3">
          <small>Password</small>
          <h5 class="fw-bold">
            <?php
            $i = 0;
            for ($i = 0; $i < strlen($_SESSION['password']); $i++) {
              echo "&#9679;";
            }
            ?>
          </h5>
        </div>
        <div class="my-3">
          <small>Anda adalah</small>
          <h5 class="fw-bold">
            <?= ucfirst($_SESSION['tipe_user']) ?>
          </h5>
        </div>
        <div class="mt-3 text-center">
          <p>
            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#profileModal">
              Edit Account
            </button>
          </p>
          <p>
            <a href="../signin/signout.php" class="btn btn-success">Sign Out</a>
          </p>
          <div class="modal fade text-start" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title text-center" id="exampleModalLabel">Edit Account</h3>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="./process.php" method="POST" name="editprofile">
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="username">Username</span>
                      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="username" name="username" value="<?= $_SESSION['username'] ?>" required>
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="name">Name</span>
                      <input type="text" class="form-control" placeholder="Name" aria-label="name" aria-describedby="name" name="name" value="<?= $_SESSION['name'] ?>" required>
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="email_user">Email</span>
                      <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email_user" name="email_user" value="<?= $_SESSION['email_user'] ?>" required>
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="no_telp_user">Nomor Telepon</span>
                      <input type="text" class="form-control" placeholder="Nomor Telepon" aria-label="Nomor Telepon" aria-describedby="no_telp_user" name="no_telp_user" value="<?= $_SESSION['no_telp_user'] ?>" required>
                    </div>
                    <div class="input-group mb-3">
                      <span class="input-group-text" id="password">Password</span>
                      <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password" name="password" value="<?= $_SESSION['password'] ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="edit" class="btn btn-success">Save changes</button>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
include("../inc/footer.php");
?>