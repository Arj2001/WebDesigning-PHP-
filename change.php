<?php

session_start();
if (!$_SESSION) {
    echo '<script type="text/javascript">
  alert("Your are doing an illegal entry. Please login to continue");
  window.location.href="./";
  </script>';
    exit;
}
require_once('config.php');

$id = $_SESSION['id'];
$valpass = $_SESSION['password'];

$errors = [];
if (isset($_POST['update'])) {
    $password = $_POST['password'];
    $npass = $_POST['npass'];
    $cnpass = $_POST['cnpass'];
    if (strlen($npass) < 8) {
        $errors[] = "Password should be 8 characters or more!!!";
    }
    if (empty($errors)) {
        if ($npass == $cnpass) {
            if ($valpass == $password) {
                $stmt = $pdo->prepare("UPDATE users SET password = :npass WHERE id =:id");
                $stmt->bindValue(':npass', $npass);
                $stmt->bindValue(':id', $id);
                $stmt->execute();
                $_SESSION['password'] = $npass;
                header("location:profile.php");
                exit;
            } else {
                $errors[] = 'Current password is wrong';
            }
        } else {
            $errors[] = "Password did not match";
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
    <h4>Change Password</h4>
    <form action="" method="POST">
        <label class="my-2 ">Current Password</label>
        <input class="form-control" type="password" name="password" required>
        <label class="my-2 ">New Password</label>
        <input class="form-control" type="password" name="npass" id="npass" value="<?php echo $npass ?>" required>
        <label class="my-2">confirm New Password</label>
        <input class="form-control" type="password" name="cnpass" id="cnpass" value="<?php echo $cnpass ?>" required>
        <span id='message' class="my-1"></span>
        <input type="submit" id="submit" onclick="if (!confirm('Are you sure you want to change the password?')) { return false }" name="update" class="btn btn-info d-block mx-auto mt-3" value="Update">
    </form>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap4.js"></script>
<script>
    $('#npass, #cnpass').on('keyup', function() {
        if ($('#npass').val() == $('#cnpass').val()) {
            $('#message').html('Password Matching').css('color', 'green');
            // $('#submit').removeAttr("disabled");
            $('#submit').prop('disabled', false);
        } else
            $('#message').html('Password Not Matching').css('color', 'red');

    });
    $('#submit').click(function() {
        if ($('#npass').val() != $('#cnpass').val()) {
            alert("Password not matching");
            return false;
        }
    });
</script>
</body>