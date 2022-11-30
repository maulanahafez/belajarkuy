<?php
include("../inc/header.php");
include("../config/connect.php");
session_start();
$err = 0;
if (isset($_POST['signup'])) {
  $name = $_POST['name'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql1 = "select * from user";
  $q1 = mysqli_query($conn, $sql1);
  while ($row = mysqli_fetch_array($q1)) {
    if ($row['username'] == $username) {
      $err = 1;
    }
  }
  if ($err != 1) {
    $sql2 = "insert into user(username, password, nama_user) values ('$username','$password','$name')";
    $q2 = mysqli_query($conn, $sql2);
    if ($q2) {
      $_SESSION['username'] = $username;
      $_SESSION['password'] = $password;
      $_SESSION['name'] = $name;
      header("location:../");
    }
  }
}
?>
<section class="">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="../img/signin-img.png" class="img-fluid" alt="Sign In Image" />
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="" method="POST" name="signup-form">
          <div class="mb-3">
            <h3 class="text-center mx-3 mb-0">Create a New Account</h3>
          </div>

          <?php
          if ($err) {
          ?>
            <p class="small fw-bold text-info text-center">
              Username already taken, please try another
            </p>
          <?php
          }
          ?>

          <div class="form-outline mb-4">
            <label class="form-label mb-0" for="form3Example3">Name</label>
            <input type="text" id="form3Example3" class="form-control form-control-lg" placeholder="Enter your name" name="name" required />
          </div>

          <div class="form-outline mb-4">
            <label class="form-label mb-0" for="form3Example3">Username</label>
            <input type="text" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid username" name="username" required />
          </div>

          <div class="form-outline mb-3">
            <label class="form-label mb-0" for="form3Example4">Password</label>
            <input type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" name="password" required />
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-success btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem" name="signup">Sign Up</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="./" class="link-danger btn--signup">Sign In</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php
// include("../inc/footer.php");
?>