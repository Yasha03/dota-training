<?php

function debug($x, $type = 0){
    echo '<pre>';
    if($type == 0){
        print_r($x);
    }else{
        var_dump($x);
    }
    echo '</pre>';
}