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
        //var_dump($livres); 
        require("views/livresView.php"); 
    }


    public function afficherLivre($id){
        $livre = $this->livreManager->getLivreById($id);
        //var_dump($livre); 
        //var_dump($id); 
        require("views/afficherLivreView.php");
    }


    public function supprimerLivre($id) {
        $nomImage = $this->livreManager->getLivreById($id)->getImage(); 
        // suppression de l'image dans le répertoire 
        unlink("public/images/".$nomImage); 
        //suppression de l'image en DB 
        $this->livreManager->supprimerLivreBdd($id);
        header('location:'.URL."livres");
    }



    public function ajoutLivre() {
        require("views/ajoutLivreView.php"); 
    }

    public function ajoutLivreValidation() {
        $file = $_FILES['image'];  
        //echo "<pre>" ; print_r($file); echo "</pre>"; 
        $repertoire = "public/images/"; 
        // ajout image dans public/images
        $nomImageAjoute = $this->ajoutImage($file, $repertoire); 
        // ajout image en BDD 
        $this->livreManager->ajoutLivreBdd($_POST['titre'], $_POST['nbPages'], $nomImageAjoute); 
        header('location:'.URL."livres");
    }

    private function ajoutImage($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
    
        if(!file_exists($dir)) mkdir($dir,0777);
    
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];
        
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }



}