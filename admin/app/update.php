<?php

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

$name = $apps['name'];
$small_desc = $apps['small_desc'];
$desc = $apps['desc'];
$price = $apps['price'];
$version = $apps['version'];
$floderName = $apps['dir'];
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $small_desc = $_POST['small_desc'];
    $desc= $_POST['desc'];
    $version = $_POST['version'];

    $date = date('Y-m-d H:i:s');
    if ($_POST['free'] == '1') {
        if (empty($_POST['price']) || $_POST['price'] == 0)
            $errors[] = "Price not inserted";
        else
            $price = $_POST['price'];
    } else $price = 0;
    $free = $_POST['free'];


    if (empty($errors)) {

        $statement = $pdo->prepare("UPDATE  `apps` SET name = :name,  `small_desc` =:small_desc, `desc` =:desc, price = :price, free=:free,  version=:version ");
        $statement->bindValue(':name', $name);
        $statement->bindValue(':small_desc', $small_desc);
        $statement->bindValue(':desc', $desc);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':free', $free);
        $statement->bindValue(':version', $version);
        $statement->execute();
        echo "success";
        header("location:index.php");
        exit;
    }
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
                        <a class="nav-link" style="cursor: pointer;" href="#"><?php echo $_SESSION["username"]; ?></a>
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
            <h3 style='text-transform:capitalize'>Update</h3>
        </div>
        <div class="container-fluid">
            <div class='pt-5 text-md-right'>
                <a href='index.php' class='btn btn-info'>Back</a>
            </div>
            <?php if (!empty($errors)) : ?>
                <div class="alert alert-danger m-2">
                    <?php foreach ($errors as $error) : ?>
                        <?php echo $error ?><br>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <form action="" method='post' enctype="multipart/form-data">
                <div class="form-group">
                    <a href="update_icon_app.php?id=<?php echo $apps['id'] ?>" class="text-size">Update the Icon and Software</a>
                </div>
                <div class="form-group">
                    <label class="text-size" for="name">Enter the name of Software:</label>
                    <input type="text" class="form-control" id="name" value="<?php echo $name; ?>" name="name" style="width: 45%;" required>
                </div>
                <div class="form-group">
                    <label class="text-size" for="small_desc">Give a small description about the Software(Little but effective):</label>
                    <input type="text" class="form-control" id="small_desc" value="<?php echo $small_desc; ?>" name="small_desc" style="width: 45%;" required>
                </div>
                <div class="form-group">
                    <label class="text-size" for="desc">Give an elbroate descripation about the app:</label>
                    <textarea rows='10' class="form-control" id="desc" name="desc" style="width: 70%;" required>
                    <?php echo $desc; ?>
                    </textarea>
                </div>
                <div class="from-group">
                    <label class="text-size">Is the software paid:</label>
                    <div class=" form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" id="free" name="free" value="1" <?php if ($apps['free'] == 1) echo "checked" ?> required>Yes
                        </label>
                        <label class="form-check-label ml-1">
                            <input type="radio" class="form-check-input" id="free1" name="free" value="0" <?php if ($apps['free'] == 0) echo "checked" ?> required>No
                        </label>
                    </div>
                </div>
                <div class="form-group" id="price">
                    <label class="text-size">Give a reasonable price:</label>
                    <input type="number" class="form-control" step="0.01" name="price" value="<?php echo $price; ?>" style="width: 45%;">
                </div>
                <div class="form-group">
                    <label class="text-size" for="version">What version is this Software</label>
                    <input type="text" class="form-control" id="version" name="version" value="<?php echo $version; ?>" style="width: 45%;" required>
                </div>
                <button type="submit" name="upload" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    <br>
    <br>
    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap4.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#price").hide();
            $("#free").change(function() {
                $("#price").show();
            });
            $("#free1").change(function() {
                $("#price").hide();
            });
        });
    </script>
    <script src="../../ckeditor/build/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#desc'), {

                licenseKey: '',



            })
            .then(editor => {
                window.editor = editor;




            })
            .catch(error => {
                console.error('Oops, something went wrong!');
                console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
                console.warn('Build id: d1pxjkepsyns-8ek9xs5l5res');
                console.error(error);
            });
    </script>
</body>
</hmtl>