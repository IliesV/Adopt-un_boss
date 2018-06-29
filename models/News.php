<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\models;

/**
 * Description of News
 *
 * @author amchi
 */
class News {

    private $id;
    private $titre;
    private $texte;
    private $statut;
    private $date_creation;

    public function to_array() {
        return array(
            "id" => $this->id,
            "titre" => $this->titre,
            "texte" => $this->texte,
            "statut" => $this->statut,
            "date_creation" => $this->date_creation
        );
    }

    public function to_json() {

        return json_encode($this->to_array());
    }
    
    function getId() {
        return $this->id;
    }

    function getTitre() {
        return $this->titre;
    }

    function getTexte() {
        return $this->texte;
    }

    function getStatut() {
        return $this->statut;
    }

    function getDate_creation() {
        return $this->date_creation;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setTexte($texte) {
        $this->texte = $texte;
    }

    function setStatut($statut) {
        $this->statut = $statut;
    }

    function setDate_creation($date_creation) {
        $this->date_creation = $date_creation;
    }

}
