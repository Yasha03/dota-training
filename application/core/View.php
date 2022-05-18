<?php

namespace application\core;

class View
{

    public $route;
    public $path;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        if (file_exists('public/views/' . $this->path . '.php')) {
            ob_start();
            require 'public/views/' . $this->path . '.php';
            $content = ob_get_clean();
            require 'public/views/layouts/' . $this->layout . '.php';
        } else {
            echo 'Вид не найден';
        }
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }

    public function message($status, $message)
    {
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function formRedirect($url)
    {
        exit(json_encode(['url' => $url]));
    }


    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'public/views/errors/' . $code . '.php';
        if (file_exists($path)) {
            require $path;
        }
        exit;
    }


}