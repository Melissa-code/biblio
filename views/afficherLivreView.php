<?php 
require_once("controllers/LivreController.php"); 
ob_start(); 
?> 

<div class="row">
    <!-- image du livre --> 
    <div class="col-6">
        <img src="<?= URL ?>public/images/<?= $livre->getImage() ?>" alt="image du livre">
    </div>
    <!-- Titre et nb pages du livre --> 
    <div class="col-6">
        <p>Titre : <?= $livre->getTitre() ?></p>
        <p>Nombre de pages : <?= $livre->getNbPages() ?></p>
    </div>
</div>


<?php 
$content = ob_get_clean();
$titre = "Détail du livre"; 
require "template.php"; 
?>