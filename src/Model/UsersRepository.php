<?php 

namespace Model;

use Core\BDD;
use Middleware\MidHTTPRequest;

class UsersRepository {

    private $bdd ;

    public function __construct(){

        $this->bdd = BDD::connect();

    }

    public function findUsers(){

        $req = $this->bdd->query("SELECT * FROM users");
        return $req->fetchAll();

    }

    public function login(){


        if(!empty($_POST["email"]) && !empty($_POST["password"])){

            $email = htmlspecialchars(trim(strtolower($_POST["email"])));
            $password = htmlspecialchars(trim($_POST["password"]));

            if(filter_var($email,FILTER_VALIDATE_EMAIL)){

                if(strlen($email) <= 150 && strlen($password) <= 255){

                    $req = $this->bdd->prepare("SELECT * FROM users WHERE email = ?");
                    $req->execute([$email]);
                    $data = $req->fetch();

                    if($data){

                        
                        if(password_verify($password, $data["password"])){

                            if($data["activate"]){

                                if($data["role"] === "ADMIN"){

                                    return MidHTTPRequest::redirect("/blog/admin/dashboard", ["user" => ["email" => $data["email"], "pseudo" => ["pseudo"], "role" => $data["role"]]]);

                                }else{

                                    return MidHTTPRequest::redirect("/blog/", ["user" => ["email" => $data["email"], "pseudo" => ["pseudo"], "role" => $data["role"]]]);
                                }

                            }else{
                                return MidHTTPRequest::redirect("/blog/login", ["error" => "Votre compte existe mais n'est pas activé, veuillez verifier vos mails "]);
                            }


                           

                        }else{
                        
                            return MidHTTPRequest::redirect("/blog/login", ["error" => "L'email ou le mot de passe n'est pas correcte"]);

                        }


                    }else{
                        return MidHTTPRequest::redirect("/blog/login", ["error" => "L'email ou le mot de passe n'est pas correcte"]);
                    }
                             


                }else{
                   return MidHTTPRequest::redirect("/blog/login", ["error" => "L'email ou le mot de passe est trop long !"]);
                }


            }else{
               return MidHTTPRequest::redirect("/blog/login", ["error" => "Le format de l'email est invalide"]);
            }

        }else{

           return MidHTTPRequest::redirect("/blog/login", ["error" => "Les champs doivent êtres remplis"]);
        }
    }


    public function register(){

        if(!empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["pseudo"]) && !empty($_POST["confirm-password"])){
            
            $pseudo = htmlspecialchars(trim(strtolower($_POST["pseudo"])));
            $email = htmlspecialchars(trim(strtolower($_POST["email"])));
            $password = htmlspecialchars(trim($_POST["password"]));
            $confirmpassword = htmlspecialchars(trim($_POST["confirm-password"]));
            
        
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){

                if(strlen($email) <= 150 && strlen($email) >=5  && strlen($password) <= 255 && strlen($password) >= 8 && strlen($pseudo) <= 30 && strlen($pseudo) >= 2 && strlen($confirmpassword) >= 8){

                    if($password === $confirmpassword){
                        if(isset($_POST["checkpolitic"]) && $_POST["checkpolitic"] === 'on'){

                            $req = $this->bdd->prepare("SELECT email FROM users WHERE email = ?");
                            $req->execute([$email]);
                            $data = $req->fetch();

                            if(!$data){
                                $password = password_hash($password, PASSWORD_DEFAULT);
                                $role = "USER";
                                $token = bin2hex(random_bytes(32));
                            

                                $req = $this->bdd->prepare("INSERT INTO users (pseudo, email, role, password, activate, token, created_at) VALUES (?,?,?,?,?,?,NOW())");
                                $req->execute([$pseudo, $email,$role, $password,false, $token]);

                                // Envoi de mail manquant 


                                return MidHTTPRequest::redirect("/blog/login", ["success" => "Inscription réussi! Un lien vous a été envoyé par mail pour activé votre compte."]);

                            }else{
                                return MidHTTPRequest::redirect("/blog/register", ["error" => "Vous êtes déjà membre, Veuillez vous connectez"]);

                            }


                        }else{
                            return MidHTTPRequest::redirect("/blog/register", ["error" => "veuillez cochez la case des terms d'utilisation"]);
                        }

                        

                    }else{
                        return MidHTTPRequest::redirect("/blog/register", ["error" => "Les mot de passes ne sont pas identiques."]);
                    }

                }else{

                    return MidHTTPRequest::redirect("/blog/register", ["error" => "Le pseudo , l'email ou les mots de passes ne respect pas le nombre de caractères minimum ou maximum."]);
                }

            }else{
                return MidHTTPRequest::redirect("/blog/register", ["error" => "Le format de l'email est invalide."]);
            }


        }else{
          
            return MidHTTPRequest::redirect("/blog/register", ["error" => "Les champs doivent êtres remplis."]);
        }
    }

    public function userExist(string $email){

        $req = $this->bdd->prepare("SELECT email FROM users WHERE email = ?");
        $req->execute([$email]);

        return $req->rowCount();
    }
    
    public function updateTokenByMail(string $email,string $token){
        
        $req = $this->bdd->prepare("UPDATE users SET token = ? WHERE email = ?");
        $req->execute([$token, $email]);

        return true ;
        

    }

    public function isTokenValid($token){

        $req = $this->bdd->prepare("SELECT token FROM users WHERE token = ?");
        $req->execute([$token]);
        
        if($req->rowCount() === 1){
            return true;
        }else{
            return false;
        }
    }

    public function updatePasswordByToken(string $token, string $password){


        if($this->isTokenValid($token)){

            $password = password_hash($password, PASSWORD_DEFAULT);

            $req = $this->bdd->prepare("UPDATE users SET password = ? WHERE token = ?");
            $req->execute([$password, $token]);

            return true;

        }else{

            return false;
        }

        

    }
}


