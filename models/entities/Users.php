<?php

namespace app\models\entities;

use app\models\Entity;

class Users extends Entity {

    protected $id;
    protected $login;
    protected $pass;
    protected $auth_token;

    protected $props = [
        'login' => false,
        'pass' => false,
        'auth_token' => false,
    ];

    public function __construct($login = null, $pass = null, $auth_token = null) {
        $this->login = $login;
        $this->pass = $pass;
        $this->auth_token = $auth_token;
    }
}
