<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

/**
 * Description of DAOOffre
 *
 * @author ilies
 */
class DAOOffre extends DAO{
    
    
    public function create($offre) {
        
         $sql = "INSERT INTO favoris (,) VALUES ("
        .$offre->getIntitule().","
        .$offre->getPoste().","
        .$offre->getLieu().","
        .$offre->getSalaire().","
        .$offre->getDetail().","
        .$offre->getDateCreation().","
        .$offre->getStatut().","
        .$offre->getEdition_Possible().")";
        $this->getPdo()->query($sql);
        
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

}
