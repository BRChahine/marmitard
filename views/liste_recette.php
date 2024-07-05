<?php 
// inclure fichier fonction.php
require_once "../includes/fonctions.php";
$recettes = getUnValidatedRecette();
// inclure le fichier navbar.php
require_once "../includes/navbar.php"; 
?>

<div class="d-flex">
    <?php foreach($recettes as $rec) {?>
<div class="card" style="width: 18rem;">
  <img src="../imgs/<?=$rec["photos"] ?>" class="card-img-top" alt="<?= $rec["photos"] ?>">
  <div class="card-body">
    <h5 class="card-title"><?=$rec["nom"] ?></h5>
    <a href="../controller/details_recette_controller.php?update_id=<?= $rec['id'] ?>" 
    class="btn btn-primary">Valider la recette</a>
  </div>
</div>  
<?php } ?>
</div>

