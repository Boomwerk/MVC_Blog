<?php

namespace Core;


class Render{


    public static function renderView(?string $page = null, ?array $variables = []){

        
        require_once "./src/Views/base.php";


    }


}