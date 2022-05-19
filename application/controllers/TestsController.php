<?php

namespace application\controllers;

use application\core\Controller;

class TestsController extends Controller
{
    public function knowledgeAction()
    {
        $this->view->render('Тест на знание доты');
    }
}