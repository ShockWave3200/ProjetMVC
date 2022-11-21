<h1><?= $article[0]->nomArticle()?></h1>
<?php 



    echo $article[0]->imgArticle();
    echo "<p>Prix : ".$article[0]->prixArticle()."</p>";
    echo "<p>Description : ".$article[0]->descArticle()."</p>";
    echo "<img src='images/".$article[0]->imgArticle()."' alt=''>";
    
   
    
    