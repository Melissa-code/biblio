<?php 
require_once("controllers/LivreController.php"); 
ob_start(); 
?> 

<div class="row m-3">
    <!-- image du livre --> 
    <div class="col-12 d-flex justify-content-center">

        <div class="card mb-3 card-livre" style="max-width: 50%">
            <div class="row g-0">
                <div class="col-md-4">
                    <!-- image du livre --> 
                    <img src="<?= URL ?>public/images/<?= $livre->getImage() ?>" alt="image du livre" class="img-fluid rounded-start m-3"> 
                </div>
            <div class="col-md-8 d-flex align-items-center">
                <div class="card-body m-3">
                    <!-- Titre et nb pages du livre --> 
                    <h5 class="card-title font-weight-bold">Titre : <span class="text-success"><?= $livre->getTitre() ?></span></h5>
                    <p class="card-text">Nombre de pages : <span class="text-success"><?= $livre->getNbPages() ?></span></p>
                </div>
            </div>
            </div>
        </div>

    </div>
</div>


<?php 
$content = ob_get_clean();
$titre = "Détail du livre"; 
require "template.php"; 
?>