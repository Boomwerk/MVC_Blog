<?php


namespace Controller;

use Core\Render;
use Middleware\MidHTTPRequest;
use Model\ArticlesRepository;
use Model\UsersRepository;

class AdminController{


    public function dashboard(){
        $session= new MidHTTPRequest();    

        MidHTTPRequest::isAdmin();




        return Render::renderView("admin/dashboard.php", ["connected" => MidHTTPRequest::isConnected()]);
    }

    public function articles(){
        $session =new MidHTTPRequest();    

        MidHTTPRequest::isAdmin();

        $repo = new ArticlesRepository();

        $categories = $repo->getCategorie();

        var_dump($categories);




        return Render::renderView("admin/articles.php", ["connected" => MidHTTPRequest::isConnected(), "categories" => $categories]);

    }

    public function articlesAdd(){


        $session =new MidHTTPRequest();    

        MidHTTPRequest::isAdmin();

        

        



        return Render::renderView("admin/addArticle.php", ["connected" => MidHTTPRequest::isConnected()]);

    }

    public function users(){

        $session =new MidHTTPRequest();    

        MidHTTPRequest::isAdmin();




        return Render::renderView("admin/users.php", ["connected" => MidHTTPRequest::isConnected()]);

    }

    public function settings(){
        $session =new MidHTTPRequest();    

        MidHTTPRequest::isAdmin();




        return Render::renderView("admin/settings.php", ["connected" => MidHTTPRequest::isConnected()]);
    }

    public function categoriesAdd(){

        

        $session =new MidHTTPRequest();    

        MidHTTPRequest::isAdmin();

        

        if(!MidHTTPRequest::requestMethod("POST")){

            return MidHTTPRequest::Redirect("/blog/admin/articles" , ["error" => "Méthode non autorisé !"]);
        }

            

        if(!empty($_POST["title"]) && isset($_FILES['img']) && $_FILES['img']['error'] === 0){

            
            $title = htmlspecialchars($_POST["title"]);
            
            if(strlen($title) >= 3 && strlen($title) <= 150){

                $file = $_FILES['img'];

                $tmpName = $file['tmp_name'];
                $fileName = $file['name'];
                $fileSize = $file['size'];

                $allowed = ['jpg', 'jpeg', 'png', 'webp'];
                $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

                if(!in_array($extension, $allowed)) {
                    return MidHTTPRequest::redirect("/blog/admin/articles", ["error" => "Format non autorisé."]);
                }

                if($fileSize > 2 * 1024 * 1024) {
                    return MidHTTPRequest::redirect("/blog/admin/articles", ["error" => "Fichier trop lourd"]);
                }

                $newName = uniqid() . '.' . $extension;

                $uploadDir = '/blog/Public/uploads/';
                $destination = $uploadDir . $newName;

                if(move_uploaded_file($tmpName, $destination)) {
                    
                    $add =new ArticlesRepository();
                    $add->AddCategorie($title,$destination);
                    
                    return MidHTTPRequest::redirect("/blog/admin/articles", ["success" => "La catégorie a bien été ajouté."]);

                } else {
                    return MidHTTPRequest::redirect("/blog/admin/articles", ["error" => "Erreur de téléchargement."]);
                }
               

            }else{
                return MidHTTPRequest::redirect("/blog/admin/articles", ["error" => "Le nombre de caractère est trop court ou trop long."]);

            }

        }else{
            return MidHTTPRequest::redirect("/blog/admin/articles", ["error" => "veuillez remplir les champs"]);

        }
        
       

        


    }



}