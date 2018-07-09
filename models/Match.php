<?php

/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 27/06/2018
 * Time: 10:39
 */

namespace BWB\Framework\mvc\models;

class Match {

    private $candidat_user_id;
    private $entreprise_user_id;
    private $offre_id;
    private $nom;
    private $intitule;

    /**
     * Match constructor.
     * @param $candidat_user_id
     * @param $entreprise_user_id
     * @param $offre_id
     */
    function getCandidat_user_id() {
        return $this->candidat_user_id;
    }

    function getEntreprise_user_id() {
        return $this->entreprise_user_id;
    }

    function getOffre_id() {
        return $this->offre_id;
    }
    function getNom() {
        return $this->nom;
    }

    function getIntitule() {
        return $this->intitule;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setIntitule($intitule) {
        $this->intitule = $intitule;
    }

        function setCandidat_user_id($candidat_user_id) {
        $this->candidat_user_id = $candidat_user_id;
    }

    function setEntreprise_user_id($entreprise_user_id) {
        $this->entreprise_user_id = $entreprise_user_id;
    }

    function setOffre_id($offre_id) {
        $this->offre_id = $offre_id;
    }
}
