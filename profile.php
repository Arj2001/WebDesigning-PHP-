<?php
require_once('config.php');
session_start();
if (!$_SESSION['username']) {
    echo '<script type="text/javascript">
    alert("Your are doing an illegal entry please login to continue");
    window.location.href="./";
    </script>';
    exit;
}
if (isset($_POST['join'])) {
    $stmt = $pdo->prepare("INSERT INTO developer (user_id) VALUES (:id)");
    // echo "INSERT INTO `developer`(`user_id`) VALUES (':id')";
    // exit;
    $stmt->bindValue(':id', $_SESSION['id']);
    $stmt->execute();
}
$stmt = $pdo->prepare("SELECT * FROM developer WHERE user_id = :id");
$stmt->bindValue(':id', $_SESSION['id']);
$stmt->execute();
$count = $stmt->rowCount();
if ($count > 0) {
    $dev = true;
} else {
    $dev = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['username']; ?> -Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap4.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
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
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3 ">
                                    <h4><?php $n = explode(' ', $_SESSION['name']);
                                        echo $n[0]; ?></h4>
                                    <p class="text-secondary mb-1"><b>Age:</b><?php echo $_SESSION['age']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3 p-md-2">
                    <?php if ($dev) {
                        echo '<h5 for="#join_dev" class="my-md-2 text-center"><b>Developer</b></h5>
                             <a href="developer/index.php" class="btn btn-outline-danger">Enter</a>';
                    } else {
                        echo '
                              <h5 for="#join_dev" class="my-md-2 text-center"><b>Join as Developer</b></h5>
                              <input type="button" id="join_dev" class="btn btn-outline-danger" value="JOIN" data-toggle="modal" data-target="#join">
                              ';
                    }
                    ?>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $_SESSION['name']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $_SESSION['email']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Username</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $_SESSION['username']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Joined On</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo date('d-m-Y', strtotime($_SESSION['created_date'])); ?>
                                </div>
                            </div>
                            <!-- <hr> -->
                            <!-- <div class="row" >
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    Bay Area, San Francisco, CA
                                </div>
                            </div> -->
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info" href="edit.php">Edit</a>

                                    <a href='change.php' class='btn btn-danger text-md-right'>Change Password</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row gutters-sm">
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                    <small>Web Design</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Website Markup</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>One Page</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Mobile Template</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Backend API</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                                    <small>Web Design</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Website Markup</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>One Page</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Mobile Template</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <small>Backend API</small>
                                    <div class="progress mb-3" style="height: 5px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>

        </div>
    </div>
    <div class="modal" id="join">
        <div class="modal-dialog">
            <div class="modal-content px-1 pb-1">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-center">Join as Developer</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body p-md-4">
                    We at Softstore welcome you to become a part of our developer program. You can upload any software which will be useful to
                    a large community. You can license your app and can get paid for downloads.
                    <div class="my-3">
                        <input type="checkbox" id="accept">
                        I accept the <a href="terms.html" class="link">terms and conditions</a>
                    </div>
                    <form method="POST">
                        <input class="btn btn-outline-danger" style="display:none" type="submit" id="join_sub" name="join" value="Join">
                    </form>

                </div>

            </div>
        </div>
    </div>
    <style type="text/css">
        body {
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }
    </style>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap4.js"></script>
    <script>
        $("#accept").click(function() {
            $("#join_sub").toggle(this.checked);
        });
    </script>
</body>

</html>