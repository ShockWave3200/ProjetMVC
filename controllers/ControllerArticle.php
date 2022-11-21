<?php
require_once('views/View.php');

class ControllerArticle{
    private $_articleManager;
    private $_view;

    public function __construct($url){
        
        if(isset($url) && count($url)<1){
            throw new Exception('Page Introuvable 2');
        }
        elseif(isset($_GET['create'])){ //Lance la fonction pour envoyer la vue du formulaire d'ajout d'un article
            $this->create();
        }
        elseif(isset($_GET['status']) && $_GET['status']=="new"){ //Lance la fonction pour inserer dans la bdd le nouvel article et renvoie sur l'accueil
            $this->insereArticle();
        }
        elseif(isset($_GET['update']) && isset($_GET['id'])){ //Lance la fonction pour envoyer la vue du formulaire de modification d'un article
            $this->update();
        }
        elseif(isset($_GET['status']) && $_GET['status']=="update"){    //Lance la fonction pour modifier dans la bdd l'article et renvoie sur l'accueil
            $this->modifieArticle();
        }
        elseif(isset($_GET['delete'])){    //Lance la fonction pour modifier dans la bdd l'article et renvoie sur l'accueil
            $this->supprimeArticle();
        }
        else{   //Lance la fonction pour envoyer la vue d'un article
            $this->article();
        }
    }

    private function article(){
        if (isset($_GET['id'])) {
            $this->_articleManager = new ArticleManager;
            $article = $this->_articleManager->getOneArticle($_GET['id']);
            $this->_view = new View('Article'); //Renvoie la vue Article
            $this->_view->generateArticle(array('article' => $article)); //Renvoie les données de l'article
          }
    }

    private function create(){
        if(isset($_GET['create'])){
            $this->_view=new View('CreateArticle');
            $this->_view->generateForm();
        }
    }

    private function update(){
        if(isset($_GET['update'])){
            $this->_articleManager = new ArticleManager;
            $article = $this->_articleManager->getOneArticle($_GET['id']);
            $this->_view=new View('UpdateArticle');
            $this->_view->generateFormUpdate(array('article' => $article));
        }
    }

    private function modifieArticle()
    {
            $this->_articleManager = new ArticleManager;
            $article = $this->_articleManager->updateArticle($_GET['id']);
            $articles = $this->_articleManager->getArticles();
            $this->_view = new View('Accueil');
            $this->_view->generate(array('articles' => $articles));
      
    }

    private function supprimeArticle()
    {
            $this->_articleManager = new ArticleManager;
            $article = $this->_articleManager->deleteArticle($_GET['id']);
            $articles = $this->_articleManager->getArticles();
            $this->_view = new View('Accueil');
            $this->_view->generate(array('articles' => $articles));
      
    }

    //fonction pour insérer un aticle
    //en bdd
    private function insereArticle()
    {
      $this->_articleManager = new ArticleManager;
      $article = $this->_articleManager->createArticle();
      $articles = $this->_articleManager->getArticles();
      $this->_view = new View('Accueil');
      $this->_view->generate(array('articles' => $articles));
    }
}