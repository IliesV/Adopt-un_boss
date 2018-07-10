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
        $result = $this->getPdo()->query("SELECT contenu,date_creation FROM chat WHERE recepteur_id=" . $id_user . " AND emetteur_id=" . $id_recepteur . " OR emetteur_id = " . $id_user . " AND recepteur_id = " . $id_recepteur . " ORDER BY ID DESC LIMIT 1")->fetch();
        return $result;
    }

    public function get_all_messages($id_user, $id_recepteur) {
        $result = $this->getPdo()->query("SELECT * FROM chat WHERE recepteur_id=" . $id_user . " AND emetteur_id=" . $id_recepteur . " OR emetteur_id = " . $id_user . " AND recepteur_id = " . $id_recepteur);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Chat");
        return $result->fetchAll();
    }

    public function save_message($id_user, $id_recepteur, $msg, $timestamp) {
        $this->getPdo()->query("INSERT INTO chat(recepteur_id, emetteur_id, contenu, date_creation) VALUES (" . $id_recepteur . "," . $id_user . ",'" . $msg . "'," . $timestamp . ")");
    }

    public function nb_messages_old($id_receveur, $role_receveur, $id_emetteur) {
        $_role_emetteur = ($role_receveur == 'candidat' ? 'entreprise' : 'candidat');
        return $result = $this->getPdo()->query("SELECT nombre_message FROM candidat_and_entreprise_chat WHERE " . $role_receveur . "_user_id=" . $id_receveur . " AND " . $_role_emetteur . "_user_id=" . $id_emetteur)->fetch();
    }

    public function nb_messages_new($id) {
        return $result = $this->getPdo()->query("SELECT COUNT(*) "
                        . "FROM chat "
                        . "WHERE emetteur_id=" . $id)->fetch()['COUNT(*)'];
    }

    public function update_message_by_id($id_receveur, $role_receveur, $id_emetteur, $all_message_by_id) {
        $_role_emetteur = ($role_receveur == 'candidat' ? 'entreprise' : 'candidat');
        $this->getPdo()->query("UPDATE candidat_and_entreprise_chat SET nombre_message=" . $all_message_by_id . " WHERE " . $role_receveur . "_user_id=" . $id_receveur . " AND " . $_role_emetteur . "_user_id=" . $id_emetteur)->fetch();
    }

    public function get_all_message($id_user, $role_user) {
        echo "SELECT SUM(nombre_message) FROM candidat_and_entreprise_chat Where " . $role_user . "_user_id =" . $id_user;
        return $this->getPdo()->query("SELECT SUM(nombre_message) FROM candidat_and_entreprise_chat Where " . $role_user . "_user_id =" . $id_user)->fetch();
    }

    public function update_all_message($id_user, $all_messages) {
        return $this->getPdo()->query("UPDATE user SET message=" . $all_messages . " WHERE id=" . $id_user)->fetch();
    }

}
