<?php require_once "../includes/navbar.php";?>

<div class="w-25 mx-auto">
    <form action="../controller/login_controller.php" method="post">
        <!-- le mail -->
        <div class="mb-2 text-center">
            <label class="form-label ">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <!-- le mot de passe -->
        <div class="mb-2 text-center">
            <label class="form-label">Mot de passe</label>
            <input type="password" name="mdp" class="form-control">
        </div>
        <!-- bouton submit -->
        <div class="mb-2 text-center">
            <button type="submit" class="btn btn-primary">Connexion</button>
        </div>
</form>
</div>