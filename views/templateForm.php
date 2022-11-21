<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un article</title>
</head>
<header>
    <h1>
        <a href="<?= URL ?>">Mon blog</a>
    </h1>
    <p>Bienvenue sur mon blog</p>
</header>
<?php echo $content ?>
<div>
    <h2>Ajout Article</h2>
    <form action="article&status=new" method="post">
        <span>Ajout d'un article</span>
        <input type="text" name="nomarticle" placeholder="Nom">
        <input type="text" name="prixarticle" placeholder="Prix">
        <input type="text" name="imgarticle" placeholder="img">
        <input type="text" name="descarticle" placeholder="Description">
        <button>Ajouter article</button>
    </form>
</div>
<footer>
    <p>Créé par PA</p>
</footer>
</html>