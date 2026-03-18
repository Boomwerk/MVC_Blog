<?php

namespace Middleware;


class MidHTTPRequest{

    public function __construct()
    {
        session_start();
    }

    public static function requestMethod(string $method){

        if($_SERVER["REQUEST_METHOD"] !== $method){
            
            return false;
        }


        return true;



    } 

    public static function redirect(string $url, ?array $msg = []){
        
       
        if(isset($msg)){
            session_start();
            $_SESSION = $msg;
            
            return  header("Location: $url");

        }
      
        
        return  header("Location: $url");
    }
}