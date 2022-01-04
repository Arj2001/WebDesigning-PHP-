<?php
session_start();
if (!$_SESSION) {
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

$filePath = $apps['file'];
$iconPath = $apps['icon'];
$floderName = $apps['dir'];

$errors = [];
if (isset($_POST['icon'])) {

    $icon = $_FILES['icon'];
    $iconPath = '';
    if ($icon && $icon['tmp_name']) {

        $iconPath = $floderName . '/images/' . $icon['name'];
        // die("$iconPath");
        move_uploaded_file($icon['tmp_name'], $iconPath);
    }

    $statement = $pdo->prepare("UPDATE  `apps` SET  icon = :icon where id=:id");
    $statement->bindValue(':id', $id);
    $statement->bindValue(':icon', $iconPath);
    $statement->execute();
}
if (isset($_POST['file'])) {
    $file = $_FILES['file'];
    $size = $_FILES['file']['size'];
    $filePath = '';
    if ($file && $file['tmp_name']) {

        $filePath = $floderName . '/' . $file['name'];
       
        move_uploaded_file($file['tmp_name'], $filePath);
    }
    $statement = $pdo->prepare("UPDATE  `apps` SET  size =:size, file=:file where id=:id");
    $statement->bindValue(':id', $id);
    $statement->bindValue(':file', $filePath);
    $statement->bindValue(':size', $size);
    $statement->execute();
}

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
                        <a class="nav-link" style="cursor: pointer;" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </nav>
    <div class="container px-4">
        <div class="conatiner mx-5 mt-md-5">
            <h3 style='text-transform:capitalize'>Update</h3>
        </div>
        <div class='pt-5 text-md-right'>
            <a href='update.php' class='btn btn-info'>Back</a>
        </div>
        <div class=" container-fluid m-3 p-2 border">
            <form action="" method='post' enctype="multipart/form-data">
                <div class="form-group">
                    <div class="mb-3">
                        <label for="ci" class="text-size">Current Icon</label>
                        <img id="ci" src="<?php echo $apps['icon'] ?>" style="width:40px;" class="update-img">
                    </div>
                    <label class="text-size" for="icon">Upload the icon for the app:</label>
                    <br>
                    <input type="file" id="icon" name="icon" value="<?php echo $icon; ?>" style="width: 45%;" required>
                </div>
                <button type="submit" name="icon" class="btn btn-success">Save</button>
            </form>
        </div>
        <div class=" container-fluid m-3 p-2 border">
            <form action="" method='post' enctype="multipart/form-data">
                <div class="form-group">
                    <label class="text-size" for="file">Upload the app file(Should be .exe or zip file):</label><br>
                    <input type="file" class="" id="file" name="file" style="width: 45%;" required>
                </div>
                <button type="submit" name="file" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
    <br>
    <br>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap4.js"></script>
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $("#price").hide();
            $("#free").change(function() {
                $("#price").show();
            });
            $("#free1").change(function() {
                $("#price").hide();
            });
        });
    </script> -->
    <!-- <script src="../../ckeditor/build/ckeditor.js"></script>
    <script>
     ClassicEditor
				.create( document.querySelector( '#desc' ), {
					
					licenseKey: '',
					
					
					
				} )
				.then( editor => {
					window.editor = editor;
			
					
					
					
				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: d1pxjkepsyns-8ek9xs5l5res' );
					console.error( error );
				} );
    </script> -->
</body>
</hmtl>