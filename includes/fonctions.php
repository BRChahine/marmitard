<?php
require_once "db_connexion.php";

// cette fonction permet de recuperer la liste des catgories
function getCategoryList(){
    // etablir connexion avec la base de donnees
    $dbConnexion = dbConnexion();
    //Preparer la requete qui permet de recuperer la liste des categories
    $request = $dbConnexion->prepare("SELECT id, nom FROM categories");
    // executer la requete
    $request->execute();
    // recuperer le resultat de la requete dans un tableau
    $categoryList = $request->fetchAll();
    return $categoryList;
}

// fonction qui permet de recuperer la liste des rectettes dont le status est true
function getValidatedRecette(){
    // etablir connexion avec la base de donnees
    $dbConnexion = dbConnexion();
    // preparer la requete qui permet de recuperer la liste des categories
    $request = $dbConnexion->prepare("SELECT recettes.nom as nom_recette, recettes.id AS id_recette, AVG(notes.note) AS moyenne, recettes.photos AS photos , COUNT(likes.id) AS nb_like
FROM recettes
LEFT JOIN notes ON recettes.id = notes.id_recette
LEFT JOIN likes ON recettes.id = likes.id_recette
WHERE recettes.statut = ?
GROUP BY recettes.id;");
    // executer la requete
    $request->execute([1]);
    // recuperer le resultat de la requete dans un tableau
    $recetteList = $request->fetchAll();
    return $recetteList;
}

// fonction qui permet de recuperer les infos d'une recette particulere

function getRecetteDetails($idRecette){
    // etablir la connexion avec la base de donnees
    $dbConnexion = dbConnexion();
    // preparer la requete qui permet de recuperer la liste des categories
    $request = $dbConnexion->prepare("SELECT * FROM recettes WHERE id = ?");
    // executer la requete
    $request->execute([$idRecette]);
    // recuperer le resultat de la requete dans un tableau
    $recette = $request->fetch();
    return $recette;

}

// fonction qui permet de recuperer la liste des rectettes dont le status est false
function getUnValidatedRecette(){
    // etablir connexion avec la base de donnees
    $dbConnexion = dbConnexion();
    // preparer la requete qui permet de recuperer la liste des categories
    $request = $dbConnexion->prepare("SELECT * FROM recettes WHERE statut = ?");
    // executer la requete
    $request->execute([0]);
    // recuperer le resultat de la requete dans un tableau
    $recetteList = $request->fetchAll();
    return $recetteList;
}