<?php 
ob_start(); 
?> 

<form action="<?= URL?>livres/av" method="POST" enctype="multipart/form-data">
    <!-- Titre --> 
    <div class="mb-3">
        <label for="titre" class="form-label">Titre : </label>
        <input type="text" class="form-control" id="titre" name="titre">
    </div>
    <!-- nbPages --> 
    <div class="mb-3">
        <label for="nbPages" class="form-label">Nombre de pages : </label>
        <input type="number" class="form-control" id="nbPages" name="nbPages">
    </div>
    <!-- Image --> 
    <div class="form-group mb-3">
        <label for="image">Image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <!-- bouton --> 
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>




<?php 
$content = ob_get_clean();
$titre = "Ajout d'un livre"; 
require "template.php"; 
?>