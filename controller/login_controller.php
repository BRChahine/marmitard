<?php

require_once("../include/db_connexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $mdp   = $_POST['mdp'];



}else{

    header("Location: ../views/login.php")


}