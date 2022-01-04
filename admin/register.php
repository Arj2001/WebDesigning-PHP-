<?php
//admin register page
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=store', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];
$name = '';
$uname = '';
$email = '';
$age = '';
$password = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $password = $_POST['password'];
  $date = date('Y-m-d H:i:s');

  if (!$uname) {
    $errors[] = 'Username is Needed!!!';
  }else if(!ctype_alnum($uname)){
    $errors[] = 'Username should be alphanumeric!!!';
  }
  if (!$name) {
    $errors[] = 'Name is Needed!!!';
  } else if(!ctype_alpha(str_replace(' ','',$name))){
    $errors[] = 'Name can contain only alphabet!!!';
  }
  if (!$email) {
    $errors[] = 'Email is needed!!!';
  }
  if (!$age) {
    $errors[] = 'Age is Needed!!!';
  } else if (($age >= 150) || ($age <= 8)) {
    $errors[] = 'Age should be b/w 8 and 150!!!';
  }
  if (!$password) {
    $errors[] = 'Password is Needed!!!';
  } else if(strlen($password)<8){
    $errors[] ="Password should be 8 characters or more!!!";
  }
  if (empty($errors)) {
  $duplicate1=$pdo->prepare("SELECT * FROM admin WHERE usename = :uname");
  $duplicate1->bindValue(':uname',$uname);
  $duplicate1->execute();
  $duprow1=$duplicate1->rowCount();
  $duplicate2=$pdo->prepare("SELECT * FROM admin WHERE email = :email");
  $duplicate2->bindValue(':email',$email);  
  $duplicate2->execute();
  $duprow2=$duplicate2->rowCount();
  if($duprow1>0){
    $errors[]="The username is already registerd create new one!!!";
  }
  if($duprow2>0){
    $errors[]="The email is already exist, add new one!!!";
  }
  }
  if (empty($errors)) {
    $statement = $pdo->prepare("INSERT INTO admin(uname, email, name, age, password, created_date)
              VALUES (:uname , :email , :name , :age, :password,  :date)
            ");

    $statement->bindValue(':uname', $uname);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':age', $age);
    $statement->bindValue(':password', $password);
    $statement->bindValue(':date', $date);
    $statement->execute();
    header("location:login.php");
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
            <a class="nav-link" style="cursor: pointer;" href="login.php">Login</a>
          </li>
        </ul>
      </div>
    </nav>
  </nav>
  <div class="conatiner d-flex justify-content-center mt-md-5">
      <h3>Create Your Admin account</h3>
  </div>
  <div class="container mt-md-5 pt-md-5 shadow-lg p-4 mb-4 bg-white border-round" style="width:40%;">
    <?php if (!empty($errors)) : ?>
      <div class="m-1 alert alert-danger">
        <?php foreach ($errors as $error) : ?>
          <?php echo $error ?><br>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
    <form action="" method="POST">
      <label class="my-2 ">Email</label>
      <input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
      <label class="my-2 ">Name</label>
      <input class="form-control" type="text" name="name" value="<?php echo $name; ?>">
      <label class="my-2">Username</label>
      <input class="form-control" type="text" name="uname" value="<?php echo $uname; ?>">
      <label class="my-2">Password</label>
      <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
      <label class="my-2">Age</label>
      <input class="form-control" type="number" name="age" value="<?php echo $age; ?>">
      <button type="submit" name="signup" class="btn btn-warning d-block mx-auto mt-3">Register</button>
    </form>
  </div>

  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap4.js"></script>
</body>

</html>