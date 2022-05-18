<?php

require 'application/config/Dev.php';
require 'application/config/DB_config.php';

date_default_timezone_set('Europe/Moscow');


use application\core\Router;
use \RedBeanPHP\R as R;


/*error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', '1');*/


spl_autoload_register(function($class){
    $path = str_replace('\\', '/', $class.'.php');
    if(file_exists($path)){
        require $path;
    }
});

session_start();

$router = new Router;
$router->run();


