<?php
  session_start();
  $username = '';
  $password = '';
  $pdo = new PDO('mysql:host=localhost;port=3306;dbname=store', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $errors = [];
  
  if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    if (!$username) {
      $errors[] = 'Username is Needed!!!';
    }
    if(!$password){
      $errors[] ="Password is Needed!!!";
    }
    if(empty($errors)){
      $statement=$pdo->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");
      $statement->bindValue(':username',$username);
      $statement->bindValue(':password',$password);
      $statement->execute(array(  
        'username'     =>     $_POST["username"],  
        'password'     =>     $_POST["password"]  
          )  );
      $count=$statement->rowCount();
      if($count > 0)  
        {   
            $statement2 = $pdo->prepare('SELECT * FROM admin WHERE username = :username');
            $statement2->bindValue(':username',$username);
            $statement2->execute();
            $admin=$statement2->fetch(PDO::FETCH_ASSOC);  
            $_SESSION=$admin;
            // echo '<pre>';
            // var_dump($_SESSION["password"]);
            // echo '</pre>';
            // exit; 
            header("location:index.php");  
        }  
        else  
        {  
          $errors[]="Username or Password is incorrect!!" ;
        }  
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
            <a class="nav-link" style="cursor: pointer;" href="register.php">Register</a>
            </li>
        </ul>    
        </div>  
    </nav>
    </nav>
    <div class="conatiner d-flex justify-content-center mt-md-5">
      <h3>Admin Login</h3>
    </div>
    <div class=" mb-3">
      <div class="container  shadow-lg p-4 bg-white border-round " style="width:30%;margin-top:3rem;">
        <?php if (!empty($errors)) : ?>
          <div class="m-1 alert alert-danger">
            <?php foreach ($errors as $error) : ?>
              <?php echo $error ?><br>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>             
        <form action="" method="POST">
          <label class="my-2">Username</label>
          <input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
          <label class="my-2">Password</label>
          <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
          <button type="submit" name="login" class="btn btn-warning d-block mx-auto mt-3">Login</button>
        </form>    
      </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap4.js"></script>
  </body>
</html>
