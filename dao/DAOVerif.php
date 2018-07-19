<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

/**
 * Description of DAOVerif
 *
 * @author amchi
 */
class DAOVerif extends DAO {

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

    public function update($array) {
        
    }

    /**
     * Méthode permettant de vérifié que pour l'id en argument, statut=false
     * 
     * @param int id correspondant à l'id à vérifier
     * @return objet
     */
    public function check_status_user($id) {
        $result = $this->getPdo()->query("SELECT permission FROM user WHERE id=" . $id . " AND statut=false");
        $donnee = $result->fetch();
        if ($donnee == null):
            return false;
        endif;
        return $donnee;
    }

    /**
     * Méthode permettant de vérifié que pour l'id en argument, statut=false
     * 
     * @param int id correspondant à l'id à vérifier
     * @return objet
     */
    public function check_status_offre($id) {
        $result = $this->getPdo()->query("SELECT * FROM offre WHERE id=" . $id . " AND statut=false");
        $donnee = $result->fetch();
        if ($donnee == null):
            return false;
        endif;
        return $donnee;
    }

    /**
     * Méthode permettant de vérifié que pour l'id en argument, statut=false
     * 
     * @param int id correspondant à l'id à vérifier
     * @return objet
     */
    public function check_status_event($id) {
        $result = $this->getPdo()->query("SELECT * FROM event WHERE id=" . $id . " AND statut=false");
        $donnee = $result->fetch();
        if ($donnee == null):
            return false;
        endif;
        return $donnee;
    }
    
    /**
     * Méthode permettant de vérifié que pour l'id en argument, statut=false
     * 
     * @param int id correspondant à l'id à vérifier
     * @return objet
     */
    public function check_status_news($id) {
        $result = $this->getPdo()->query("SELECT * FROM actualite WHERE id=" . $id . " AND statut=false");
        $donnee = $result->fetch();
        if ($donnee == null):
            return false;
        endif;
        return $donnee;
    }

}
