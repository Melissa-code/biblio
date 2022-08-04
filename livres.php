<?php 

require_once("Livreclasse.php"); 

$l1 = new Livre(1, "Algo selon H2PROG", 300, "algo.png");
$l2 = new Livre(2, "La France", 200, "france.png");
$l3 = new Livre(3, "JS", 500, "JS.png");
$l4 = new Livre(4, "Virus asiatique", 100, "virus.png");

$livres = [$l1, $l2, $l3, $l4];
//var_dump($livres) ;

ob_start(); ?> 

<!-- Tableau des livres --> 
<table class="table table-hover text-center">
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
    <?php foreach($livres as $livre) : ?>

        <tr class="table-active">
            <td class="align-middle"><img src="./public/images/<?= $livre->getImage() ?>" alt="l'algo" width="60px"></td>
            <td class="align-middle"><?= $livre->getTitre() ?></td>
            <td class="align-middle"><?= $livre->getNbPages() ?></td>
            <td class="align-middle"><a href="#" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle"><a href="#" class="btn btn-danger">Supprimer</a></td>
        </tr>
    <?php endforeach ?>

    </tbody>
</table>

<a href="#" class="btn btn-secondary d-block">Ajouter</a>

<?php 
$content = ob_get_clean();
$titre = "Liste des livres"; 
require "template.php"; 
?>