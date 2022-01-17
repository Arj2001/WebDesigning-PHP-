<?php

session_start();
if (!$_SESSION['uname']) {
  echo '<script type="text/javascript">
  alert("Your are doing an illegal entry please login to continue");
  window.location.href="./";
  </script>';
  exit;
 
}
$dev_id = $_GET['id'] ?? null;
$user_id = $_GET['user_id'] ?? null;

require_once('../config.php');
include_once('../function.php');

$stmt = $pdo->prepare("SELECT * FROM apps, dev_app WHERE dev_app.app_id = apps.id AND dev_app.user_id= :user_id ");
$stmt->bindValue(':user_id',$user_id);
$stmt->execute();
$apps = $stmt->fetchAll(PDO::FETCH_ASSOC);

$statement = $pdo->prepare("SELECT * FROM users WHERE id = :user_id");
$statement->bindValue(':user_id',$user_id);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);
if (isset($_POST['aord'])) {
    if ($_POST['status'] == 1) {
        $stmt = $pdo->prepare("UPDATE apps SET status = 0 WHERE id =:id");
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
        header("location:developer_apps.php?id=".$dev_id."&user_id=".$user_id);
    } else {
        $stmt = $pdo->prepare("UPDATE apps SET status = 1 WHERE id =:id");
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
        header("location:developer_apps.php?id=".$dev_id."&user_id=".$user_id);
    }
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
  <title>STORE</title>
</head>

<body>
  <nav class="conatiner">
    <nav class="navbar navbar-expand-lg navbar-light bg-danger">
      <a class="navbar-brand mx-md-4" href="./">SOFTSTORE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mr-md-4 ">
          

          <?php
          if (isset($_SESSION['username'])) {
            echo '<li class="nav-item font-weight-bold text-size mx-md-1">
                    <a class="nav-link" style="cursor: pointer;" href="../logout.php">Logout</a>
                    </li>';
          } 
          ?>
      </div>
    </nav>
  </nav>


  <div class="conatiner d-flex justify-content-center mt-md-5">
    <h1><?php echo $user['name'] ?>'s uploaded apps</h1>
    </div>
    <div class="conatiner d-flex justify-content-center">
    <h4>Here you can view softwares</h4>
  </div>
  <div class="container">
    <div class="conatiner  mt-md-5">
      <h3 style='text-transform:capitalize'></h3>
    </div>
    <div class="table-responsive my-md-4">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Icon</th>
            <th scope="col">Comment</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Free</th>
            <th scope="col">File</th>
            <th scope="col">Size</th>
            <th scope="col">Version</th>
            <th scope="col">Created Date</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($apps as $i => $apps) {  $size = sizeConvert($apps['size']);?>
            <!--: ?> -->

            <tr>
              <th scope="row"><?php echo $i + 1 ?></th>
              <td><?php echo $apps['id'] ?></td>
              <td><?php echo $apps['name'] ?></td>
              <td><img src="<?php echo $apps['icon'] ?>" style="width:40px;"></td>
              <td><?php echo $apps['small_desc'] ?></td>
              <td><a href="view.php?id=<?php echo $apps['id'] ?>">View</a></td>
              <td><?php echo $apps['price'] ?></td>
              <td><?php if ($apps['free']==1) echo "No"; else echo "Yes" ?></td>
              <td><a href="<?php echo $apps['file']; ?>" download="<?php echo $apps['file']; ?>" class="download_link"><i class="fa fa-download "></i>Download</a></td>
              <td><?php echo $size ?></td>
              <td><?php echo $apps['version'] ?></td>
              <td><?php echo $apps['date'] ?></td>
              <td>               
               <form style="display: inline-block;" method="post" >
                  <input type="hidden" value="<?php echo $apps['id'] ?>" name="id">
                  <input type="hidden" value="<?php echo $apps['status'] ?>" name="status">
                  <button type="submit" name="aord" onclick="if (!confirm('Are you sure you want to continue?')) { return false }" class="btn btn-sm <?php if ($apps['status'] == 1) echo "btn-danger";
                                                                                                                                                                                    else echo "btn-info" ?>"><?php if ($apps['status'] == 1) echo "Deactivate";
                                                                                                                                                                                    else echo "Activate" ?></button>
                </form>
              </td>
             </tr>
          <?php } ?>
          <!-- endforeach; apps -->
        </tbody>
      </table>
    </div>
  </div>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap4.js"></script>
</body>
</html>