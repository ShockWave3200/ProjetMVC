<?php
class View {
    private $_file;
    private $_t;

    public function __construct($action){
        $this->_file='views/view'.$action.'.php';
    }

    //GENERE ET AFFICHE LA VUE DE TOUS LES ARTICLES
    public function generate($data){
        //PARTIE SPECIFIQUE DE LA VUE
        $content=$this->generateFile($this->_file,$data);

        //TEMPLATE
        $view=$this->generateFile('views/template.php',array('t'=>$this->_t,'content'=>$content));

        echo $view;
    }

    //GENERE UN FICHIER VUE ET RENVOIE LE RESULTAT PRODUIT
    private function generateFile($file,$data){
        if(file_exists($file)){
            extract($data);

            ob_start();

            //INCLUT LE FICHIER VUE
            require $file;

            return ob_get_clean();
        }
        else
            throw new Exception('Fichier '.$file.' introuvable');
    }

    //Genere un article
    public function generateArticle($data){
        //définir le contenu à envoyer
        $content = $this->generateFile($this->_file, $data);
    
        //template
        $view = $this->generateFile('views/templateArticle.php', array('t' => $this->_t, 'content' => $content));
        echo $view;
    }

    private function generateFileSimple($file){
        if (file_exists($file)) {
    
    
    
          require $file;
    
        }
        else {
          throw new Exception("Fichier ".$file." introuvable", 1);
    
        }
    }

    //GENERE LA VUE DU FORMULAIRE DE CREATION D'UN ARTICLE
    public function generateForm(){
        //PARTIE SPECIFIQUE DE LA VUE
        $content=$this->generateFileSimple($this->_file);

        //TEMPLATE
        $view=$this->generateFile('views/templateForm.php',array('t'=>$this->_t,'content'=>$content));

        echo $view;
    }

    
    //GENERE LA VUE DU FORMULAIRE DE MODIFICATION D'UN ARTICLE
    public function generateFormUpdate($data){
        //définir le contenu à envoyer
        $content = $this->generateFile($this->_file, $data);
    
        //template
        $view = $this->generateFile('views/templateFormUpdate.php', array('t' => $this->_t, 'content' => $content));
        echo $view;
    }
}