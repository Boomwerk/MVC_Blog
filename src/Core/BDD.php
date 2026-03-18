<?php

namespace Core;

use Exception;
use PDO;
use PDOException;

class BDD{

    private static $user = "root";
    private static $pass = "";
    private static $table = "boomblog";
    private static $host = "localhost";

    public static function connect(){

        try{

    
            $bdd = new PDO("mysql:host=".self::$host.";dbname=".self::$table, self::$user, self::$pass);

            return $bdd;

        }catch(PDOException $e){
            
           throw new Exception("Error: ". $e);
        }

       

    }



}