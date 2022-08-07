<?php 
//require_once("controllers/LivreController.php"); 

ob_start(); 

if(!empty($_SESSION['alert'])): ?> 
    <div class="alert alert-<?= $_SESSION['alert']['type'] ?> text-danger text-center text-uppercase" role="alert">
        <?= $_SESSION['alert']['msg'] ?>
    </div>
<?php 
// on vide la variable de session 
unset($_SESSION['alert']); 
endif; ?>


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

    for($i=0; $i < count($livres); $i++): ?>
        <tr class="table-light">
            <td class="align-middle"><img src="public/images/<?= $livres[$i]->getImage() ?>" alt="l'algo" width="60px"></td>
            <td class="align-middle"><a href="<?= URL ?>livres/l/<?=  urlencode(base64_encode($livres[$i]->getId())) ?>"><?= $livres[$i]->getTitre() ?></a></td>
            <td class="align-middle"><?= $livres[$i]->getNbPages() ?></td>
           
            <!-- modifier -->
            <td class="align-middle">
                <form method="POST" action="<?= URL ?>livres/m/<?= urlencode(base64_encode($livres[$i]->getId())) ?>">
                    <button class="btn btn-warning" type="submit">Modifier</button>
                </form>
            </td>
            
            <!-- supprimer -->
            <td class="align-middle">
                <!-- onsubmit : confirmation JS  -->
                <form method="POST" action="<?= URL ?>livres/s/<?= urlencode(base64_encode($livres[$i]->getId())) ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le livre ?'); ">
                    <button class="btn btn-danger" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endfor ?>

    </tbody>
</table>

<!-- Bouton ajouter livre --> 
<a href="<?= URL ?>livres/a" class="btn btn-secondary d-block">Ajouter</a>


<?php 
$content = ob_get_clean();
$titre = "Liste des livres"; 
require "template.php"; 
?>