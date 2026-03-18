<?php

namespace Controller;

use Core\Render;
use Middleware\MidHTTPRequest;
use Model\UsersRepository;

class LoginController{


    public function index(){
        new MidHTTPRequest();
        return Render::renderView("login.php");

    }

    public function register(){

        new MidHTTPRequest();

        

        return Render::renderView("register.php");
    }

    public function registerValidator(){
      
        if(!MidHTTPRequest::requestMethod("POST")){
            return MidHTTPRequest::Redirect("/blog/register" , ["error" => "Méthode non autorisé !"]);
        }

        $register = new UsersRepository();
        $register->register();



    }

    public function loginValidator(){
        
        if(!MidHTTPRequest::requestMethod("POST")){
            return MidHTTPRequest::Redirect("/blog/login" , ["error" => "Méthode non autorisé !"]);
        }

        
        $login = new UsersRepository();
        $login->login();

    }

    public function forgotPassword(){

        

    }





}