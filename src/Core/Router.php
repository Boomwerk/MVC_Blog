<?php

namespace Core;

class Router{

    private $routes = [];

    public function get(string $uri, string $action){

        $this->routes[$uri] = $action;


      
    }

    public function dispatch($uri){

        // $method = $_SERVER['REQUEST_METHOD'];
    
        // remove /blog/ from the uri
        $uri = parse_url($uri, PHP_URL_PATH); 
        $uri = str_replace('/blog/', '/', $uri);

        
        foreach($this->routes as $route => $action){

            $pattern = preg_replace('#\{\w+\}#', "([^\/]+)", $route);

            if (preg_match("#^$pattern$#", $uri, $matches)){
                
                array_shift($matches);
                $controller = explode('@',$action);
                

                $method = $controller[1];
                $controller = "Controller\\" . $controller[0];
                

                $instance = new $controller();

                if(isset($matches)){
                    $instance->$method($matches);
                }else{
                     $instance->$method();
                }
        
                return;
            }


        }

        


        
        


    }



}