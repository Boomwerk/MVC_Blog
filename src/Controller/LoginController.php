<?php

namespace Controller;

use Core\Render;
use Middleware\MidHTTPRequest;
use Model\UsersRepository;

class LoginController{


    public function index(){
        new MidHTTPRequest();
        return Render::renderView("login.php", ["connected" => MidHTTPRequest::isConnected()]);

    }

    public function register(){

        new MidHTTPRequest();

        

        return Render::renderView("register.php", ["connected" => MidHTTPRequest::isConnected()]);
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

    public function forgotPassword($token){

        $session = new MidHTTPRequest();

      
        
        if(!empty($token)){

            $repo = new UsersRepository();
            

            if($repo->isTokenValid($token[0])){
               
            
                $_SESSION["token"] = htmlspecialchars(trim($token[0]));

                return MidHTTPRequest::redirect("/blog/forgotPassword/changePassword");

            }else{

                return MidHTTPRequest::redirect("/blog/forgotPassword", ["error" => "le token est invalide"]);
            }

        }

        return Render::renderView("forgotPassword.php", ["connected" => MidHTTPRequest::isConnected()]);

    }


    public function forgotValidator(){

        $session = new MidHTTPRequest();

        if(!MidHTTPRequest::requestMethod("POST")){

            return MidHTTPRequest::Redirect("/blog/forgotPassword" , ["error" => "Méthode non autorisé !"]);
        }

        if(!empty($_POST["email"])){
            $email = htmlspecialchars(trim($_POST["email"]));

            if(filter_var($email, FILTER_VALIDATE_EMAIL)){


                $repo = new UsersRepository();
                
                if($repo->userExist($email) === 1){
                    
                    
                    $mailToken = bin2hex(random_bytes(32));
                    $_SESSION["token"] = $mailToken;

                    
                    $repo->updateTokenByMail($email,$mailToken);

                    // envoi d'email

                    return MidHTTPRequest::redirect("/blog/forgotPassword", ["success" => "Un email pour changer votre mot de passe a été envoyé si vous êtes membre"]);                   
                    

                }else{
                    return MidHTTPRequest::redirect("/blog/forgotPassword", ["success" => "Un email pour changer votre mot de passe a été envoyé si vous êtes membre"]);
                }

            }else{
                return MidHTTPRequest::redirect("/blog/forgotPassword", ["error" => "Veuillez entrer une adresse email valide."]);

            }

        }else{
            return MidHTTPRequest::redirect("/blog/forgotPassword", ["error" => "Veuillez remplir le champ email."]);

        }


    }


    public function forgotChangePassword(){
        $session = new MidHTTPRequest();
        
        if(!isset($_SESSION["token"])){
            return MidHTTPRequest::redirect("/blog/forgotPassword",["error", "Le token n'est pas valide"]);
        }

       

        if(MidHTTPRequest::requestMethod("POST")){
            
            if(!empty($_POST["password"]) && !empty($_POST["confirm-password"])){
                
                $password=htmlspecialchars($_POST["password"]);
                $confirmPassword=htmlspecialchars($_POST["confirm-password"]);

                if(strlen($password) >= 8 && strlen($confirmPassword) >= 8 && strlen($password) <= 80 && strlen($confirmPassword) <= 80){

                    if($password === $confirmPassword){
                        $token = $_SESSION["token"];
                        $repo = new UsersRepository();
                        $update = $repo->updatePasswordbyToken($token, $password);


                        if($update){

                            return MidHTTPRequest::redirect("/blog/login",["success"=>"Le mot de passe a bien été changé."]);

                        }else{
                            return MidHTTPRequest::redirect("/blog/forgotPassword/changePassword", ["error" => "Le token n'est pas valide !"]);
                        }

                    }else{
                        return MidHTTPRequest::redirect("/blog/forgotPassword/changePassword", ["error" => "Les mot de passe de se correspondent pas."]);

                    }
                }else{
                    return MidHTTPRequest::redirect("/blog/forgotPassword/changePassword", ["error" => "La longueur du mot de passe n'est pas correct."]);

                }

            }else{
                return MidHTTPRequest::redirect("/blog/forgotPassword/changePassword", ["error" => "Veuillez remplir les champs."]);
            }

        }
        
        
        return Render::renderView("forgotChangePassword.php", ["connected" => MidHTTPRequest::isConnected()]);
    }


}