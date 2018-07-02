<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Event;
use PDO;

/**
 * Description of DAOEvent
 *
 * @author amchi
 */
class DAOEvent extends DAO {

    public function create($array) {
        
    }

    public function delete($id) {
        
    }

    /**
     * Fonction permettant de récupérer un event en fonction de son id.
     * Il faut d'abord passer par une vérification de l'id
     * 
     * @param int correspondant à l'id de l'event à retrieve
     * @return objet
     */
    public function retrieve($id) {
        $result = $this->getPdo()->query("SELECT * FROM event WHERE id=" . $id);
        $result->setFetchMode(PDO::FETCH_CLASS, Event::class);
        $object = $result->fetch();
        return $object;
    }

    public function update($array) {
        
    }

    public function getAll() {
        
    }

    public function getAllBy($filter) {
        
    }

    /**
     * Fonction qui permet de retourner tous les event en attente de validation.
     * (statut=false)
     * Appelle list_object_events pour le retour.
     * 
     * @return list d'objet.
     */
    public function retrieve_waiting_events() {
        $result = $this->getPdo()->query("SELECT * FROM event WHERE statut=false");
        $result->setFetchMode(PDO::FETCH_CLASS, Event::class);
        $donnees = $result->fetchAll();
        return $donnees;
    }

}
