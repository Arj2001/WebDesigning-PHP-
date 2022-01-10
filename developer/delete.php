<?php

require_once('../config.php');
include('../function.php');
$id=$_POST['id'] ?? null;
if(!$id){
    header('location:index.php');
    exit;
}
$fetch=$pdo->prepare('SELECT dir FROM apps WHERE id = :id');
$fetch->bindValue(':id' ,$id);
$fetch->execute();
$apps=$fetch->fetch(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($apps);
// echo "</pre>";
// exit;


$statement=$pdo->prepare('DELETE FROM apps WHERE id= :id');
$statement->bindValue(':id' ,$id);
if($statement->execute()){
    removeDir($apps['dir']);
}

header('location:index.php');
exit;



?>
