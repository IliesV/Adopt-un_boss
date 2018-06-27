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
    //put your code here
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

     public function check_status_user($id) {
        $result = $this->getPdo()->query("SELECT permission FROM user WHERE id=".$id." AND statut=false");
        $donnee = $result->fetch();
        if($donnee == null):
            return false;
        endif;
        return $donnee;
    }  
}
