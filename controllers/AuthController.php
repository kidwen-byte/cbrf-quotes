<?php

namespace app\controllers;

use app\engine\Request;
use app\models\repositories\UserRepository;

class AuthController extends Controller {

    public function actionindex() {
        echo $this->render('auth');
    }

    public function actionSignin() {
        $login = (new Request())->getParams()['login'];
        $pass = (new Request())->getParams()['password'];
        if ((new UserRepository())->auth($login, $pass)) {
            header("Location: /");
            die();
        } else {
            die("Неверный логин или пароль");
        }
    }
}
