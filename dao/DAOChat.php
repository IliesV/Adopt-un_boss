<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;
use PDO;

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
        return $this->getPdo()->query("SELECT contenu,date_creation FROM chat WHERE recepteur_id=" . $id_user . " AND emetteur_id=" . $id_recepteur . " OR emetteur_id = " . $id_user . " AND recepteur_id = " . $id_recepteur . " ORDER BY ID DESC LIMIT 1")->fetch();
    }

    public function get_all_messages($id_user, $id_recepteur) {
        $result = $this->getPdo()->query("SELECT * FROM chat WHERE recepteur_id=" . $id_user . " AND emetteur_id=" . $id_recepteur . " OR emetteur_id = " . $id_user . " AND recepteur_id = " . $id_recepteur);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Chat");
        return $result->fetchAll();
    }

    public function save_message($id_user, $id_recepteur, $msg, $timestamp) {
        $this->getPdo()->query("INSERT INTO chat(recepteur_id, emetteur_id, contenu, date_creation) VALUES (" . $id_recepteur . "," . $id_user . ",'" . $msg . "'," . $timestamp . ")");
    }

    public function nb_messages_new($id) {
        return $result = $this->getPdo()->query("SELECT COUNT(*) "
                        . "FROM chat "
                        . "WHERE recepteur_id=" . $id)->fetch()['COUNT(*)'];
    }

    public function get_id_new_msg($id, $delta_msg) {

        return $this->getPdo()->query("SELECT emetteur_id FROM chat WHERE recepteur_id=" . $id . " ORDER BY id ASC LIMIT 0," . $delta_msg)->fetchAll(PDO::FETCH_COLUMN, 0);
    }

}
