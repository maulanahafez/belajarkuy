<?php
include('../inc/header.php');
include('../config/connect.php');

session_start();

// Submit Feedback Website
if (isset($_POST['submit_review_website'])) {
  if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $user_review = $_POST['user_review'];
    $type_review = "Website";
    $date = date("Y-m-d H:i:s");

    if ($user_review == "") {
?>
      <script>
        alert("Please Fill The Review");
        document.location("index.php");
      </script>

      <?php

    } else {
      foreach ($_POST['rating'] as $value) {
        $query = mysqli_query($conn, "insert into feedback (username, user_review, date, type_review, rating) values ('$username','$user_review','$date','$type_review','$value')");
        if ($query) {
      ?>
          <script lang="javascript">
            alert('Your Review Successfully Submitted');
          </script>
      <?php
        }
      }
    }
  }
  unset($query);
}



// Submit Feedback Tentor
if (isset($_POST['submit_review_tentor'])) {
  if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_SESSION['username'];
    $user_review = $_POST['user_review_tentor'];
    $type_review = "Tentor";
    $date = date("Y-m-d H:i:s");

    if ($user_review == "") {
      ?>
      <script>
        alert("Please Fill The Review");
        document.location("index.php");
      </script>
      <?php

    } else {
      foreach ($_POST['rating'] as $value) {
        $query = mysqli_query($conn, "insert into feedback (username, user_review, date, type_review, rating) values ('$username','$user_review','$date','$type_review','$value')");
        if ($query) {
      ?>
          <script lang="javascript">
            alert('Your Review Successfully Submitted');
          </script>
<?php
        }
      }
    }
  }
  unset($query);
}

?>


<div class="position-relative">
  <div class="container pb-5">
    <div class="row mb-3">
      <div class="col-12 text-center">
        <h2 class="font-weight-bold mb-6 pb-3">Cerita Mereka Bersama BelajarKuy</h2>
        <button type="button" name="add_review" id="add_review" class="btn btn-info mb-4">Review & Rating</button>
      </div>
      <div class="col d-flex align-center justify-content-center">
        <form action="" method="GET">
          <button type="submit" class="btn btn-outline-info" name="cari_semua" style="margin-bottom:10px;margin-right:10px;">Semua</button>
          <button type="submit" class="btn btn-outline-info" name="cari_tentor" style="margin-bottom:10px;margin-right:10px;">Tentor</button>
          <button type="submit" class="btn btn-outline-info" name="cari_website" style="margin-bottom:10px;margin-right:10px;">Website</button>
        </form>
      </div>
    </div>
    <div class="row">
      <?php
      $sql = "select * from feedback order by id_review desc";
      $query = mysqli_query($conn, $sql);

      // Search Feedback Tentor, Website, Semua
      if (isset($_GET['cari_tentor'])) {
        $query = mysqli_query($conn, "select * from feedback where type_review = 'Tentor'");
      } else if (isset($_GET['cari_website'])) {
        $query = mysqli_query($conn, "select * from feedback where type_review = 'Website'");
      } else {
        $query = mysqli_query($conn, "select * from feedback");
      }

      // Tampil Feedback
      while ($row = mysqli_fetch_array($query)) {
      ?>
        <div class="card-container">
          <div class="card mr-4 shadow mb-4 mx-3" style="width: 18rem;">
            <div class="bs">
              <p name="choose" class="pchoose"><?php echo "$row[type_review]" ?></p>
            </div>
            <div class="card-body tampil">
              <?php
              // echo "$row[rating]";
              if ($row['rating'] == 1) {
              ?>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_1"></i>
                <i class="fas fa-star star-light tampil_star mr-1" id="tampil_star_2"></i>
                <i class="fas fa-star star-light tampil_star mr-1" id="tampil_star_3"></i>
                <i class="fas fa-star star-light tampil_star mr-1" id="tampil_star_4"></i>
                <i class="fas fa-star star-light tampil_star mr-1" id="tampil_star_5"></i>
              <?php
              } else if ($row['rating'] == 2) {
              ?>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_1"></i>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_2"></i>
                <i class="fas fa-star star-light tampil_star mr-1" id="tampil_star_3"></i>
                <i class="fas fa-star star-light tampil_star mr-1" id="tampil_star_4"></i>
                <i class="fas fa-star star-light tampil_star mr-1" id="tampil_star_5"></i>
              <?php
              } else if ($row['rating'] == 3) {
              ?>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_1"></i>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_2"></i>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_3"></i>
                <i class="fas fa-star star-light tampil_star mr-1" id="tampil_star_4"></i>
                <i class="fas fa-star star-light tampil_star mr-1" id="tampil_star_5"></i>
              <?php
              } else if ($row['rating'] == 4) {
              ?>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_1"></i>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_2"></i>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_3"></i>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_4"></i>
                <i class="fas fa-star star-light tampil_star mr-1" id="tampil_star_5"></i>
              <?php
              } else {
              ?>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_1"></i>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_2"></i>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_3"></i>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_4"></i>
                <i class="fas fa-star star-light tampil_star mr-1 text-warning" id="tampil_star_5"></i>
              <?php
              }
              ?>
              <p class="date">
                Posted on <?php echo "$row[date]" ?>
              </p>
              <p class="rev card-text">
                <?php echo "$row[user_review]" ?>
              </p>
            </div>
            <div class="row">
              <div class="nu col">
                <p><?php echo "$row[username]" ?></p>
              </div>
              <div class="col">
              </div>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>

    <!-- MODAL REVIEW & RATING -->
    <div class="modal" id="choose_modal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Choose</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row text-center">
              <div class="col">
                <button type="button" class="btn btn-info" id="add_tentor">Tentor</button>
              </div>
              <div class="col">
                <button type="button" class="btn btn-info" id="add_website">Website</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL TENTOR -->
    <div id="modal_tentor" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Review Tentor BelajarKuy</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="index.php" method="POST">
              <div class="form-group">
                <h4 class="text-center mt-2 mb-4">
                  <label class="checkbox_tentor">
                    <input type="checkbox" value="1" class="checkoption" name="rating[]">
                    <i class="fas fa-star star-light submit_bintang mr-1" id="submit_bintang_1" data-peringkat="1"></i>
                  </label>
                  <label class="checkbox_tentor">
                    <input type="checkbox" value="2" class="checkoption" name="rating[]">
                    <i class="fas fa-star star-light submit_bintang mr-1" id="submit_bintang_2" data-peringkat="2"></i>

                  </label>
                  <label class="checkbox_tentor">
                    <input type="checkbox" value="3" class="checkoption" name="rating[]">
                    <i class="fas fa-star star-light submit_bintang mr-1" id="submit_bintang_3" data-peringkat="3"></i>

                  </label>
                  <label class="checkbox_tentor">
                    <input type="checkbox" value="4" class="checkoption" name="rating[]">
                    <i class="fas fa-star star-light submit_bintang mr-1" id="submit_bintang_4" data-peringkat="4"></i>

                  </label>
                  <label class="checkbox_tentor">
                    <input type="checkbox" value="5" class="checkoption" name="rating[]">
                    <i class="fas fa-star star-light submit_bintang mr-1" id="submit_bintang_5" data-peringkat="5"></i>

                  </label>
                </h4>
              </div>
              <div class="form-group">
                <textarea name="user_review_tentor" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
              </div>
              <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-primary" name="submit_review_tentor">Submit</button>
              </div>
          </div>
        </div>
      </div>
    </div>

    <!-- MODAL WEBSITE -->
    <div id="modal_website" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Review BelajarKuy</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="index.php" method=" POST">
              <div class="form-group">
                <h4 class="text-center mt-2 mb-4">
                  <label class="checkbox_website">
                    <input type="checkbox" value="1" class="checkoption" name="rating[]"><i class="checkoption fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                  </label>
                  <label class="checkbox_website">
                    <input type="checkbox" value="2" class="checkoption" name="rating[]"><i class="checkoption fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                  </label>
                  <label class="checkbox_website">
                    <input type="checkbox" value="3" class="checkoption" name="rating[]"><i class="checkoption fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                  </label>
                  <label class="checkbox_website">
                    <input type="checkbox" value="4" class="checkoption" name="rating[]"><i class="checkoption fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                  </label>
                  <label class="checkbox_website">
                    <input type="checkbox" value="5" class="checkoption" name="rating[]"><i class="checkoption fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                  </label>
                </h4>
              </div>
              <div class="form-group">
                <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
              </div>
              <div class="form-group text-center mt-4">
                <button type="submit" class="btn btn-primary" name="submit_review_website">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
    var rating_data = 0;
    var peringkat_data = 0;

    // Show Modal
    $('#add_review').click(function() {
      $('#choose_modal').modal('show');
    });

    // Hide Modal
    $('#add_tentor').click(function() {
      $('#modal_tentor').modal('show');
      $('#choose_modal').modal('hide');
    });

    $('#add_website').click(function() {
      $('#modal_website').modal('show');
      $('#choose_modal').modal('hide');
    });



    // Fitur Bintang Website
    $(document).on('mouseenter', '.submit_star', function() {
      var rating = $(this).data('rating');
      reset_background();
      for (var count = 1; count <= rating; count++) {
        $('#submit_star_' + count).addClass('text-warning');
      }
    });

    function reset_background() {
      for (var count = 1; count <= 5; count++) {
        $('#submit_star_' + count).addClass('star-light');
        $('#submit_star_' + count).removeClass('text-warning');
      }
    }

    $(document).on('mouseleave', '.submit_star', function() {
      reset_background();
      for (var count = 1; count <= rating_data; count++) {
        $('#submit_star_' + count).removeClass('star-light');
        $('#submit_star_' + count).addClass('text-warning');
      }
    });

    $(document).on('click', '.submit_star', function() {
      rating_data = $(this).data('rating');
      console.log("Bintang Website" + rating_data);
    });

    $('.checkoption').click(function() {
      $('.checkoption').not(this).prop('checked', false);
    });



    // Fitur Bintang Tentor
    $(document).on('mouseenter', '.submit_bintang', function() {
      var peringkat = $(this).data('peringkat');
      reset_background_1();
      for (var count = 1; count <= peringkat; count++) {
        $('#submit_bintang_' + count).addClass('text-warning');
      }
    });

    function reset_background_1() {
      for (var count = 1; count <= 5; count++) {
        $('#submit_bintang_' + count).addClass('star-light');
        $('#submit_bintang_' + count).removeClass('text-warning');
      }
    }

    $(document).on('mouseleave', '.submit_bintang', function() {
      reset_background_1();
      for (var count = 1; count <= rating_data; count++) {
        $('#submit_bintang_' + count).removeClass('star-light');
        $('#submit_bintang_' + count).addClass('text-warning');
      }
    });

    $(document).on('click', '.submit_bintang', function() {
      rating_data = $(this).data('peringkat');
      console.log("Bintang Tentor" + rating_data);
    });

  });
</script>

<style>
  .bs {
    width: 100px;
    height: 30px;
    margin: 10px;
    margin-top: 20px;
    margin-left: 20px;
    background-color: #17a2b8;
    border-radius: 12px;
    text-align: center;
  }

  .pchoose {
    margin: 2px;
    color: white;
    font-family: 'Alata', sans-serif;
    font-weight: 500;
  }

  .img-user {
    width: 80px;
    height: 80px;
    margin-left: 20px;
    margin-bottom: 25px;
    border-radius: 5px;
  }

  .nu p {
    font-family: Inter;
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 125%;
    color: #506982;
    margin-left: 20px;
    margin-top: 15px;
  }

  .rev {
    font-family: Inter;
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 140%;
    color: #0a2540;
    align-self: stretch;
    margin-top: 10px;
  }

  .checkbox_website input {
    position: relative;
    z-index: 1;
    left: 20px;
    top: 17px;
    opacity: 0;
  }

  .checkbox_tentor input {
    position: relative;
    z-index: 1;
    left: 26px;
    top: 18px;
    opacity: 0;
  }

  .tampil {
    margin-top: -20px;
  }

  p.date {
    font-size: 10px;
  }
</style>

<?php
include('../inc/footer.php');
?>