<?php
// fonction permettant de se connecter a la base de données
define("SERVER_NAME" , "mysql:host=localhost;port=3307");
define("DB_NAME", "marmitard");
define("DB_USER_NAME","root");
define("DB_USER_PASSWORD" , "");

function dbConnexion(){
    try{
        return new PDO(SERVER_NAME.";dbname=" .DB_NAME,DB_USER_NAME,DB_USER_PASSWORD);
    }catch(Exception $e){
        echo $e->getMessage();
    }
}