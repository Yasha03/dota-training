<?php

namespace application\core;

use application\core\View;


abstract class Controller
{

    public $route;
    public $view;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($this->route);
        $this->model = $this->loadModel($route['controller']);

        if (!$this->checkAccess()) {
            View::errorCode(403);
        }

    }

    public function loadModel($name)
    {
        $path = 'application\models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }

    public function checkAccess()
    {
        if ($_SESSION['permission'] == 'admin') {
            return true;
        }

        $allAccess = require 'application/config/accessConfig.php';
        $routeAll = $this->route['controller'] . '/' . $this->route['action'];
        $permission = $allAccess[$routeAll];
        if (isset($permission)) {
            if ($permission != 'all') {
                if ($_SESSION['permission'] == $permission) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

}