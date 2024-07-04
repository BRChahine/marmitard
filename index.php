<?php 
// inclure fichier fonction.php
require_once "includes/fonctions.php";
$recette = getValidatedRecette();
var_dump($recette);
// inclure le fichier navbar.php
require_once "includes/navbar.php"; 
?>