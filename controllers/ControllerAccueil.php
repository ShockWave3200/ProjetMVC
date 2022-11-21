<?php
require_once('views/View.php');

class ControllerAccueil{
    private $_articleManager;
    private $_view;

    public function __construct($url){
        
        if(isset($url) && count($url)>1){
            throw new Exception('Page Introuvable 2');
        }
        else{
            $this->articles();
        }
    }

    //Genere la vue pour afficher les articles, renvoie aussi la variable qui contient les articles
    private function articles(){
        $this->_articleManager = new ArticleManager;
        $articles=$this->_articleManager->getArticles();

        $this->_view=new View('Accueil');
        $this->_view->generate(array('articles'=>$articles));
    }
}