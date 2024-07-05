<?php
// signifier a cette page que ici je vais manipuler des variables de sessions(creer, lire, modifier, supprimer)
session_start();
//inclure le fichier permettant d'assurer la connexion avec la base de donnees
require_once("../includes/db_connexion.php");

// verifier si l'utilisateur a bien valider le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // recuperation des donnees saisies dans le formulaire de connexion
    $email = $_POST['email'];
    $mdp   = $_POST['mdp'];

    // etablir la connexion avec la base de donnees
    $dbConnexion = dbConnexion();
    // preparer la requete qui permet de recuperer les infos de l'utilisateur 
    $request = $dbConnexion->prepare("SELECT * FROM users WHERE email = ?");
    // executer la requete
    $request->execute([$email]);
    // recuperation du resultat de la requete dans un tableau
    $userInfos = $request->fetch();
    // verifier si l'email fourni par l'utilisateur existe dans la table users
    if(empty($userInfos)){
        echo "Cet email n'existe pas!";// cas ou le tableau $userInfos est vide

    }else{// cas ou le tableau $userInfos n'est pas vide
        // verifier la comformite du mot de passe 
        if(password_verify($mdp, $userInfos['mdp'])){
            $_SESSION['id_user'] = $userInfos['id'];
            $_SESSION['statuts'] = $userInfos['statuts'];
            header("Location: http://localhost/marmitard");

        }else{ // cas ou les mots de passe ne correspondent pas 
            echo "mot de passe incorrect!";
        }    
    }


}elseif(isset($_GET['action'])){
    session_destroy();
    // rediriger vers page d'accueil
    header("Location: http://localhost/marmitard");
}

else{
    // rediriger vers login.php
    header("Location: ../views/login.php");
}
