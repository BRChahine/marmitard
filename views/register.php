<?php require_once "../includes/navbar.php"; ?>
<!-- formulaire d'inscription -->

<div class="w-50 mx-auto">
    <form action="../controller/register_controller.php" method="post" enctype="multipart/form-data">
        <!-- Le Nom -->
        <div class="mb-3">
            <labelclass="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" >
        </div>
            <!-- Le Prenom -->
        <div class="mb-3">
            <labelclass="form-label">Prenom</label>
            <input type="text" name="prenom" class="form-control" >
        </div>
            <!-- L'Email -->
        <div class="mb-3">
            <labelclass="form-label">Email</label>
            <input type="email" name="email" class="form-control" >
        </div>
            <!-- Age -->
        <div class="mb-3">
            <labelclass="form-label">Age</label>
            <input type="number" name="age" class="form-control" >
        </div>
            <!-- Mot de Passe -->
        <div class="mb-3">
            <labelclass="form-label">Mot de Passe </label>
            <input type="password" name="mdp" class="form-control" >
        </div>
            <!-- Sexe -->
        <div class="form-check">
            <input class="form-check-input" type="radio" name="sexe" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Femme
            </label>
            </div>
            <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="sexe" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Homme
            </label>
        </div>
            <!-- Photo Profile -->
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="photo">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
        <button class="btn btn-success">Register</button>
    </form>
</div>