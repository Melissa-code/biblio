<?php
require_once("ModelClasse.php");
require_once("LivreClasse.php");

class LivreManager extends Model {

    // tab de livres qui va contenir tous les objets Livre
    private array $livres;


    public function ajoutLivre($livre) {
        $this->livres[] = $livre;
    }


    public function getLivres() {
        return $this->livres; 
    }


    public function chargementLivres() {
        $req = $this->getBdd()->prepare("SELECT * FROM Livres ORDER BY id ASC"); 
        $req->execute();
        // on récupère les infos dans $mesLivres qui est un tab associatif 
        $mesLivres = $req->fetchAll(PDO::FETCH_ASSOC);
        //echo "<pre>" ; print_r($mesLivres); echo "</pre>"; 
        $req->closeCursor(); 

        foreach($mesLivres as $livre){
            // on crée un objet dans lequel on met les infos du tab en indiquant la clé (par ex: id ou titre etc)
            $l = new Livre($livre['id'], $livre['titre'], $livre['nbPages'], $livre['image']); 
            $this->ajoutLivre($l); 
        }
        

    }




}