<?php

session_start();

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
  <title>STORE</title>
</head>

<body>
  <nav class="conatiner">
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
      <a class="navbar-brand mx-md-4" href="#">STORE</a>
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
                    <a class="nav-link" style="cursor: pointer;" href="#">' . $_SESSION['username'] . '</a>
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


  <div class="conatiner d-flex justify-content-center mt-md-5">
    <h1>Search Our STORE</h1>
  </div>
  <div class="container mt-5 py-5">

    <form class="d-flex justify-content-center">
      <input type="search" class="form-control" style="width:60%" placeholder="search..">
      <button class="form-check-inline btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
    </form>

  </div>
  <div class="container">
    <h2 class="text-center">OR</h2>
    <h2 class="text-center">Try our Suggestions..</h2>
    <?php
    require_once('config.php');
    $stmt = $pdo->prepare("SELECT * FROM apps ORDER BY rand() LIMIT 2");
    $stmt->execute();
    $apps = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // echo "<pre>";
    // var_dump($apps);
    // exit;
    ?>
    <div class="container mt-3 d-flex flex-wrap">
      <?php foreach ($apps as $i => $apps) { ?>
        <div class="m-4 ">
          <div class="card" style="width:200px">
            <img class="card-img-top" src="<?php echo str_replace("../../","",$apps['icon']) ?> " >
            <div class="card-body">
              <h4 class="card-username"><?php echo $apps['name'] ?></h4>
              <p class="card-text"><?php echo $apps['small_desc'] ?></p>
              <a href="apps.php" class="btn btn-primary stretched-link download_link">Download</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap4.js"></script>
</body>
</html>