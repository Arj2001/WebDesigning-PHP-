<?php
session_start();
if (!$_SESSION['uname']) {
    echo '<script type="text/javascript">
    alert("Your are doing an illegal entry please login to continue");
    window.location.href="../index.php";
    </script>';
    exit;
  }
require_once('../../config.php');
$id = $_GET['id'] ?? null;

if (!$id) {
    header('location:index.php');
    exit;
}

$statement = $pdo->prepare('SELECT  * FROM apps WHERE  id= :id');
$statement->bindValue(':id', $id);
$statement->execute();
$apps = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap4.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Description of <?php echo $apps['title'] ?></title>
</head>

<body>
    <div class="container">
        <div class='pt-5 text-md-right'>
            <a href='index.php' class='btn btn-dark'>Back</a>
        </div>
        <div class="container mt-4 ml-4 mb-3 border border-dark rounded-lg" style="border-width:2px !important;">
            <div class="">
                <?php echo $apps['desc']; ?>
            </div>
        </div>
    </div>
</body>

</html>