<?php 

require_once("models/LivreManager.php"); 

class LivreController {

    private $livreManager; 


    public function __construct() {
        // création du livre manager et chargement des livres de la BDD
        $this->livreManager = new LivreManager; 
        $this->livreManager->chargementLivres();
    }

    // route pour afficher livres
    public function afficherLivres() {
        $livres = $this->livreManager->getLivres();
        require("views/livresView.php"); 
    }

}