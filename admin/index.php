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
        <nav class="navbar navbar-expand-lg navbar-light bg-danger  ">
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
    <div class="container mt-3 d-flex flex-wrap">
        <div class="m-4 ">
          <div class="card" style="width:30rem; height:20rem;">
            
            <div class="card-body ">
              <img src="images/admin.png" alt="admin-logo" class="card-img-top" style="height:85%">
              <h4 class="card-username ">Admin Users</h4>
              <p class="card-text">View and add/delete admin users</p>
              <a href="#" class="stretched-link" ></a>
            </div>
          </div>
        </div>
        <div class="m-4 ">
          <div class="card" style="width:30rem; height:20rem;">
            <div class="card-body">
              <img src="images/users.png" alt="admin-logo" class="card-img-top" style="height:85%; "> 
              <h4 class="card-username">Users</h4>
              <p class="card-text">View users and active/deactive them</p>
              <a href="#" class="stretched-link"></a>
            </div>
          </div>
        </div>
        <div class="m-4 ">
          <div class="card" style="width:30rem; height:20rem;">
            
            <div class="card-body">
              <img src="images/app.png" alt="admin-logo" class="card-img-top" style="height:85%; "> 
              <h4 class="card-username">Apps</h4>
              <p class="card-text">View all apps</p>
              <a href="app/index.php" class="stretched-link"></a>
            </div>
          </div>
        </div>
      </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap4.js"></script>
</body>

</html>