<?php
session_start();
require_once('../../config.php');
$statement = $pdo->prepare("SELECT * FROM apps ORDER BY id ");
$statement->execute();
$apps = $statement->fetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// var_dump($apps);
// echo "</pre>";
// exit;
?>
<!doctype html>
<html lang="en">

<head>
  <!-- created by ARJUN RAJU -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../../css/bootstrap4.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="../../css/style.css">
  <title>View and Edit apps</title>
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
            <a class="nav-link" style="cursor: pointer;" href="#"><?php echo $_SESSION["uname"]; ?></a>
          </li>
          <li class="nav-item font-weight-bold text-size mx-md-1">
            <a class="nav-link" style="cursor: pointer;" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </nav>
  <div class="container">
    <div class="conatiner  mt-md-5">
      <h3 style='text-transform:capitalize'>View and Edit apps</h3>
    </div>
    <div class='pt-5 text-md-right'>
      <a href='upload.php' class='btn btn-success'>Upload New</a>
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
          <?php foreach ($apps as $i => $apps) { ?>
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
              <td><?php echo $apps['size'] ?></td>
              <td><?php echo $apps['version'] ?></td>
              <td><?php echo $apps['date'] ?></td>
              <td>
                <a href="update.php?id=<?php echo $apps['id'] ?>" type="button" class="btn btn-sm btn-primary">Edit</a>
                <form style="display: inline-block;" method="post" action="delete.php">
                  <input type="hidden" value="<?php echo $apps['id'] ?>" name="id">
                  <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
              </td>

            </tr>
          <?php } ?>
          <!-- endforeach; apps -->
        </tbody>
      </table>
    </div>
  </div>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap4.js"></script>
</body>
</hmtl>