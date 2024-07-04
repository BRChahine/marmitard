<?php 
    require_once "../includes/fonctions.php"; 
    $categoryList = getCategoryList();    
?>
<?php require_once "../includes/navbar.php";?>


<div class="w-50 mx-auto">
    <form action="../controller/recette_controller.php" method="post" enctype="multipart/form-data">
        <!-- Le Nom de la recette -->
        <div class="mb-3">
            <labelclass="form-label">Nom Recette</label>
            <input type="text" name="nom" class="form-control" >
        </div>
            <!-- Le Ingredient de la recette -->
        <div class="mb-3">
            <labelclass="form-label">Liste Ingredients</label>
            <input type="text" name="ingredients" class="form-control" >
        </div>
            <!-- Description de la recette -->
        <div class="mb-3">
            <labelclass="form-label">Description</label>
            <textarea class="form-control" name="description" rows="3"></textarea>
        </div>
        
            <!-- Categorie de la recette -->
        <div class="mb-3">
            <label class="form-label">Categorie</label>
            <select class="form-select" name="categorie">
                <option selected value="">Selectionnez une catégorie</option>
                <?php foreach($categoryList as $category) { ?>
                    <option value="<?= $category['id']?>"><?= $category['nom'] ?></option>
                <?php } ?>
            </select>
        </div>
            <!-- Photo Profile -->
        <div class="input-group mb-3">
            <input type="file" class="form-control" name="photo">
            <label class="input-group-text" for="inputGroupFile02">Upload</label>
        </div>
        <button class="btn btn-success">Publier la Recette</button>
    </form>
</div>