<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{
    public function panelAction()
    {
        $vars = [
            'testListString' => $this->model->getTestListString()
        ];
        $this->view->render('Админ-панель', $vars);
    }

    public function createTestAction(){
        if (!empty($_POST)) {
            if($_POST['title_test'] != null) {
                $this->model->createTest($_POST['title_test']);
                $this->view->message('success', 'Тест создан');
            }else{
                $this->view->message('error', 'Введите название');
            }
        }

        $this->view->render('Создать тест');
    }

    public function createQuestionAction(){
        $idTest = $this->route['id'];
        if (!empty($_POST)) {
            $this->model->addQuestion($_POST, $idTest);
            $this->view->message('success', 'Вопрос добавлен');
        }
        $vars = [
          'idTest' => $idTest
        ];
        $this->view->render('Создать вопрос', $vars);
    }
}