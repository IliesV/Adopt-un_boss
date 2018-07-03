<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\models;

/**
 * Description of OffreModel
 *
 * @author ilies
 */
class Offre {

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
    private $nom;
    private $techno;
    private $typeContrat;
     
    function to_array() {
        return array(
            "id" => $this->id,
            "entreprise_user_id" => $this->entreprise_user_id,
            "intitule" => $this->intitule,
            "poste" => $this->poste,
            "salaire" => $this->detail,
            "detail" => $this->detail,
            "date_creation" => $this->date_creation,
            "statut" => $this->statut,
            "edition_possible" => $this->edition_possible,
            "lieu" => $this->lieu,
            "visibility"=> $this->visibility
        );
    }
    
    function to_Json() {
        return json_encode($this->to_array());
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

    function getIntitule() {
        return $this->intitule;
    }

    function getPoste() {
        return $this->poste;
    }

    function getSalaire() {
        return $this->salaire;
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

    function getId() {
        return $this->id;
    }

    function getEntreprise_user_id() {
        return $this->entreprise_user_id;
    }

    function getLieu() {
        return $this->lieu;
    }

    public function getNom()
    {
        return $this->nom;
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

    function setId($id) {
        $this->id = $id;
    }

    function setEntreprise_user_id($entreprise_user_id) {
        $this->entreprise_user_id = $entreprise_user_id;
    }

    function setLieu($lieu) {
        $this->lieu = $lieu;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

}
