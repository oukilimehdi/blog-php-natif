<?php

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
}

require_once '../asset/connexion.php';
$pdo = getPdo();

$query = $pdo->prepare('SELECT * FROM comments WHERE id = :id');
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();
$commentaire = $query->fetch();

if(!$commentaire) {
    header('Location: ../../index.php');
}

$sql= $pdo->prepare('DELETE FROM comments WHERE id = :id');
$sql->bindParam(':id', $id, PDO::PARAM_INT);
$sql->execute();

header('Location: details.php?id=' . $id);