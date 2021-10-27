<h1 class="text-center"><?= $article['title'] ?></h1>
<small>Ecrit le <?= $article['created_at'] ?></small>
<p><?= $article['introduction'] ?></p>
<hr>
<?= $article['content'] ?>

<?php if (count($commentaires) === 0) : ?>
    <h2>Il n'y a pas encore de commentaires pour cet article ... SOYEZ LE PREMIER ! :D</h2>
<?php else : ?>
    <h3>Il y a déjà <?= count($commentaires) ?> réactions : </h3>
    <?php foreach ($commentaires as $commentaire) : ?>
        <h3>Commentaire de <?= $commentaire['author'] ?></h3>
        <small>Le <?= $commentaire['created_at'] ?></small>
        <blockquote>
            <em><?= $commentaire['content'] ?></em>
        </blockquote>
        <a class="btn btn-danger" href="../../models/deleteComment.php?id=<?= $commentaire['id'] ?>" onclick="return window.confirm(`Êtes vous sûr de vouloir supprimer ce commentaire ?!`)">Supprimer</a>
        <hr>
    <?php endforeach ?>
<?php endif ?>

<div class="col-md-5 mx-auto">

    <form class="form-group" action="../../models/saveComment.php" method="POST">
        <h3>Vous voulez réagir ? A vous de jouer !</h3>
        <input class="form-control mb-2"  name="author" required placeholder="Votre pseudo !">
        <textarea class="form-control mb-2" name="content" required id="" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>
        <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
        <button class="btn btn-primary mt-1">Commenter !</button>
    </form>

</div>