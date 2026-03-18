<?php


namespace Controller;

use Core\Render;
use Middleware\MidHTTPRequest;

class AdminController{


    public function dashboard(){
        $session =new  MidHTTPRequest();    

        MidHTTPRequest::isAdmin();




        return Render::renderView("admin/dashboard.php", ["connected" => MidHTTPRequest::isConnected()]);
    }



}