<?php

use BWB\Framework\mvc\DAO;

/**
 * Description of DAOEntreprise
 *
 * @author ilies
 */

class DAOEntreprise extends DAO{
    
    static private $pdo;
            
    function __construct() {
        parent::__construct();
    }

    public function create($entreprise) {
        $sql = "INSERT INTO entreprise (nom, tel, adresse, logo, salarie, description, site_web, date_creation, mail, password) VALUES ("
        .$entreprise->getNom().","
        .$entreprise->getTel().","
        .$entreprise->getAdresse().","
        .$entreprise->getLogo().","
        .$entreprise->getSalaries().","
        .$entreprise->getDescription().","
        .$entreprise->getSiteWeb().","
        .$entreprise->getDateCreation().","
        .$entreprise->getMail().","
        .$entreprise->getPassword().",";
        $this->getPdo()->query($sql);
        
    }

    public function delete($id) {
        $sql = "DELETE FROM";
        
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
