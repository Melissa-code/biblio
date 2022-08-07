<?php ob_start(); ?> 

<!-- enctyope pour télécharger l'image -->
<form action="<?= URL?>livres/mv" method="POST" enctype="multipart/form-data" class="d-flex flex-column mx-5">
    <!-- Titre --> 
    <div class="form-group mb-3">
        <label for="titre" class="form-label">Titre : </label>
        <!-- value pour preremplir l'input-->
        <input type="text" class="form-control" id="titre" name="titre" value="<?= $livre->getTitre() ?>">
    </div>
    <!-- nbPages --> 
    <div class="form-group mb-3">
        <label for="nbPages" class="form-label">Nombre de pages : </label>
        <input type="number" class="form-control" id="nbPages" name="nbPages" value="<?= $livre->getNbPages() ?>">
    </div>
    <!-- Image --> 
    <p>Image : </p>
    <img src="<?= URL ?>/public/images/<?= $livre->getImage() ?>" alt="image du livre" width="150">
    <div class="form-group mb-3">
        <label for="image"></label>
        <input type="file" class="form-control-file my-3" id="image" name="image" value="<?= $livre->getImage() ?>">
    </div>
    <!-- identifiant contient l'id du livre -->
    <div class="form-group mb-3">
        <input type="hidden" name="identifiant" value="<?= urlencode(base64_encode($livre->getId())) ?> ">
    </div>
    <!-- bouton --> 
    <button type="submit" class="btn btn-secondary">Modifier</button>
</form>


<?php 
$content = ob_get_clean();
$titre = "Modifier le livre ".$livre->getId() ;
require "template.php"; 
?>