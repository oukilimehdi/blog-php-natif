<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = htmlspecialchars($_GET['id']);
} else {
    header('Location: ../../index.php');
}

require_once '../asset/connexion.php';
$pdo = getPdo();

//je récupere l'article avec son id
$query = $pdo->prepare('SELECT * FROM articles WHERE id = :id');
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$article = $query->fetch();

if(!$article){
    header('Location: ../../index.php');
}

//je suprime l'article 
$sql = $pdo->prepare("DELETE FROM articles WHERE id = :id");
$sql->bindParam(':id',$id,PDO::PARAM_INT);
$sql->execute();

header('Location: ../../index.php');