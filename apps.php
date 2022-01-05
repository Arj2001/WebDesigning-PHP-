<?php

session_start();
require_once('config.php');
include_once('function.php');

$app_id = $_GET['id'] ?? null;

if (!$app_id) {
  header('location:index.php');
  exit;
}
$stmt = $pdo->prepare("SELECT * FROM apps WHERE id = :id");
$stmt->bindValue(':id', $app_id);
$stmt->execute();
$apps = $stmt->fetch(PDO::FETCH_ASSOC);

$filePath = str_replace("../../", "", $apps['file']);
$ext = pathinfo($apps['file'], PATHINFO_EXTENSION);
$size = sizeConvert(filesize($filePath));

// echo "<pre>";
// var_dump($size);
// exit;
?>
<!doctype html>
<html lang="en">

<head>
  <!-- created by ARJUN RAJU -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="css/bootstrap4.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap4.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
  
  <title><?php echo $apps['name']; ?></title>
</head>

<body onload="changeTag()">
  <nav class="conatiner">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand mx-md-4" href="./">STORE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-md-4 ">
          <li class="nav-item font-weight-bold text-size mx-md-1">
            <a class="nav-link" href="#">About</a>
          </li>

          <?php
          if (isset($_SESSION['username'])) {
            echo '<li class="nav-item font-weight-bold text-size mx-md-1">
                    <a class="nav-link" style="cursor: pointer;" href="profile.php">' . $_SESSION['username'] . '</a>
                  </li>';
            echo '<li class="nav-item font-weight-bold text-size mx-md-1">
                    <a class="nav-link" style="cursor: pointer;" href="logout.php">Logout</a>
                    </li>';
          } else {
            echo '<li class="nav-item font-weight-bold text-size mx-md-1">
                    <a class="nav-link" style="cursor: pointer;" href="login/">Login</a>
                    </li>';
          }
          ?>
      </div>
    </nav>
  </nav>
  <div class="container my-4">
    <div class="d-flex flex-row">
      <img src="<?php echo str_replace("../../", "", $apps['icon']) ?>" class="float-left img-rounded img-thumbnail mr-2 mb-2" style="width:200px;" alt="app-image">
      <div class="d-flex flex-column">
        <h4><?php echo $apps['name']; ?></h4>
        <h5><?php echo $apps['small_desc']; ?></h5>
        <h6><b>File Size: </b><?php echo $size; ?></h6>
        <h6><b>Date Added: </b><?php echo date('d-m-Y', strtotime($apps['date'])); ?></h6>
        <h6><b>Version: </b><?php echo $apps['version']; ?></h6>
        <h6><b>License: </b><?php if ($apps['free'] == 0) {
                              echo "Free";
                            } else echo "Paid"; ?></h6>
      </div>
    </div>
    <br>
    <div class="conatiner ctag">
      <?php echo $apps['desc']; ?>
      <a href="<?php echo str_replace("../../", "", $apps['file']) ?>" download="<?php echo $apps['name'] . '.' . $ext; ?>" class="btn btn-success btn-lg"><i class="fa fa-download mx-1"></i>Download file</a>
    </div>
  </div>
  <div class="container">

    <div class="">

      <div class="card-body">
        <div class="row">
          <div class="col-sm-4 text-center">
            <h1 class="text-warning mt-4 mb-4">
              <b><span id="average_rating">0.0</span> / 5</b>
            </h1>
            <div class="mb-3">
              <i class="fas fa-star star-light mr-1 main_star"></i>
              <i class="fas fa-star star-light mr-1 main_star"></i>
              <i class="fas fa-star star-light mr-1 main_star"></i>
              <i class="fas fa-star star-light mr-1 main_star"></i>
              <i class="fas fa-star star-light mr-1 main_star"></i>
            </div>
            <h3><span id="total_review">0</span> Review</h3>
          </div>
          <div class="col-sm-4">
            <p>
            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
            <div class="progress">
              <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
            </div>
            </p>
            <p>
            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>

            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
            <div class="progress">
              <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
            </div>
            </p>
            <p>
            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>

            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
            <div class="progress">
              <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
            </div>
            </p>
            <p>
            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>

            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
            <div class="progress">
              <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
            </div>
            </p>
            <p>
            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>

            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
            <div class="progress">
              <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
            </div>
            </p>
          </div>
          <div class="col-sm-4 text-center">
            <h3 class="mt-4 mb-3">Write Review Here</h3>
            <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
          </div>
        </div>
      </div>
    </div>
    <div class="mt-5" id="review_content"></div>
  </div>
</body>

</html>
<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Submit Review</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 class="text-center mt-2 mb-4">
          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
          <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
        </h4>
        <div class="form-group">
          <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['id'] ?>" />
        </div>
        <div class="form-group">
          <input type="hidden" name="app_id" id="app_id" value="<?php echo $app_id ?>" />
        </div>
        <div class="form-group">
          <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
        </div>
        <div class="form-group text-center mt-4">
          <button type="button" class="btn btn-primary" id="save_review">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .progress-label-left {
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
  }

  .progress-label-right {
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
  }

  .star-light {
    color: #e9ecef;
  }
</style>
<script>
  function changeTag() {
    var els = document.querySelectorAll('.ctag h3');
    // console.log(els.length);
    for (var i = 0; i < els.length; i++) {
      els[i].outerHTML = '<h4>' + els[i].innerHTML + '</h4>';
    }
  }
</script>

<script>
  $(document).ready(function() {
    var check = "<?php echo $_SESSION['id'] ?? null; ?>"; 
    var app_id = <?php echo $app_id; ?>;
    // console.log(check);
    var rating_data = 0;
    var cr=checkReview();
    console.log(cr);
    $('#add_review').click(function() {
      if(check == ''){
        alert('You have to login to make review');
      } 
      else if(cr==1){
        alert('You can only review one time,(May be you should edit your previously written review)');
      }
      else
      $('#review_modal').modal('show');

    });
    function checkReview(callback){
      var result='';
      $.ajax({
        url:'review.php',
        async:false,
        method:'POST',
        data: {
          'check': check,
          'app_id':app_id
        },
        success:function(data){
          result =data;
        }
      });
      return result;
    }
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
    
    });

    $('#save_review').click(function() {

      var user_id = $('#user_id').val();
      var app_id = $('#app_id').val();
      
      var user_review = $('#user_review').val();

      if (rating_data == 0) {
        alert("Please rate the app to submit");
        return false;
      } else {
        $.ajax({
          url: "review.php",
          method: "POST",
          data: {
            rating_data: rating_data,
            user_id: user_id,
            app_id: app_id,
            user_review: user_review
          },
          success: function(data) {
            
            $('#review_modal').modal('hide');

            load_rating_data();

            if (!alert(data)) {
              window.location.reload();
            }
          }
        })
      }

    });

    load_rating_data();

    function load_rating_data() {
      
      var app_id = <?php echo $app_id; ?>;
      // console.log(app_id);
      // console.log("successd");
      
      $.ajax({
        url: "review.php",
        method: "POST",
        dataType: "JSON",
        data: {
          value:"value",
          'app_id': app_id,
        },
        success: function(data) {

          // console.log("data");
          $('#average_rating').text(data.average_rating);
          $('#total_review').text(data.total_review);

          var count_star = 0;

          $('.main_star').each(function() {
            count_star++;
            if (Math.ceil(data.average_rating) >= count_star) {
              $(this).addClass('text-warning');
              $(this).addClass('star-light');
            }
          });

          $('#total_five_star_review').text(data.five_star_review);

          $('#total_four_star_review').text(data.four_star_review);

          $('#total_three_star_review').text(data.three_star_review);

          $('#total_two_star_review').text(data.two_star_review);

          $('#total_one_star_review').text(data.one_star_review);

          $('#five_star_progress').css('width', (data.five_star_review / data.total_review) * 100 + '%');

          $('#four_star_progress').css('width', (data.four_star_review / data.total_review) * 100 + '%');

          $('#three_star_progress').css('width', (data.three_star_review / data.total_review) * 100 + '%');

          $('#two_star_progress').css('width', (data.two_star_review / data.total_review) * 100 + '%');

          $('#one_star_progress').css('width', (data.one_star_review / data.total_review) * 100 + '%');

          if (data.review_data.length > 0) {
            var html = '';

            for (var count = 0; count < data.review_data.length; count++) {
              html += '<div class="row mb-3">';

              // html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">' + data.review_data[count].user_id.charAt(0) + '</h3></div></div>';

              html += '<div class="col-sm-11">';

              html += '<div class="card">';

              html += '<div class="m-2"><b>' + data.review_data[count].user_name + '</b></div>';

              html += '<div class="card-body">';

              for (var star = 1; star <= 5; star++) {
                var class_name = '';

                if (data.review_data[count].rating >= star) {
                  class_name = 'text-warning';
                } else {
                  class_name = 'star-light';
                }

                html += '<i class="fas fa-star ' + class_name + ' mr-1"></i>';
              }

              html += '<br />';

              html += data.review_data[count].user_review;

              html += '</div>';

              html += '<div class="m-2 text-right">On ' + data.review_data[count].datetime + '</div>';

              html += '</div>';

              html += '</div>';

              html += '</div>';
            }

            $('#review_content').html(html);
          }
        },
        error: function() {
          console.log("error");
        }
      })
    }

  });
</script>