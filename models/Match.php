<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 27/06/2018
 * Time: 10:39
 */

namespace BWB\Framework\mvc\models;


class Match
{
    private $candidat_user_id;
    private $entreprise_user_id;
    private $offre_id;

    /**
     * Match constructor.
     * @param $candidat_user_id
     * @param $entreprise_user_id
     * @param $offre_id
     */


    /**
     * @return mixed
     */
    public function getCandidatUserId()
    {
        return $this->candidat_user_id;
    }

    /**
     * @param mixed $candidat_user_id
     */
    public function setCandidatUserId($candidat_user_id)
    {
        $this->candidat_user_id = $candidat_user_id;
    }

    /**
     * @return mixed
     */
    public function getEntrepriseUserId()
    {
        return $this->entreprise_user_id;
    }

    /**
     * @param mixed $entreprise_user_id
     */
    public function setEntrepriseUserId($entreprise_user_id)
    {
        $this->entreprise_user_id = $entreprise_user_id;
    }

    /**
     * @return mixed
     */
    public function getOffreId()
    {
        return $this->offre_id;
    }

    /**
     * @param mixed $offre_id
     */
    public function setOffreId($offre_id)
    {
        $this->offre_id = $offre_id;
    }

    public function getIntitule()
    {
        return $this->intitule;
    }

    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;
    }


    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

}