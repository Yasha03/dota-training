<?php

namespace application\core;
use RedBeanPHP\R as R;

abstract class Model{
    public function __construct(){
        R::setup( DB_HOST_BDNAME, DB_USERNAME, DB_PASSWORD );
    }
}