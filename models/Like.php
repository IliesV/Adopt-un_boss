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
    private $user_id;
    
    
    function getId() {
        return $this->user_id;
    }

    function setId($user_id) {
        $this->user_id = $user_id;
    }

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
