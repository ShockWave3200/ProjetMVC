<?php

abstract class Model{
    private static $_bdd;

    //INSTANCIE LA CONNEXION A LA BDD
    private static function setBdd(){
        self::$_bdd=new PDO('mysql:host=localhost;dbname=projetmvc;charset=utf8','root','');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }

    //RECUPERE LA CONNEXION A LA BDD
    protected function getBdd(){
        if(self::$_bdd==null){
            self::setBdd();
            return self::$_bdd;
        }
    }

    //FONCTION QUI RETOURNE TOUT LES CHAMPS D'UNE TABLE
    protected function getAll($table, $obj){
        $this->getBdd();
        $var=[];
        $req=self::$_bdd->prepare('select * from '.$table.' order by 1 desc');
        $req->execute();
        while($data = $req->fetch(PDO::FETCH_ASSOC)){
            $var[]=new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }

    //FONCTION QUI RECUPERE UN CHAMP
    protected function getOne($table, $obj,$id){
        $this->getBdd();
        $var=[];
        $req=self::$_bdd->prepare('select * from '.$table.' where id'.$table.'='.$id);
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
        $var[] = new $obj($data);
        }

        return $var;
        $req->closeCursor();
  
        
    }
    //Creer un article
    protected function createOne($table, $obj)
    {
    $req = $this->getBdd()->prepare("insert into ".$table." (nomarticle, prixarticle, imgarticle,descarticle) VALUES (?, ?, ?,?)");
    $req->execute(array($_POST['nomarticle'], $_POST['prixarticle'],$_POST['imgarticle'], $_POST['descarticle']));

    $req->closeCursor();
    }

    //Update d'un article
    protected function updateOne($table,$id)
    {
        $req = $this->getBdd()->prepare("update ".$table." set nomarticle=?, prixarticle=?, imgarticle=?,descarticle=? where idarticle=".$id);
        $req->execute(array($_POST['nomarticle'], $_POST['prixarticle'],$_POST['imgarticle'], $_POST['descarticle']));

        $req->closeCursor();
    }

    //Delete un article
    protected function deleteOne($table,$id)
    {
        $req = $this->getBdd()->prepare("delete from ".$table." where id".$table."=".$id);
        $req->execute();

        $req->closeCursor();
    }


}