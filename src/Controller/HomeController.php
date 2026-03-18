<?php

namespace Controller;

use Core\Render;


class HomeController
{
    
    public function index(){


        $title = "[TUTO] Creer des variables en php comme un professionnel pour vous faire embaucher !";
        $date = "15/03/2026";
        $image = "Public/assets/img/variable.jpg";
        $description = "Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt veniam ea nesciunt tempore laudantium voluptates porro consectetur in ducimus? Quam perspiciatis accusantium repellat perferendis iusto atque quod necessitatibus laboriosam enim!";


       return Render::renderView("home.php", ["title" => $title,"date" => $date, "image" => $image, "desc" => $description]);
        
    }

  
}