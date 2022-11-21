
    
<a href="article&create">Ajout Article</a>

<?php
$this->_t='Mon magasin';

foreach ($articles as $article) {
    echo "<div><h1>".$article->nomArticle()."</h1><p>Prix : ".$article->prixArticle()."€</p>
    <p>
    <a href='article&id=".$article->idArticle()."'>Lire la suite</a>
    <a href='article&update&id=".$article->idArticle()."'>Modifier article</a>
    <a href='article&delete&id=".$article->idArticle()."'>Supprimer article</a>
    
    
    </p></div>";
    
}
?>

