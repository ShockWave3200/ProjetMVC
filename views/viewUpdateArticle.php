<?php 
print_r($article);
echo "
<div>
    <h2>Ajout Article</h2>
    <form action='article&status=update&id=".$article[0]->idArticle()."' method='post'>
        <span>Ajout d'un article</span>
        <input type='text' name='nomarticle'  value='".$article[0]->nomArticle()."'>
        <input type='text' name='prixarticle' value='".$article[0]->prixArticle()."'>
        <input type='text' name='imgarticle' value='".$article[0]->imgArticle()."'>
        <input type='text' name='descarticle' value='".$article[0]->descArticle()."'>
        <button>Ajouter article</button>
    </form>
</div>";