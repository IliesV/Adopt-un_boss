<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Offre;
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
     * @param int correspondant à l'id de l'user à retrieve
     * @return objet
     */
    public function retrieve($id) {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE id=" . $id);
        $result->setFetchMode(PDO::FETCH_CLASS, Offre::class);
        $object = $result->fetch();
        return $object;
    }

    public function update($array) {
        
    }

    public function getAll() {
        
    }

    public function getAllBy($filter) {
        
    }

    public function getOffreAwaiting() {
        $sql = "SELECT * FROM offre WHERE statut = false";
        $result = $this->getPdo()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Offre");
        $object = $result->fetchAll();
        return $object;
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
        $result = $this->getPdo()->query("UPDATE offre SET statut=true WHERE id=".$id);
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
        $result = $this->getPdo()->query("DELETE FROM offre WHERE id=".$id);
        return $result->fetchAll();
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
