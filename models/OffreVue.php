<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\models;

/**
 * Description of OffreVue
 *
 * @author ilies
 */
class OffreVue {
    
    private $id;
    private $entreprise_user_id;
    private $intitule;
    private $poste;
    private $salaire;
    private $lieu;
    private $detail;
    private $date_creation;
    private $statut;
    private $edition_possible;
    private $visibility;
    private $nomBoite;
    private $technos;
    private $typeContrat;
    
    
    function getId() {
        return $this->id;
    }

    function getEntreprise_user_id() {
        return $this->entreprise_user_id;
    }

    function getIntitule() {
        return $this->intitule;
    }

    function getPoste() {
        return $this->poste;
    }

    function getSalaire() {
        return $this->salaire;
    }

    function getLieu() {
        return $this->lieu;
    }

    function getDetail() {
        return $this->detail;
    }

    function getDate_creation() {
        return $this->date_creation;
    }

    function getStatut() {
        return $this->statut;
    }

    function getEdition_possible() {
        return $this->edition_possible;
    }

    function getVisibility() {
        return $this->visibility;
    }

    function getNomBoite() {
        return $this->nomBoite;
    }

    function getTechnos() {
        return $this->technos;
    }

    function getTypeContrat() {
        return $this->typeContrat;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEntreprise_user_id($entreprise_user_id) {
        $this->entreprise_user_id = $entreprise_user_id;
    }

    function setIntitule($intitule) {
        $this->intitule = $intitule;
    }

    function setPoste($poste) {
        $this->poste = $poste;
    }

    function setSalaire($salaire) {
        $this->salaire = $salaire;
    }

    function setLieu($lieu) {
        $this->lieu = $lieu;
    }

    function setDetail($detail) {
        $this->detail = $detail;
    }

    function setDate_creation($date_creation) {
        $this->date_creation = $date_creation;
    }

    function setStatut($statut) {
        $this->statut = $statut;
    }

    function setEdition_possible($edition_possible) {
        $this->edition_possible = $edition_possible;
    }

    function setVisibility($visibility) {
        $this->visibility = $visibility;
    }

    function setNomBoite($nomBoite) {
        $this->nomBoite = $nomBoite;
    }

    function setTechnos($technos) {
        $this->technos = $technos;
    }

    function setTypeContrat($typeContrat) {
        $this->typeContrat = $typeContrat;
    }


}
