<?php


require_once __DIR__ . "/../dao/UsersDao.php";

class UsersService {

    private $users_dao;

    public function __construct()
    {
        $this->users_dao=new UsersDao();
    }
    public function add_users($user){
        return $this->users_dao->add_users($user);
    }

    
public function get_users(){

        return $this->users_dao->get_users();
    }

    public function delete_by_idU($id){
        return $this->users_dao->delete_by_idU($id);

    }


}