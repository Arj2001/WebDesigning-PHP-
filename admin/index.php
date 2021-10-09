<?php
session_start();
            // echo '<pre>';
            // var_dump($_SESSION);
            // echo '</pre>';
            // exit;
if (!isset($_SESSION['admin_id'])) {
    header("location:login.php");
  }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- created by ARJUN RAJU -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap4.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>STORE || Admin</title>
</head>

<body>
    <nav class="conatiner">
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <a class="navbar-brand mx-md-4" href="../">STORE</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mr-md-4 ">
                    <li class="nav-item font-weight-bold text-size mx-md-1">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item font-weight-bold text-size mx-md-1">
                        <a class="nav-link" style="cursor: pointer;" href="#"><?php echo $_SESSION["username"]; ?></a>
                    </li>
                    <li class="nav-item font-weight-bold text-size mx-md-1">
                        <a class="nav-link" style="cursor: pointer;" href="logout.php">Logout</a>
                    </li>

            </div>
        </nav>
    </nav>
    <div class="conatiner d-flex justify-content-center mt-md-5">
      <h3 style='text-transform:capitalize'>Welcome <b><?php echo $_SESSION["username"]; ?></b> to Admin Panel</h3>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap4.js"></script>
</body>

</html>