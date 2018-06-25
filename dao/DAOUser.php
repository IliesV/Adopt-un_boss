<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

/**
 * Description of DAOMessage
 *
 * @author NootNoot
 */
class DAOUser extends DAO{

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
    
    public function retrieve_waiting_user() {
       $result = $this->getPdo()->query("SELECT id, permission FROM `user` WHERE statut=false");
       $donnees = $result->fetchAll();
       return $donnees;
    }

    public function update($array) {
        
    }

}
