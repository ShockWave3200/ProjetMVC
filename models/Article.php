<?php
class Article{

    private $_idarticle;
    private $_nomarticle;
    private $_prixarticle;
    private $_imgarticle;
    private $_descarticle;

    //CONSTRUCTEUR
    public function __construct(array $data){
        $this->hydrate($data);
    }

    //HYDRATATION
    public function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method='set'.ucfirst($key);
            if(method_exists($this,$method))
                $this->$method($value);
        }
    }

    //SETTERS
    public function setIdarticle($id){
        $id=(int)$id;
        if($id>0)
            $this->_idarticle=$id;
    }
    public function setNomarticle($nom){
            $this->_nomarticle=$nom;
    }
    public function setPrixarticle($prix){
            $this->_prixarticle=$prix;
    }
    public function setImgarticle($img){
            $this->_imgarticle=$img;
    }
    public function setDescarticle($desc){
        $this->_descarticle=$desc;
    }


    //GETTERS
    public function idArticle(){
        return $this->_idarticle;
    }
    public function nomArticle(){
        return $this->_nomarticle;
    }
    public function prixArticle(){
        return $this->_prixarticle;
    }
    public function imgArticle(){
        return $this->_imgarticle;
    }
    public function descArticle(){
        return $this->_descarticle;
    }
}