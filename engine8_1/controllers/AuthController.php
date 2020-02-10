<?php


namespace app\controllers;

use app\engine\App;


class AuthController extends Controller
{
    public function actionLogin() {
        $login = App::call()->request->getParams()['login'];
        $pass = App::call()->request->getParams()['pass'];
        if (App::call()->userRepository->auth($login, $pass)) {
            if (isset(App::call()->request->getParams()['save'])) {
                App::call()->userRepository->updateHash();
            }
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            Die("Неверный пароль");
        }
    }


    public function actionLogout() {
        //
        session_regenerate_id();
        session_destroy();
        setcookie("hash", "", time() - 36000, '/');
        header("Location: " .  $_SERVER['HTTP_REFERER']);
        exit();
    }
}