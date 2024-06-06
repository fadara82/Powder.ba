<?php

require_once __DIR__ . "/BaseDao.php";

use Firebase\JWT\JWT;

class AuthDao extends BaseDao {

    public function __construct() {
        parent::__construct("users");
    }

    public function login_user($email, $password) {
    try {
        $query = "SELECT * FROM Users WHERE email = :email";

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Match plain-text password
            if ($password === $user['password']) {
                // Password is correct
                unset($user['password']); // Remove password from user data

                // Prepare JWT payload
                $jwt_payload = [
                    'user' => $user,
                    'iat' => time(),
                    'exp' => time() + (60 * 60 * 24) 
                ];

                // Encode JWT token
                $jwt_token = JWT::encode(
                    $jwt_payload,
                    JWT_SECRET,
                    'HS256'
                );

                // Return user data with JWT token
                return array_merge($user, ['token' => $jwt_token]);
            } else {
                // Password is incorrect
                return false;
            }
        } else {
            // User not found
            return false;
        }
    } catch (PDOException $e) {
        // Handle database error
        echo "Error: " . $e->getMessage();
        return false; // Login failed
    }
}

}
