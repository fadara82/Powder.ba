<?php

require_once __DIR__ . '/../dao/AuthDao.php';

class Auth_Service {
    private $auth_dao;

    public function __construct() {
        $this->auth_dao = new AuthDao();
    }

    public function login_user($email,$password){
        return $this->auth_dao->login_user($email,$password);
    }


}