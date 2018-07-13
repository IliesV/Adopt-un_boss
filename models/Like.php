<?php


namespace BWB\Framework\mvc\models;

/**
 * Description of Like
 *
 * @author ilies
 */
class Like {

    private $nom;
    private $prenom;
    private $photo;
    
    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getPhoto() {
        return $this->photo;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }


}
