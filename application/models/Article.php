<?php

namespace application\models;

use application\core\Model;
use RedBeanPHP\R as R;


class Article extends Model
{
    public function createNewArticle($data){
        if(strlen($data['title']) > 255 || strlen($data['title']) < 3){
            return false;
        }
        if(!preg_match('@^[a-z0-9~_\-\.]+$@', $data['url'])){
            return false;
        }

        $article = R::dispense('articles');
        $article->title = trim($data['title']);
        $article->url = trim($data['url']);
        $article->content = $data['content'];
        $article->date = date("Y-m-d H:i:s");
        $article->author = $_SESSION['logged_user']->login;
        $article->mark = '';
        $article->url_image = $data['url_image'];
        R::store($article);
        return true;
    }

    public function loadArticle($url){
        return R::findOne('articles', 'url = ?', array($url));
    }

    public function loadAllArticles(){
        return R::findAll('articles', 'id > ?', array(0));
    }
}