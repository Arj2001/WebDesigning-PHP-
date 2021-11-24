<?php

require_once('../../config.php');
$id=$_POST['id'] ?? null;
if(!$id){
    header('location:index.php');
    exit;
}
$fetch=$pdo->prepare('SELECT * FROM apps WHERE id = :id');
$fetch->bindValue(':id' ,$id);
$fetch->execute();
$apps=$fetch->fetch(PDO::FETCH_ASSOC);

// echo '<pre>';
// var_dump($apps);
// echo "</pre>";


$statement=$pdo->prepare('DELETE FROM apps WHERE id= :id');
$statement->bindValue(':id' ,$id);
$statement->execute();



if($apps['icon']){
    unlink($apps['icon']);
}
if($apps['file']){
    unlink($apps['file']);
}
$path='../../apps/'.$apps['name'];
$path1='../../apps/'.$apps['name'].'/images';

if($path1){
    rmdir($path1);
}
if($path){
    rmdir($path);
}
header('location:index.php');
exit;



?>
