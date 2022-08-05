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
        $req = $this->getBdd()->prepare("SELECT * FROM livres"); 
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


    public function getLivreById($id){
        //var_dump($id);
        for($i=0; $i < count($this->livres);$i++){
            //var_dump($this->livres[$i]->getId());
            if($this->livres[$i]->getId() === (int)base64_decode(urldecode($id))){
                //var_dump($this->livres[$i]);
                return $this->livres[$i];
            }
        }
    }


    public function ajoutLivreBdd($titre, $nbPages, $image) {
        $req = "INSERT INTO livres (titre, nbPages, image) VALUES (:titre, :nbPages, :image)"; 
        $stmt = $this->getBdd()->prepare($req); 
        $stmt->bindValue(":titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue(":nbPages", $nbPages, PDO::PARAM_INT);
        $stmt->bindValue(":image", $image, PDO::PARAM_STR);
        $resultat = $stmt->execute(); 
        $stmt->closeCursor(); 

        // vérifie si requete a bien retourné qqchose
        if($resultat > 0) {
            // recupere l'info de la derniere insertion en DB 
            $livre = new Livre($this->getBdd()->lastInsertId(), $titre, $nbPages, $image); 
            $this->ajoutLivre(($livre)); 
        }
    }


    public function supprimerLivreBdd($id) {
        $req = "DELETE FROM livres WHERE id = :id"; 
        $stmt = $this->getBdd()->prepare($req); 
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute(); 
        $stmt->closeCursor(); 

        if($resultat > 0) {
            $livre = $this->getLivreById($id); 
            unset($livre); 
        }
    }
 

}