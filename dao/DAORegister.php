<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

/**
 * Description of DAORegister
 *
 * @author NootNoot
 */
class DAORegister extends DAO {

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

    public function check_email($email, $role) {
        return $this->getPdo()->query("SELECT * FROM " . $role . " WHERE mail='" . $email . "'")->fetch();
    }

    public function save_data($data) {
        $this->getPdo()->exec("INSERT INTO `user`(permission, newsletter) VALUES ('" . $data['perm'] . "'," . $data['newsletter'] . ")");
        $id = $this->getPdo()->lastInsertId();
        $date = time();
        if ($data['perm'] === "candidat") {
            $this->getPdo()->query("INSERT INTO "
                    . "candidat(user_id, nom, prenom, age, adresse, tel, mail, password, photo, description, date_creation) "
                    . "VALUES (" . $id . ",'" . $data['nom'] . "','" . $data['prenom'] . "'," . $data['age'] . ",'" . $data['adresse'] . "'," . $data['tel'] . ",'" . $data['email'] . "','" . $data['password'] . "','" . $data['photo'] . "','" . $data['description'] . "'," . $date . ")")->fetch();
        } else {
            $this->getPdo()->query("INSERT INTO "
                    . $data['perm'] . "(user_id, nom,  adresse, tel, logo, description, salarie, site_web, date_creation, mail, password) "
                    . "VALUES (" . $id . ",'" . $data['nom'] . "','" . $data['adresse'] . "'," . $data['tel'] . ",'" . $data['photo'] . "','" . $data['description'] . "'," . $data['salarie'] . ",'" . $data['site_web'] . "'," . $date . ",'" . $data['email'] . "','" . $data['password'] . "')")->fetch();
        }
    }

}
