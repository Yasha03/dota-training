<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $vars = [
            'tbody' => "test",
        ];
        if(!$_SESSION['logged_user']){
            $this->view->redirect("/account/login");
        }

        $this->view->render('Главная', $vars);
    }

}