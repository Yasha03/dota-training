<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        $this->view->layout = 'guest';
        if (!empty($_POST)) {
            $errorsArr = $this->model->login($_POST);
            if (count($errorsArr) == 0) {
                $this->model->giveSessionLogin($_POST);
                $this->view->formRedirect('/');
            } else {
                $this->view->message('error', array_shift($errorsArr));
            }
        }

        $this->view->render('Вход');
    }

    public function registerAction()
    {
        $this->view->layout = 'guest';
        if (!empty($_POST)) {
            $errorsArr = $this->model->checkRegisterUser($_POST);
            if (count($errorsArr) == 0) {
                $this->model->register($_POST);
            } else {
                $this->view->message('error', array_shift($errorsArr));
            }
            $this->view->formRedirect('/');
        }


        $this->view->render('Регистрация');
    }

    public function logoutAction()
    {
        unset($_SESSION['logged_user']);
        $this->view->redirect('/');
    }

}