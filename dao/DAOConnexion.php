<?php

/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 03/07/2018
 * Time: 14:21
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use PDO;

class DAOConnexion extends DAO {

    public function create($array) {
        // TODO: Implement create() method.
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

    public function verif_and_retrieve_user($email, $password, $permission) {
        $model = "BWB\\Framework\\mvc\\models\\".ucfirst($permission);
        $result = $this->getPdo()->query("SELECT * FROM " . $permission . " WHERE mail='" . $email . "' AND password='" . $password . "'");
        $result->setFetchMode(PDO::FETCH_CLASS, $model);
        $object = $result->fetch();
        return $object;
    }

}
