<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Event;
use BWB\Framework\mvc\models\Offre;
use PDO;

/**
 * Description of DAOMessage
 *
 * @author NootNoot
 */
class DAOUser extends DAO {

    public function create($array) {
        
    }

    public function delete($id) {
        
    }

    public function getAll() {
        
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
        
    }

    /**
     * retrieve_waiting_user : Fonction pour récupérer les user en attente de
     * validation (statut=0)
     * Appelle la fonction list_object_user
     * 
     * @return type liste d'objet
     */
    public function retrieve_waiting_users() {
        $result = $this->getPdo()->query("SELECT id, permission FROM user WHERE statut=false");
        $donnees = $result->fetchAll();
        return $this->list_object_users($donnees);
    }

    /**
     * list_object_user : Fonction de mise en forme des données en objet
     * 
     * @param type $donnees : données récupérer de la base de données
     * @return array d'objet
     */
    protected function list_object_users($donnees) {
        $list = array();
        foreach ($donnees as $donnee):
            $result = $this->getPdo()->query("SELECT * FROM " . $donnee['permission'] . " WHERE user_id=" . $donnee['id']);
            $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\" . ucfirst($donnee['permission']));
            $object = $result->fetch();
            array_push($list, $object);
        endforeach;
        return $list;
    }
    
     

    public function retrieve_user($permission, $id) {
        $result = $this->getPdo()->query("SELECT * FROM " . $permission . " WHERE user_id=" . $id);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\" . ucfirst($permission));
        $object = $result->fetch();
        return $object;
    }

    public function retrieve_waiting_offres() {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE statut=false");
        $result->setFetchMode(PDO::FETCH_CLASS, Offre::class);
        $donnees = $result->fetchAll();
        return $donnees;
    }

    public function retrieve_waiting_events() {
        $result = $this->getPdo()->query("SELECT * FROM event WHERE statut=false");
        $result->setFetchMode(PDO::FETCH_CLASS, Event::class);
        $donnees = $result->fetchAll();
        return $donnees;
    }

    public function update($array) {
        
    }


}
