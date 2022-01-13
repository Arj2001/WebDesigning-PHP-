<?php 
require_once("config.php");
if (isset($_POST["add"])) {

$data = array(
    
    ':user_id'        =>    $_POST["user_id"],
    ':app_id'        =>    $_POST["app_id"],
);
$stmt=$pdo->prepare("INSERT INTO favorite (user_id, app_id) VALUES (:user_id, :app_id)");
$stmt->execute($data);
}
if (isset($_POST["remove"])) {

$data = array(
    
    ':user_id'        =>    $_POST["user_id"],
    ':app_id'        =>    $_POST["app_id"],
);
$stmt=$pdo->prepare("DELETE FROM favorite WHERE user_id = :user_id AND app_id = :app_id");
$stmt->execute($data);
}