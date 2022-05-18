<?php

namespace application\models;

use application\core\Model;
use RedBeanPHP\R as R;


class Account extends Model
{

    private $errors = [];

    public function checkRegisterUser($data)
    {
        if ($this->checkNullValue($data)) {
            $this->checkLogin($data['login']);
            if (R::count('users', "login = ?", array($data['login'])) > 0) {
                $this->errors[] = 'Пользователь с таким Login уже существует';
            }

            $this->checkEmail($data['email']);
            if (R::count('users', "email = ?", array($data['email'])) > 0) {
                $this->errors[] = 'Пользователь с таким Email уже существует';
            }

            $this->checkPassword($data['password'], $data['password_2']);

        } else {
            $this->errors[] = 'Заполните данные';
        }

        return $this->errors;
    }

    public function register($data)
    {
        $user = R::dispense('users');
        $user->login = trim($data['login']);
        $user->email = trim($data['email']);
        $user->date_register = date("Y-m-d H:i:s");
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->ip_register = $_SERVER['REMOTE_ADDR'];
        $user->avatar = 'avatar.png';
        $user->status = 'user';
        $user->reset = '';
        R::store($user);

        $_SESSION['logged_user'] = $user;
        $_SESSION['permission'] = "user";
    }

    public function login($data)
    {
        $user = R::findOne('users', 'login = ?', array($data['login']));

        if (!$user) {
            $this->errors[] = 'Пользователь с таким логином не найден';
        }

        if (!password_verify($data['password'], $user->password)) {
            $this->errors[] = 'Неверно введён пароль';
        }

        return $this->errors;
    }

    public function checkNullValue($data)
    {
        foreach ($data as $key) {
            if ($key == '') {
                return false;
            }
        }
        return true;
    }

    public function checkLogin($login)
    {
        if(!preg_match("@^[a-z]+([-_]?[a-z0-9]+){0,2}$@i", $login)){
            $this->errors[] = 'Некорректный логин';
        }

        if (strlen($login) < 3 or strlen($login) > 20) {
            $this->errors[] = 'Логин слишком длинный или короткий';
        }
    }

    public function checkEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = 'Некорректный email';
        }
    }

    public function checkPassword($pass1, $pass2)
    {
        if ($pass1 != $pass2) {
            $this->errors[] = 'Пароли не совпадают';
        } else {
            if (iconv_strlen($pass1) < 6) {
                $this->errors[] = 'Пароль слишком короткий';
            } else {
                if (iconv_strlen($pass1) > 24) {
                    $this->errors[] = 'Пароль слишком длинный';
                }
            }
        }
        if (strpos($pass1, ' ') !== FALSE) {
            $this->errors[] = 'Пароль не может содержать пробелы';
        }
    }

    public function giveSessionLogin($data)
    {
        $user = R::findOne('users', 'login = ?', array($data['login']));
        $_SESSION['logged_user'] = $user;
        $_SESSION['permission'] = "user";
    }

}