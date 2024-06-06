<?php

use Firebase\JWT\JWT;
use Firebase\JWT\key;


Flight::route("/*",function(){ 
    if(strpos(Flight::request()->url,'/login')===0 ||
    strpos(Flight::request()->url,'/users')===0 )
    {
        return true;
    }
    else{
 try {
            $token = Flight::request()->getHeader("Authentication");
            if(!$token)
                Flight::halt(401, "Missing authentication header");

            $decoded_token = JWT::decode($token, new Key(JWT_SECRET, 'HS256'));
            
            
            Flight::set('user',$decoded_token->user);
             Flight::set('jwt_token',$token);

           return true;
        } catch (\Exception $e) {
            Flight::halt(401, $e->getMessage());
        }
         }

});