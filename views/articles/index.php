<h1 style="text-align: center"> Nos Articles </h1>

<?php foreach ($articles as $article) : ?>

    <h2><?= $article['title'] ?></h2>
    <small> Ecrit le <?= $article['created_at'] ?> </small>
    <p><?= $article['introduction'] ?> </p>
    <a class="btn btn-primary" href="../../models/details.php?id=<?=$article['id'] ?>">Lire la suite</a>
    <a class="btn btn-danger" href="../../models/deleteArticle.php?id=<?= $article['id'] ?>" onclick="return window.confirm('êtes vous sur de vouloir suprimer cet article??')" > Suprimer </a>

<?php endforeach ?>