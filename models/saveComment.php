<?php

$author = null;
if (!empty($_POST['author'])) {
    $author = htmlspecialchars($_POST['author']);
}

$content = null;
if (!empty($_POST['content'])) {
    $content = htmlspecialchars($_POST['content']);
}

$id = null;
if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) {
    $id = $_POST['article_id'];
}

if (!$author || !$id || !$content) {
    header('Location: ../../index.php');
}

require_once '../asset/connexion.php';
$pdo = getPdo();

$query = $pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :id, created_at = NOW()');
$query->bindParam(':author', $author, PDO::PARAM_STR);
$query->bindParam(':content', $content, PDO::PARAM_STR);
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();

header('Location: details.php?id=' . $id);
