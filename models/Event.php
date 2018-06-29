<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\models;

/**
 * Description of Event
 *
 * @author amchi
 */
class Event {
    private $id;
    private $titre;
    private $description;
    private $image;
    private $lieu;
    private $date;
    private $heure;
    private $statut;
    private $date_creation;
    private $entreprise_user_id;
    private $visibility;
    
    function getId() {
        return $this->id;
    }

    function getTitre() {
        return $this->titre;
    }

    function getDescription() {
        return $this->description;
    }

    function getImage() {
        return $this->image;
    }

    function getLieu() {
        return $this->lieu;
    }

    function getDate() {
        return $this->date;
    }

    function getHeure() {
        return $this->heure;
    }

    function getStatut() {
        return $this->statut;
    }

    function getDate_creation() {
        return $this->date_creation;
    }

    function getEntreprise_user_id() {
        return $this->entreprise_user_id;
    }
    function getVisibility() {
        return $this->visibility;
    }

    function setVisibility($visibility) {
        $this->visibility = $visibility;
    }

        function setId($id) {
        $this->id = $id;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setLieu($lieu) {
        $this->lieu = $lieu;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setHeure($heure) {
        $this->heure = $heure;
    }

    function setStatut($statut) {
        $this->statut = $statut;
    }

    function setDate_creation($date_creation) {
        $this->date_creation = $date_creation;
    }

    function setEntreprise_user_id($entreprise_user_id) {
        $this->entreprise_user_id = $entreprise_user_id;
    }

}
