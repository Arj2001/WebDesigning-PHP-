<?php
session_start();
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
// exit;
if (!$_SESSION['uname']) {
    echo '<script type="text/javascript">
    alert("Your are doing an illegal entry please login to continue");
    window.location.href="./";
    </script>';
    exit;
}
if (!isset($_SESSION['admin_id'])) {
    header("location:login.php");
}
require_once('../config.php');

$statement = $pdo->prepare("SELECT * FROM users ORDER BY created_date");
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['aord'])) {
    if ($_POST['status'] == 1) {
        $stmt = $pdo->prepare("UPDATE users SET status = 0 WHERE id =:id");
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
        header("location:users.php");
    } else {
        $stmt = $pdo->prepare("UPDATE users SET status = 1 WHERE id =:id");
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
        header("location:users.php");
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
    <title>STORE || Admin</title>
</head>
<style>
    /* tr:nth-child(odd) {
    background-color: lightskyblue;
    }

   tr:nth-child(even) {
    background-color: lightpink;
    } */
    .tbl_h {
        background-color: lightseagreen;
    }

    /* div.sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
    } */
</style>

<body>
    <nav class="conatiner">
        <nav class="navbar navbar-expand-lg navbar-light bg-danger  ">
            <a class="navbar-brand mx-md-4" href=" ">SOFTSTORE</a>
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
            </div>
        </nav>
    </nav>
    <div class="container">
        <div class="conatiner  mt-md-5">
            <h3 style='text-transform:capitalize'>View users</h3>
        </div>
        <!-- <div class='pt-5 text-md-right'>
      <a href='upload.php' class='btn btn-success'>Upload New</a>
    </div> -->
        <div class="table-responsive my-md-4">
            <table class="table table-hover">
                <thead>
                    <div class="sticky">
                        <tr>
                            <th class="tbl_h" scope="col">#</th>
                            <th class="tbl_h" scope="col">Id</th>
                            <th class="tbl_h" scope="col">Name</th>
                            <th class="tbl_h" scope="col">username</th>
                            <th class="tbl_h" scope="col">Age</th>
                            <th class="tbl_h" scope="col">Email</th>
                            <th class="tbl_h" scope="col">Developer</th>
                            <th class="tbl_h" scope="col">Joined Date</th>
                            <th class="tbl_h" scope="col"></th>
                        </tr>
                    </div>
                </thead>
                <tbody>
                    <?php foreach ($users as $i => $users) {
                        $stmt = $pdo->prepare("SELECT dev_id FROM developer WHERE user_id = :id");
                        $stmt->bindValue(':id', $users['id']);
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        if ($count > 0) {
                            $dev = true;
                            $users['dev_id'] = $stmt->fetch(PDO::FETCH_COLUMN);
                        } else {
                            $dev = false;
                        }
                    ?>
                        <!--: ?> -->

                        <tr>
                            <th scope="row">#<?php echo $i + 1 ?></th>
                            <td><?php echo $users['id'] ?></td>
                            <td><?php echo $users['name'] ?></td>
                            <td><?php echo $users['username'] ?></td>
                            <td><?php echo $users['age'] ?></td>
                            <td><a href="mailto:<?php echo $users['email'] ?>"><?php echo $users['email'] ?></a></td>
                            <td><?php if ($dev) echo "<a href='developer_apps.php?id=" . $users['dev_id'] . "&user_id=" . $users['id'] . "' class='text-success' '>Yes</a>";
                                else echo "No"; ?></td>
                            <td><?php echo $users['created_date'] ?></td>
                            <td>
                                <form style="display: inline-block;" method="post">
                                    <input type="hidden" value="<?php echo $users['id'] ?>" name="id">
                                    <input type="hidden" value="<?php echo $users['status'] ?>" name="status">
                                    <button type="submit" name="aord" onclick="if (!confirm('Are you sure you want to continu?')) { return false }" class="btn btn-sm <?php if ($users['status'] == 1) echo "btn-danger";
                                                                                                                                                                                    else echo "btn-info" ?>"><?php if ($users['status'] == 1) echo "Deactivate";
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