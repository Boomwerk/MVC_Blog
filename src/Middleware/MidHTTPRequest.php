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
        
       
        if(isset($msg) && !empty($msg)){
            session_start();
            $_SESSION["msg"] = $msg;
            
            return  header("Location: $url");

        }
      
        
        return  header("Location: $url");
    }

    public static function isConnected(){

        if(!isset($_SESSION["user"]["role"])){
            
            return false;
        }
    
        return true;
    }

    public static function isAdmin(){

        if(!isset($_SESSION["user"]["role"])){
            self::disconnect();
        }

        if($_SESSION["user"]["role"] !== "ADMIN"){
            self::disconnect();
        }


    }

    public static function disconnect(){
        
        session_start();
        $_SESSION = [];
        session_destroy();

        return self::redirect("/blog/");
    }
}