<?php

require_once __DIR__ . "/../services/UsersService.php";


header("Access-Control-Allow-Origin: *");


Flight::set('users_service', new UsersService());


Flight::route('POST /users', function () {
    $payload = Flight::request()->data;

     /**
     * @OA\Post(
     *      path="/users/",
     *      tags={"users"},
     *      summary="Add users data to the database",
     *      @OA\Response(
     *           response=200,
     *           description="Users Data"
     *      ),
     * * security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\RequestBody(
     *          description="Users data payload",
     *          @OA\JsonContent(
     *              required={"first_name","last_name","email","mobile_number","password"},
     *              @OA\Property(property="id", type="string", example="1", description="User ID"),
     *              @OA\Property(property="first_name", type="string", example="Fadi", description="User First Name"),
     *              @OA\Property(property="last_name", type="string", example="Egho", description="User Last Name"),
     *              @OA\Property(property="email", type="string", example="fadi.egho@stu.ibu.edu.ba", description="User email"),
     *              @OA\Property(property="mobile_number", type="string", example="0644232323", description="User Mobile Number"),
     *              @OA\Property(property="password", type="string", example="1234", description="User Password"),

     *          )
     *      )
     * )
     */
       
       
   Flight::get("users_service")->add_users($payload);
});



Flight::route('GET /users/get', function () {
     /**
 * @OA\Get(
 *      path="/users/get",
 *      tags={"users"},
 *      summary="Get all users",
 * * security={
     *          {"ApiKey": {}}   
     *      },
 *      @OA\Response(
 *           response=200,
 *           description="Array of all users in the databases"
 *      )
 * )
 */
   $data=Flight::get("users_service")->get_users();
    Flight::json($data, 200);
});



Flight::route('DELETE /users/delete/byid', function () {

      /**
     * @OA\Delete(
     *      path="/users/delete/byid/",
     *      tags={"users"},
     *      summary="Delete user by id",
     * * security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Deleted user data or 500 status code exception otherwise"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="query", name="id", example="1", description="Users ID")
     * )
     */

        $payload = Flight::request()->query['id'];
    $data = Flight::get("users_service")->delete_by_idU($payload);
        Flight::json($data, 200);
    
});

