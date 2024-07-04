<?php
// signifier a cette page que ici je vais manipuler des variables de sessions(creer, lire, modifier, supprimer)
session_start();
//inclure le fichier permettant d'assurer la connexion avec la base de donnees
require_once "../includes/db_connexion.php";

// verifier si l'utilisateur a valide le formulaire
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // recuperation des donnees
    $nomRecettte  = $_POST["nom"];
    $listIngredient = $_POST["ingredients"];
    $description = $_POST["description"];
    $categorie = $_POST["categorie"];

    // definition de la desitination de l'image
    $targetfile = "../imgs/". $_FILES['photo']['name'];

    try{
        move_uploaded_file($_FILES['photo']['tmp_name'], $targetfile);
        //enregistrer les informations dans la base de données
        $dbConnexion = dbConnexion();
        //préparer la requête
        $request = $dbConnexion->prepare("INSERT INTO recettes (nom, liste_ingredient, description, photos, id_user, id_categorie) VALUES (?, ?, ?, ?, ?, ?)");
        // execution de la requête
        $request->execute([
            $nomRecettte,
            $listIngredient,
            $description,
            $_FILES['photo']['name'],
            $_SESSION['id_user'],
            $categorie
        ]);
        // redirger vers la page d'accueil
        header("Location: http://localhost/marmitard/");

    }catch(Exception $e){
        echo $e->getMessage();
    }
}    