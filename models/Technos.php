<?php


namespace BWB\Framework\mvc\models;

/**
 * Description of Technos
 *
 * @author ilies
 */
class Technos {
    
    private $id;
    private $nom;
    private $type;
    
    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getType() {
        return $this->type;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setType($type) {
        $this->type = $type;
    }


}
