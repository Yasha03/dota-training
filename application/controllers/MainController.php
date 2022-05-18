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
        echo "f";
        echo $_SESSION['logged_user']->login;
        $this->view->render('Главная', $vars);
    }

}