<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Offre;
use BWB\Framework\mvc\models\OffreVue;
use PDO;

/**
 * Description of DAOOffre
 *
 * @author ilies
 */
class DAOOffre extends DAO {

    public function create($offre) {
        $sql = "INSERT INTO favoris (,) VALUES ("
                . $offre->getIntitule() . ","
                . $offre->getPoste() . ","
                . $offre->getLieu() . ","
                . $offre->getSalaire() . ","
                . $offre->getDetail() . ","
                . $offre->getDateCreation() . ","
                . $offre->getStatut() . ","
                . $offre->getEdition_Possible() . ")";
        $this->getPdo()->query($sql);
    }

    public function delete($id) {
        
    }

    /**
     * Fonction permettant de récupérer une offre en fonction de son id.
     * 
     * @param int correspondant à l'id de l'offre à retrieve
     * @return objet
     */
    public function retrieve($id) {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE id=" . $id);
        $result->setFetchMode(PDO::FETCH_CLASS, Offre::class);
        $object = $result->fetch();
        return $object;
    }

    /**
     * Fonction qui récupère toutes les offres validées.
     * @return objet
     */
    public function retrieve_all_validated() {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE statut = 1 ORDER BY date_creation DESC");
        $result->setFetchMode(PDO::FETCH_CLASS, OffreVue::class);
        $objects = $result->fetchAll();
        foreach ($objects as $object) {
            $nomBoite = $this->get_entreprise_nom($object->getEntreprise_user_id());
            $technos = $this->get_offre_techno($object->getId());
            $typeContrat = $this->get_offre_contrat($object->getId());
            $object->setNomBoite($nomBoite);
            $object->setTechnos($technos);
            $object->setTypeContrat($typeContrat);
        }

        return $objects;
    }

    public function update($array) {
        
    }

    public function getAll() {
        
    }

    public function getAllBy($filter) {
        
    }

    /**
     * Fonction qui permet de retourner toutes les offres en attente de validation.
     * (statut=false)
     * Appelle list_object_offres pour le retour.
     * 
     * @return list d'objet.
     */
    public function retrieve_waiting_offres() {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE statut=false");
        $result->setFetchMode(PDO::FETCH_CLASS, Offre::class);
        $donnees = $result->fetchAll();
        return $donnees;
    }

    /**
     * Fonction qui permet de valider une offre(statut=false -> statut=true)
     * Attention : il faut d'abord vérifié que le statut de l'offre est sur false.
     * Voir DAOVerif.
     * 
     * @param int correspondant à l'id de l'offre à valider
     * @return type
     */
    public function validation_offre($id) {
        $result = $this->getPdo()->query("UPDATE offre SET statut=true WHERE id=" . $id);
        return $result->fetchAll();
    }

    /**
     * Fonction qui permet de supprimer une offre.
     * Attention : il faut d'abord vérifié que le statut de l'offre est sur false.
     * Voir DAOVerif.
     * 
     * @param int correspondant à l'id de l'user à delete
     * @return type
     */
    public function delete_offre($id) {
        $result = $this->getPdo()->query("DELETE FROM offre WHERE id=" . $id);
        return $result->fetchAll();
    }

    public function get_entreprise_id() {
        $sql = "SELECT entreprise_user_id FROM offre WHERE statut = 1 ORDER BY date_creation DESC";
        $result = $this->getPdo()->query($sql)->fetch();
        return $result;
    }

    public function get_entreprise_nom($id) {
        $sql = "SELECT nom FROM entreprise where user_id=" . $id;
        $result = $this->getPdo()->query($sql)->fetch();
        return $result[0];
    }

    public function get_offre_techno($id) {
        $sql = "SELECT nom FROM techno WHERE id IN (SELECT techno_id FROM offre_has_techno WHERE offre_id =" . $id . ")";
        $result = $this->getPdo()->query($sql)->fetchAll();
        return $result;
    }

    public function get_offre_contrat($id) {
        $sql = "SELECT type_de_contrat FROM type_de_contrat where id IN (SELECT type_de_contrat_id FROM offre_has_type_de_contrat WHERE offre_id =" . $id . ")";
        $result = $this->getPdo()->query($sql)->fetch();
        return $result[0];
    }

    public function get_offre_by_techno($techno) {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE statut = 1 AND id IN"
                                       ."(SELECT offre_id FROM offre_has_techno WHERE techno_id IN"
                                       . "(SELECT id FROM techno WHERE nom = '" .$techno."'))");
        $result->setFetchMode(PDO::FETCH_CLASS, OffreVue::class);
        $objects = $result->fetchAll();
        foreach ($objects as $object) {
            $nomBoite = $this->get_entreprise_nom($object->getEntreprise_user_id());
            $technos = $this->get_offre_techno($object->getId());
            $typeContrat = $this->get_offre_contrat($object->getId());
            $object->setNomBoite($nomBoite);
            $object->setTechnos($technos);
            $object->setTypeContrat($typeContrat);
        }
        return $objects;
    }
    
        
        public function get_offre_by_contrat($contrat) {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE statut = 1 AND id IN"
                                       ."(SELECT offre_id FROM offre_has_type_de_contrat WHERE type_de_contrat_id IN"
                                       . "(SELECT id FROM type_de_contrat WHERE type_de_contrat = '" .$contrat."'))");
        $result->setFetchMode(PDO::FETCH_CLASS, OffreVue::class);
        $objects = $result->fetchAll();
        foreach ($objects as $object) {
            $nomBoite = $this->get_entreprise_nom($object->getEntreprise_user_id());
            $technos = $this->get_offre_techno($object->getId());
            $typeContrat = $this->get_offre_contrat($object->getId());
            $object->setNomBoite($nomBoite);
            $object->setTechnos($technos);
            $object->setTypeContrat($typeContrat);
        }
        return $objects;
    }
    
        public function check_argument($arg){
            $sql = "SELECT nom FROM techno";
            $result = $this->getPdo()->query($sql);
            $technos = $result->fetchAll();
            foreach($technos as $techno){
                if($techno[0] == $arg){
                    return TRUE;
                }
            }
                return FALSE;
        }


    /**
     * Fonction permettant de récupérer une offre les dernieres offres
     *
     * @param int correspondant à l'id de l'user à retrieve
     * @return objet
     */
    public function get_new_offre() {
        $result = $this->getPdo()->query("SELECT * FROM offre ORDER BY date_creation DESC LIMIT 5");
        $result->setFetchMode(PDO::FETCH_CLASS, Offre::class);
        $donnees = $result->fetchAll();
        return $donnees;
    }


}

        