<?php

header("Access-Control-Allow-Origin: *");

require_once __DIR__ . "/BaseDao.php";

class UsersDao extends BaseDao{
    public function __construct()
    {
        parent :: __construct("users");
        }

        public function add_users($user) {
    $sql = "INSERT INTO users(first_name, last_name, email, mobile_number, password)
            VALUES(:first_name, :last_name, :email, :mobile_number, :password)";

    try {
        // Hash the user's password
        $hashed_password = password_hash($user['password'], PASSWORD_DEFAULT);

        $statement = $this->connection->prepare($sql);
        $statement->bindValue(':first_name', $user['fname']);
        $statement->bindValue(':last_name', $user['lname']);
        $statement->bindValue(':email', $user['email']);
        $statement->bindValue(':mobile_number', $user['mobilenumber']);
        $statement->bindValue(':password', $hashed_password);

        $statement->execute();
        return $user;

    } catch (PDOException $e) {
        error_log('Error adding user: ' . $e->getMessage());
        throw new Exception('Failed to add user');
    }
}

         public function get_users(){
    $sql = "SELECT * FROM users";
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->execute();
        
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $users;
    } catch (PDOException $e) {
        error_log('Error getting orders: ' . $e->getMessage());
        throw new Exception('Failed to get orders');
    }
}


public function delete_by_idU($id){
    $sql = "DELETE  FROM users WHERE id = :id";
    try {
        $statement = $this->connection->prepare($sql);
        
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        
        $statement->execute();
        
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        return $products;
    } catch (PDOException $e) {
        error_log('Error getting product by ID: ' . $e->getMessage());
        throw new Exception('Failed to get product by ID');
    }
}

        
}
