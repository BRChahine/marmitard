<?php 
// inclure fichier fonction.php
require_once "../includes/fonctions.php";
$recette = getRecetteDetails($_GET['id']);
// inclure le fichier navbar.php
require_once "../includes/navbar.php"; 
?>

<div class="card mb-3">
  <img src="../imgs/<?= $recette['photos'] ?>" class="card-img-top" alt="<?= $recette['photos']?>">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-body-secondary"><?= $recette['liste_ingredient']?></small></p>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Ajouter une note
</button>
</div>
</div>
0

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../controller/details_recette_controller.php" method="post">
            <input type="text" name="id" value="<?= $recette['id']?>" hidden>
            <input type="number" name="note" max="10" min="0">
            <button class="btn btn-primary">Valider</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  
      </div>
    </div>
  </div>
</div>
