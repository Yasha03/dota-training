<?php

namespace application\controllers;

use application\core\Controller;

class ArticleController extends Controller
{
    public function newAction(){
        if (!empty($_POST)) {
            if($this->model->createNewArticle($_POST)){
                $this->view->message('success', 'Статья добавлена');
            }else{
                $this->view->message('error', 'Ошибка');
            }
        }

        $this->view->render('Добавить статью');
    }

    public function listAction(){
        $vars = [
            'articles' => $this->model->loadAllArticles()
        ];
        $this->view->render('Статьи', $vars);
    }

    public function viewAction(){
        $article = $this->model->loadArticle($this->route['url']);
        $vars = [
            'article' => $article
        ];
        $this->view->render($article->title, $vars);
    }
}