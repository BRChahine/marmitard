<?php           
// inclure le fichier permettant d'assurer la connexion avec la base de données
require_once "../includes/db_connexion.php"; 
// verifier si l'utilisateur a bien valider le formulaire pour arriver sur cette page
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Recupération des données dans des variables
    if(empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['email']) || empty($_POST['mdp']) || empty($_POST['email']) || empty($_POST['age']) || empty($_POST['sexe'])){
        // Rediriger vers la page register.php
         header("Location: http://localhost/marmitard/views/register.php");
    }
    else{
        // récuperation des données
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $sexe = $_POST['sexe'];

        //récupération et upload de l'image sur le serveur
        echo "<pre>";
        print_r($_FILES['photo']);
        echo"<pre>";
        // definition de la desitination de l'image
        $targetfile = "../imgs/". $_FILES['photo']['name'];
        // sauvegarder l'image dans le dossier imgs
        try{
            move_uploaded_file($_FILES['photo']['tmp_name'], $targetfile);
            //enregistrer les informations dans la base de données
            $dbConnexion = dbConnexion();
            //préparer la requête
            $request = $dbConnexion->prepare("INSERT INTO users (nom, prenom, age, mdp, email, sexe, profile_image) VALUES (?, ?, ?, ?, ?, ?, ?)");
            // execution de la requête
            $request->execute(array($nom, $prenom, $age, $mdp, $email, $sexe, $_FILES['photo']['name']));

        }catch(Exception $e){
            echo $e->getMessage();
        }
}}

else{
    // Rediriger vers la page register.php
    header("Location: http://localhost/marmitard/views/register.php");
}