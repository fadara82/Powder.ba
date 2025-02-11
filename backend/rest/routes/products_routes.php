<?php

require_once __DIR__ . "/../services/ProductsService.php";

header("Access-Control-Allow-Origin: *");

Flight::set('products_service', new ProductsService());

Flight::route('POST /products', function () {
    $payload = Flight::request()->data;
  

    /**
     * @OA\Post(
     *      path="/products/",
     *      tags={"products"},
     *      summary="Add products data to the database",
     * security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Products Data"
     *      ),
     *      @OA\RequestBody(
     *          description="Products data payload",
     *          @OA\JsonContent(
     *              required={"productImg","productName","flavour","price","description"},
     *              @OA\Property(property="id", type="string", example="1", description="Product ID"),
     *              @OA\Property(property="productImg", type="string", example="https://ba.proteini.si/image/medium/9782", description="Product Img Link"),
     *              @OA\Property(property="productName", type="string", example="Battery Whey Protein",description="Name of Product"),
     *              @OA\Property(property="flavour", type="string", example="Vanilla",description="Flavour of Product"),
     *              @OA\Property(property="price", type="string", example="125",description="Price of Product"),
     *              @OA\Property(property="description", type="string", example="Jako odlican produkt",description="Description of Product"),
     *              @OA\Property(property="category", type="string", example="Protein",description="Category of Product"),

     *          )
     *      )
     * )
     */
       
   Flight::get("products_service")->add_products($payload);
});


Flight::route('GET /products/get', function () {
        /**
 * @OA\Get(
 *      path="/products/get",
 *      tags={"products"},
 *      summary="Get all products",
 * security={
     *          {"ApiKey": {}}   
     *      },
 *      @OA\Response(
 *           response=200,
 *           description="Array of all doctors in the databases"
 *      )
 * )
 */
    
        $data = Flight::get("products_service")->get_products();
        Flight::json($data, 200);
    
});

Flight::route('GET /products/get/proteini', function () {


        /**
 * @OA\Get(
 *      path="/products/get/protein",
 *      tags={"products"},
 *      summary="Get products that are protein",
 * security={
     *          {"ApiKey": {}}   
     *      },
 *      @OA\Response(
 *           response=200,
 *           description="Array of all products that are Protein in the databases"
 *      )
 * )
 * */
        $data = Flight::get("products_service")->get_protein();
        Flight::json($data, 200);
    
});

Flight::route('GET /products/get/vitamini', function () {


        /**
 * @OA\Get(
 *      path="/products/get/vitamini",
 *      tags={"products"},
 *      summary="Get products that are Vitamins",
 * security={
     *          {"ApiKey": {}}   
     *      },
 *      @OA\Response(
 *           response=200,
 *           description="Array of all products that are Vitamins in the databases"
 *      )
 * )
 * */


        $data = Flight::get("products_service")->get_vitamini();
        Flight::json($data, 200);
    
});

Flight::route('GET /products/get/creatine', function () {


        /**
 * @OA\Get(
 *      path="/products/get/creatine",
 *      tags={"products"},
 *      summary="Get products that are Creatine",
 * security={
     *          {"ApiKey": {}}   
     *      },
 *      @OA\Response(
 *           response=200,
 *           description="Array of all products that are Creatine in the databases"
 *      )*
 * )
 * */


        $data = Flight::get("products_service")->get_creatine();
        Flight::json($data, 200);
    
});


Flight::route('GET /products/get/healthybar', function () {


        /**
 * @OA\Get(
 *      path="/products/get/healthybar",
 *      tags={"products"},
 *      summary="Get products that are Healthy Bars",
 * security={
     *          {"ApiKey": {}}   
     *      },
 *      @OA\Response(
 *           response=200,
 *           description="Array of all products that are Healthy Bars in the databases"
 *      )
 * )
 * */


        $data = Flight::get("products_service")->get_healthybars();
        Flight::json($data, 200);
    
});


Flight::route('GET /products/get/byid', function () {


   
 /**
     * @OA\Get(
     *      path="/products/get/byid",
     *      tags={"products"},
     *      summary="Get product by id",
     * security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Product data, or false if product does not exist"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="query", name="id", example="1", description="Product ID")
     * )
     */


    $payload = Flight::request()->query['id'];
    $data = Flight::get("products_service")->get_byid($payload);
        Flight::json($data, 200);
    
});


// Flight::route('PUT /products/update/@id', function ($id) {
//             $payload = Flight::request()->data->getData();
//             $json=json_encode($payload);
//             Flight::json($json);
//             return;

   
//         Flight::json(Flight::get("products_service")->get_byid($id,$json));

    
// });







Flight::route('DELETE /products/delete/byid', function () {

         /**
     * @OA\Delete(
     *      path="/products/delete/byid",
     *      tags={"products"},
     *      summary="Delete product by id",
     * security={
     *          {"ApiKey": {}}   
     *      },
     *      @OA\Response(
     *           response=200,
     *           description="Deleted product data or 500 status code exception otherwise"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="query", name="id", example="1", description="Product ID")
     * )
     */
        $payload = Flight::request()->query['id'];
    $data = Flight::get("products_service")->delete_byid($payload);
        Flight::json($data, 200);
    
});


Flight::route('GET /products/get/cart', function () {

      /**
 * @OA\Get(
 *      path="/products/get/cart",
 *      tags={"products"},
 *      summary="Get products that are in Cart",
 * security={
     *          {"ApiKey": {}}   
     *      },
 *      @OA\Response(
 *           response=200,
 *           description="Array of all products that are in Cart in the databases"
 *      )
 * )
 * */



        $data = Flight::get("products_service")->getCart();
        Flight::json($data, 200);
    
});


Flight::route('UPDATE /products/update/cart/byid', function () {
 /**
 * @OA\Put(
 *      path="/products/update/cart/byid/",
 *      tags={"products"},
 *      summary="Update products by id",
 *      @OA\Response(
 *           response=200,
 *           description="Updated product data or 500 status code exception otherwise"
 *      ),
 * * security={
     *          {"ApiKey": {}}   
     *      },
 *      @OA\Parameter(
 *           name="id",
 *           in="path",
 *           required=true,
 *           description="Product ID",
 *           @OA\Schema(type="number", example=1)
 *      )
 * )
 */
        $payload = Flight::request()->query['id'];
    $data = Flight::get("products_service")->updateCart($payload);
        Flight::json($data, 200);
    
});


Flight::route('UPDATE /products/updated/cart/byid', function () {

         /**
 * @OA\Put(
 *      path="/products/updated/cart/byid/",
 *      tags={"products"},
 *      summary="Update product to not be in cart",
 *      @OA\Response(
 *           response=200,
 *           description="Updated product data or 500 status code exception otherwise"
 *      ),
 * * security={
     *          {"ApiKey": {}}   
     *      },
 *      @OA\Parameter(
 *           name="id",
 *           in="path",
 *           required=true,
 *           description="Product ID",
 *           @OA\Schema(type="number", example=1)
 *      )
 * )
 */
        $payload = Flight::request()->query['id'];
    $data = Flight::get("products_service")->deleteCart($payload);
        Flight::json($data, 200);
    
});



