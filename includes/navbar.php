<?php 
session_start();
define("BASE_URL","http://localhost/marmitard/");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src =https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js></script>

    <title>Document</title>
</head>
<body>

    <!-- la navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= BASE_URL ?>">Home</a>
        </li>
         <!-- la balise li suivante doit etre visible unique si un utilisateur est authentifie -->
         <?php if(isset($_SESSION['id_user'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>views/ajout_recette.php">Ajouter une recette</a>
                    </li>
                <?php } ?>

                <!-- cette partie doit etre visble uniquement si l'utilisateur est un Admin -->
                <?php if(isset($_SESSION['id_user']) && $_SESSION['statuts'] == "Admin"){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE_URL ?>views/liste_recette.php">Liste recette</a>
                    </li>
                <?php } ?>
      </ul>
      <form class="d-flex" role="search">
        <?php if (!isset($_SESSION['id_user'])){?>
          <a href="<?= BASE_URL ?>views/register.php" class="btn">Sign up</a>
          <a href="<?= BASE_URL ?>views/login.php" class="btn">Sign in</a>
        <?php } else{ ?>
          <a href ="<?= BASE_URL ?>controller/login_controller.php?action=logout" class="btn">Logout</a>
        <?php } ?>   
      </form>
    </div>
  </div>
</nav>
    
