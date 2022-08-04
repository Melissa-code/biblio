<?php
require_once("controllers/LivreController.php");
$livreController = new LivreController;

if(empty($_GET['page'])){
    require("views/accueilView.php"); 
}
else {
    // name host/biblio/index.php?page=
    switch($_GET['page']){
        case "accueil": require("views/accueilView.php"); 
        break;
        case "livres": $livreController->afficherLivres();
        break;

    }
}