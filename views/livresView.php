<?php 


require_once("controllers/LivreController.php"); 

//$livreManager = new LivreManager();
// $livreManager->chargementLivres();

ob_start(); ?> 

<!-- Tableau des livres --> 
<table class="table table-hover text-center border border-success">
    <thead>
        <!-- Titres des colonnes --> 
        <tr class="table-success">
            <th scope="col">Image</th>
            <th scope="col">Titre</th>
            <th scope="col">Nombre de pages</th>
            <th scope="col" colspan="2">Actions</th>
        </tr>
    </thead>
    
    <tbody>
        <!-- Contenu des colonnes  --> 
    <?php 

    foreach($livres as $livre) : ?>
        <tr class="table-light">
            <td class="align-middle"><img src="./public/images/<?= $livre->getImage() ?>" alt="l'algo" width="60px"></td>
            <td class="align-middle"><?= $livre->getTitre() ?></td>
            <td class="align-middle"><?= $livre->getNbPages() ?></td>
            <td class="align-middle"><a href="#" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle"><a href="#" class="btn btn-danger">Supprimer</a></td>
        </tr>
    <?php endforeach ?>

    </tbody>
</table>

<!-- Bouton ajouter livre --> 
<a href="#" class="btn btn-secondary d-block">Ajouter</a>


<?php 
$content = ob_get_clean();
$titre = "Liste des livres"; 
require "template.php"; 
?>