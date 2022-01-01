<?php

session_start();
require_once('config.php');

$id = $_GET['id'] ?? null;

if (!$id) {
    header('location:index.php');
    exit;
}
$stmt=$pdo->prepare("SELECT * FROM apps WHERE id = :id");
$stmt->bindValue(':id',$id);
$stmt->execute();
$apps = $stmt->fetch(PDO::FETCH_ASSOC);

$ext = pathinfo($apps['file'], PATHINFO_EXTENSION);

// echo "<pre>";
// var_dump($ext);
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
  <title>STORE</title>
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
   <div class="container my-4">
        <div class="ctag">
            <img src="<?php echo str_replace("../../","",$apps['icon']) ?>" class="img-rounded img-thumbnail" style="width:200px;" alt="app-image">
            <?php echo $apps['desc']; ?>    
            <a  href="<?php echo str_replace("../../","",$apps['file']) ?>" download="<?php echo $apps['name'].'.'.$ext; ?>" class="btn btn-success btn-lg"><i class="fa fa-download mx-1"></i>Download file</a> 
        </div>
   </div>
   <script src="js/jquery.js"></script>
  <script src="js/bootstrap4.js"></script>
  <script>
  function changeTag()
    {
        var els = document.querySelectorAll('.ctag h3');
        console.log(els.length);
        for (var i = 0; i < els.length ; i++) {
            els[i].outerHTML = '<h4>' + els[i].innerHTML + '</h4>';
        }
        // var els = document.querySelectorAll('.ctag h2');
        // console.log(els.length);
        // for (var i = 0; i < els.length ; i++) {
        //     els[i].outerHTML = '<h3>' + els[i].innerHTML + '</h3>';
        // }
    }
  </script>
</body>
</html>