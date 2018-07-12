<?php



namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use PDO;

/**
 * Description of DAOTechno
 *
 * @author ilies
 */
class DAOTechno extends DAO{
    
    

    public function create($array) {
        
    }

    public function delete($id) {
        
    }

    public function getAll() {
        $sql = "SELECT * FROM techno";
        $result= $this->getPdo()->query($sql);
        $result->setFetchMode(PDO::FETCH_CLASS, OffreVue::class);
        $objects = $result->fetchAll();
        return $objects;
        
        
    }

    public function getAllBy($filter) {
        
    }

    public function retrieve($id) {
        
    }

    public function update($array) {
        
    }

    
}
