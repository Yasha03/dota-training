<?php

namespace application\controllers;

use application\core\Controller;

class TestsController extends Controller
{
    public function solveAction(){
        $this->view->loadForm = 'off';
        $idTest = $this->route['id'];
        $next = $this->route['next'];
        if(empty($next)){
            $next = 1;
        }
        $vars = [
            'str_question' => $this->model->loadQuestion($next, $idTest)
        ];
        $this->view->render($this->model->loadTest($idTest)->title, $vars);
    }

    public function listAction(){
        $vars = [
            'listTests' => $this->model->getTestListStr()
        ];
        $this->view->render('Список тестов', $vars);
    }
}