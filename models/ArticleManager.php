<?php
class ArticleManager extends Model{
    public function getArticles(){
        return $this->getAll('article','Article');
    }

    public function getOneArticle($id){
        return $this->getOne('article','Article',$id);
    }

    public function createArticle(){
        return $this->createOne('article', 'Article');
      }

    public function updateArticle($id){
        return $this->updateOne('article',$id);
    }

    public function deleteArticle($id){
        return $this->deleteOne('article',$id);
    }
}