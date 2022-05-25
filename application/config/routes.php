<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],

    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],

    'account/logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],

    'admin/panel' => [
        'controller' => 'admin',
        'action' => 'panel',
    ],

    'admin/test/create' => [
        'controller' => 'admin',
        'action' => 'createTest',
    ],

    'admin/question/create/{id:\d+}' => [
        'controller' => 'admin',
        'action' => 'createQuestion',
    ],

    'tests/solve/{id:\d+}/{next:\d+}' => [
        'controller' => 'tests',
        'action' => 'solve',
    ],

    'tests/list' => [
        'controller' => 'tests',
        'action' => 'list'
    ]

];