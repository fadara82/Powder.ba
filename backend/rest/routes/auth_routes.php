<?php

require_once __DIR__ . "/../services/AuthService.php";
header("Access-Control-Allow-Origin: *");


use Firebase\JWT\JWT;
use Firebase\JWT\key;

Flight::set('auth_service', new Auth_Service());

Flight::route('POST /login', function () {
    $payload = Flight::request()->data;

/**
     * @OA\Post(
     *      path="/login/",
     *      tags={"users"},
     *      summary="Login Users",
     *      @OA\Response(
     *           response=200,
     *           description="Users Login Data"
     *      ),
     *      @OA\RequestBody(
     *          description="Login Payload",
     *          @OA\JsonContent(
     *              required={"email","password"},
     *              @OA\Property(property="email", type="string", example="1", description="User email"),
     *              @OA\Property(property="password", type="string", example="1234", description="User password"),


     *          )
     *      )
     * )
     */

     $authService = Flight::get('auth_service');
    $loginResult = $authService->login_user($payload['email'], $payload['password']);

    if ($loginResult !== false) {

        echo json_encode(['message' => 'Successfully logged in', 'data' => $loginResult]);
    } else {
        http_response_code(401);
        echo json_encode(['error' => 'Login failed']);
        Flight::halt(500,"Login failed");
    }


 
    Flight::route('POST /logout', function() {
        /**
     * @OA\Post(
     *      path="/logout",
     *      tags={"auth"},
     *      summary="Logout from the system",
     *      security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Success response or exception if unable to verify jwt token"
     *      ),
     * )
     */
        try {
            $token = Flight::request()->getHeader("Authentication");
            if(!$token)
                Flight::halt(401, "Missing authentication header");

            $decoded_token = JWT::decode($token, new Key(JWT_SECRET, 'HS256'));

            Flight::json([
                'jwt_decoded' => $decoded_token,
                'user' => $decoded_token->user
            ]);
        } catch (\Exception $e) {
            Flight::halt(401, $e->getMessage());
        }
    });


});
