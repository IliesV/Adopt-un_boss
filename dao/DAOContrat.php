<?php



namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

/**
 * Description of DAOContrat
 *
 * @author ilies
 */
class DAOContrat extends DAO{
    
    

    public function create($array) {
        
    }

    public function delete($id) {
        
    }

    public function getAll() {
        $sql = "SELECT type_de_contrat FROM type_de_contrat";
        $result= $this->getPdo()->query($sql)->fetchAll();
        return $result;
        
        
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
        
    }

    public function update($array) {
        
    }

    
}