<?php

session_start();
if (!$_SESSION) {
  echo '<script type="text/javascript">
  alert("Your are doing an illegal entry please login to continue");
  window.location.href="./";
  </script>';
  exit;
}
require_once('config.php');

$username = $_SESSION['username'];
$name = $_SESSION['name'];
$age = $_SESSION['age'];
$email = $_SESSION['email'];
$errors = [];
if (isset($_POST['update'])) {
  $username = $_POST['username'];
  $name = $_POST['name'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  if (!$username) {
    $errors[] = 'Username is Needed!!!';
  } else if (!ctype_alnum($username)) {
    $errors[] = 'Username should contain only alphabet and numbers!!!';
  }
  if (!$name) {
    $errors[] = 'Name is Needed!!!';
  } else if (!ctype_alpha(str_replace(' ', '', $name))) {
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
  if (empty($errors)) {
    $data1 = array(
      ':username' => $username,
      ':id' => $_SESSION['id']
    );
    $data2 = array(
      ':email' => $email,
      ':id' => $_SESSION['id']
    );
    $duplicate1 = $pdo->prepare("SELECT * FROM users WHERE username = :username AND id <> :id");
    $duplicate1->execute($data1);
    $duprow1 = $duplicate1->rowCount();
    $duplicate2 = $pdo->prepare("SELECT * FROM users WHERE email = :email AND id <> :id");
    $duplicate2->execute($data2);
    $duprow2 = $duplicate2->rowCount();
    if ($duprow1 > 0) {
      $errors[] = "The username is already registerd create new one!!!";
    }
    if ($duprow2 > 0) {
      $errors[] = "The email is already exist, add new one!!!";
    }
    if (empty($errors)) {
      $statement = $pdo->prepare("UPDATE  users SET username = :username, email = :email, 
                                  name = :name, age = :age WHERE id = :id
                                  ");
      $data3 = array(
          ':username' => $username,
          ':email' => $email,
          ':name' => $name,
          ':age' => $age,
          ':username' => $username,
          ':id' => $_SESSION['id']
      );
      $statement->execute($data3);
      $stmt = $pdo->prepare("SELECT * FROM users WHERE id =:id");
      $stmt->execute(array(':id' => $_SESSION['id']));
      $_SESSION=$stmt->fetch(PDO::FETCH_ASSOC);
      header("location:profile.php");
      exit;
    }
  }
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
<div class="container mt-md-5  shadow-lg p-4 mb-4 bg-white border-round" style="width:40%;">
  <div class='pt-2 text-md-right'>
    <a href='profile.php' class='btn btn-dark'>Back</a>
  </div>
  <?php if (!empty($errors)) : ?>
    <div class="m-1 alert alert-danger">
      <?php foreach ($errors as $error) : ?>
        <?php echo $error ?><br>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
  <h4>Update your details</h4>
  <form action="" method="POST">
    <label class="my-2 ">Email:</label>
    <input class="form-control" type="email" name="email" value="<?php echo $email; ?>">
    <label class="my-2 ">Name:</label>
    <input class="form-control" type="text" name="name" value="<?php echo $name; ?>">
    <label class="my-2">Username:</label>
    <input class="form-control" type="text" name="username" value="<?php echo $username; ?>">
    <label class="my-2">Age:</label>
    <input class="form-control" type="number" name="age" value="<?php echo $age; ?>">
    <button type="submit" onclick="if (!confirm('Are you sure you want to update?')) { return false }"name="update" class="btn btn-info d-block mx-auto mt-3">Update</button>
  </form>
</div>

</body>