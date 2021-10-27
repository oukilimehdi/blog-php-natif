<?php
require_once '../asset/connexion.php';
$pdo = getPdo();
$result = $pdo->query('SELECT * FROM articles ORDER BY created_at DESC');
$articles = $result->fetchAll();

$pageTitle = " Acceuil";
ob_start();
require('articles/index.php');
$pageContent = ob_get_clean();

require('layout.php');