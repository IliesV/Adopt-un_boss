<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

/**
 * Description of DAONotif
 *
 * @author amchi
 */
class DAONotif extends DAO {

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

    public function old_message($id_user) {
        return $this->getPdo()->query("SELECT message FROM user WHERE id=" . $id_user)->fetch();
    }

    public function new_message($id_user) {
        return $this->getPdo()->query("SELECT COUNT(*) FROM chat WHERE recepteur_id=" . $id_user)->fetch()['COUNT(*)'];
    }

    public function old_like($id_user) {
        return $this->getPdo()->query("SELECT `like` FROM user WHERE id=" . $id_user)->fetch();
    }

    public function new_like($id_user, $role_user, $role_recepteur) {
        if ($role_user == 'entreprise'):
            return $this->getPdo()->query("SELECT COUNT(*) FROM candidat_liked_offre INNER JOIN offre WHERE offre.entreprise_user_id=" . $id_user . " AND offre.id = offre_id")->fetch()['COUNT(*)'];
        else:
            return $this->getPdo()->query("SELECT COUNT(*) FROM " . $role_recepteur . "_liked_" . $role_user . " WHERE " . $role_user . "_user_id = " . $id_user)->fetch()['COUNT(*)'];
        endif;
    }

    public function old_match($id_user) {
        return $this->getPdo()->query("SELECT `match` FROM user WHERE id = " . $id_user)->fetch();
    }

    public function new_match($id_user, $role_user) {
        return $this->getPdo()->query("SELECT COUNT(*) FROM matching WHERE " . $role_user . "_user_id = " . $id_user)->fetch()['COUNT(*)'];
    }

    public function update_like($id_user, $new_like) {
        $this->getPdo()->query("UPDATE user SET `like` = " . intval($new_like) . " WHERE id = " . $id_user);
    }

    public function update_match($id_user, $new_match) {
        $this->getPdo()->query("UPDATE user SET `match` = " . intval($new_match) . " WHERE id = " . $id_user);
    }

}
