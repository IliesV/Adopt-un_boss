<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

/**
 * Description of DAOChat
 *
 * @author amchi
 */
class DAOChat extends DAO {

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

    public function get_date_and_last_message($id_user, $id_recepteur) {
        return $this->getPdo()->query("SELECT MAX(date_creation),MAX(contenu) message FROM chat WHERE recepteur_id=" . $id_user . " AND emetteur_id=" . $id_recepteur . " OR emetteur_id = " . $id_user . " AND recepteur_id = " . $id_recepteur)->fetch();
    }

}
