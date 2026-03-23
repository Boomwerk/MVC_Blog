<?php

namespace Model;

use Core\BDD;
use Middleware\MidHTTPRequest;

class ArticlesRepository{
    private $bdd = null;
    public function __construct(){

        $this->bdd = BDD::connect();

    }

    public function AddCategorie(string $title, string $img){

        

        $req = $this->bdd->prepare("INSERT INTO categories(name, img, created_at ) VALUES (?, ?, NOW())");
        
        if($req->execute([$title,$img])){
            return true;

        }else{

            return false;
        }

        
    }

    public function getCategorie(int $limit = 5, int $offset= 1){

        $req = $this->bdd->prepare("SELECT * FROM categories ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
        $req->bindParam(":limit", $limit, \PDO::PARAM_INT);
        $req->bindParam(":offset", $offset, \PDO::PARAM_INT);

        $req->execute();

        return $req->fetchAll(\PDO::FETCH_ASSOC);
        
    }

}