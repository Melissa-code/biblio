<?php
session_start(); 

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]")); 

require_once("controllers/LivreController.php");
$livreController = new LivreController;

if(empty($_GET['page'])){
    require("views/accueilView.php"); 
}
else {
    // décompose l'url 
    $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL); 
    // echo '<pre>'; print_r($url); echo '</pre>';

    // name host/biblio/index.php?page=
    switch($url[0]){
        case "accueil": require("views/accueilView.php"); 
        break;
        case "livres": 
            // $url[0] c'est accueil ou livres $url[1] c'est l a m ou s
            if(empty($url[1])){
                $livreController->afficherLivres();
            } else if($url[1] === "l") {
                $livreController->afficherLivre($url[2]);
            } else if($url[1] === "a") {
                $livreController->ajoutLivre();
            } else if($url[1] === "m") {
                //echo $url[2]; 
                $livreController->modifierLivre($url[2]); 
            } else if($url[1] === "s") {
                $livreController->supprimerLivre($url[2]);
            } else if($url[1] === "av") {
                $livreController->ajoutLivreValidation(); 
            } else if($url[1] === "mv") {
                $livreController->modifierLivreValidation(); 
            } 
            else {
                throw new Exception("La page n'existe pas.");  
            }
        break;
        default : throw new Exception("La page n'existe pas."); 
    }
}