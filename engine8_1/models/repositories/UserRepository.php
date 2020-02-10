<?php

namespace app\models\repositories;

use app\models\entities\Users;
use app\models\Repository;

class UserRepository extends Repository
{
    public function isAuth() { // метод проверяет авторизован ли кто-нибудь сейчас
        if (isset($_COOKIE['hash']) && !isset($_SESSION['login'])) {
            $hash = $_COOKIE['hash'];
            $user = static::getOneWhere('hash', $hash)->login;
            var_dump("авторизация по Куки");
            if (!empty($user)) {
                $_SESSION['login'] = $user;
            }
        }
        return isset($_SESSION['login']);
    }

    public function getName() {  // метод возвращает имя авторизованного пользователя
        return $_SESSION['login'];
    }
    public function auth($login, $pass) {  // метод проверяет верно ли пользователь ввел данные для авторизации
        $user = static::getOneWhere('login', $login);
        if (password_verify($pass, $user->pass)) {
            $_SESSION['login'] = $login;
            $_SESSION['id'] = $user->id;

            return true;
        } else {
            return false;
        }
    }
    function updateHash() {
        $hash = uniqid(rand(), true);
        $id = (int)$_SESSION['id'];
        $user = $this->getOne($id);
        $user->hash = $hash;
        (new UserRepository())->save($user);
        setcookie("hash", $hash, time() + 36000, '/');
    }

    public function getTableName()
    {
        return "users";
    }
    public function getEntityClass() {
        return Users::class;
    }
}