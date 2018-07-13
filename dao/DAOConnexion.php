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

    public function get_id_when_mail_match($email, $permission) {
        $result = $this->getPdo()->query("SELECT user_id FROM " . $permission . " WHERE mail='" . $email . "'");
        $object = $result->fetch(PDO::FETCH_ASSOC);
        return $object;
    }

    public function check_password($id, $password, $permission) {
        $model = "BWB\\Framework\\mvc\\models\\" . ucfirst($permission);
        $result = $this->getPdo()->query("SELECT * FROM " . $permission . " WHERE user_id='" . $id . "' AND password='" . $password . "'");
        $result->setFetchMode(PDO::FETCH_CLASS, $model);
        $object = $result->fetch();
        return $object;
    }

}
