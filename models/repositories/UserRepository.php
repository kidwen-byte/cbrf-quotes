<?php

namespace app\models\repositories;

use app\models\entities\Users;
use app\models\Repository;
use app\engine\Session;

class UserRepository extends Repository {

    public function auth($login, $pass) {
        $user = $this->getOneWhere('login', $login); // Метод getOneWhere находится в models\Repository.php
        if ($user != false && password_verify($pass, $user->pass)) {
            (new Session())->set('auth_token', $user->auth_token); // Устанавливаем auth_token для доп. Валидации пользователя
            return true;
        }
        return false;
    }

    public function isAuth($auth_token) {
        $user = $this->getOneWhere('auth_token', $auth_token);
        if ($user) {
            return true;
        }
        return false;
    }

    protected function getEntityClass() {
        return Users::class;
    }

    public function getTableName() {
        return 'users'; // Имя таблицы в бд
    }
}
