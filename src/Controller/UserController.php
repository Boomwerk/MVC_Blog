<?php

namespace Controller;

use Middleware\MidHTTPRequest;
use Core\Render;


class UserController{


    public function profil(){
        new MidHTTPRequest();


        


        return Render::renderView("userProfil.php", ["connected" => MidHTTPRequest::isConnected()]);

    }
}