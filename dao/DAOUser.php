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
 * Description of DAOMessage
 *
 * @author NootNoot
 */
class DAOUser extends DAO {

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

    /**
     * Fonction qui permet de retourner tous les users en attente de validation.
     * (statut=false)
     * Appelle la fonction list_object_user pour le retour.
     * 
     * @return liste d'objet
     */
    public function retrieve_waiting_users() {
        $result = $this->getPdo()->query("SELECT id, permission FROM user WHERE statut=false");
        $donnees = $result->fetchAll();
        return $this->list_object_users($donnees);
    }

    /**
     * Fonction permettant de transformé les données récupérer de la base de données en objet.
     * Ils sont insérés dans un tableau.
     * 
     * @param array récupérer par la requete de retrieve_waiting_users
     * @return liste d'objet
     */
    protected function list_object_users($donnees) {
        $list = array();
        foreach ($donnees as $donnee):
            $result = $this->getPdo()->query("SELECT * FROM " . $donnee['permission'] . " WHERE user_id=" . $donnee['id']);
            $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\" . ucfirst($donnee['permission']));
            $object = $result->fetch();
            array_push($list, $object);
        endforeach;
        return $list;
    }

    /**
     * Fonction permettant de récupérer un utilisateur en fonction de son id.
     * 
     * @param char correspondant au role de l'user et a la table ou 
     * sont stockées ses données.
     * @param int correspondant à l'id de l'user à retrieve
     * @return objet
     */
    public function retrieve_user($permission, $id) {
        $result = $this->getPdo()->query("SELECT * FROM " . $permission . " WHERE user_id=" . $id);
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\" . ucfirst($permission));
        $object = $result->fetch();
        return $object;
    }

    /**
     * Fonction qui permet de valider un utilisateur (statut=false -> statut=true)
     * Attention : il faut d'abord vérifié que le statut de l'utilisateur est sur false.
     * Voir DAOVerif.
     * 
     * @param int correspondant à l'id de l'user à valider
     * @return type
     */
    public function validation_user($id) {
        $result = $this->getPdo()->query("UPDATE user SET statut=true WHERE id=" . $id);
        echo'lol';
        return $result->fetchAll();
    }

    /**
     * Fonction qui permet de supprimer un utilisateur.
     * Attention : il faut d'abord vérifié que le statut de l'utilisateur est sur false.
     * Voir DAOVerif.
     * 
     * @param int correspondant à l'id de l'user à delete
     * @return type
     */
    public function delete_user($id) {
        $r = $this->getPdo()->query("DELETE FROM user WHERE id=" . $id);
    }

    /**
     * Fonction qui permet de récupérer le rôle d'un utilisateur (Admin, candidat, entreprise)
     * en fonction de son id.
     * @param int correspondant à l'id de l'utilisateur dont on veut récupérer le rôle.
     * @return type
     */
    public function get_user_permission($id) {
        $sql = "SELECT permission FROM user WHERE id=" . $id;
        $result = $this->getPdo()->query($sql);
        return $result->fetchColumn();
    }

    /**
     * Fonction permettant de récupérer un utilisateur en fonction de son id.
     * 
     * @param char correspondant au role de l'user et a la table ou 
     * sont stockées ses données.
     * @param int correspondant à l'id de l'user à retrieve
     * @return objet
     */
    public function retrieve_email($permission, $permission1 = null) {
        $mails = array();
        $mail = $this->getPdo()->query("SELECT mail FROM " . $permission . " INNER JOIN `user` WHERE user.id = " . $permission . ".user_id AND user.statut=true AND user.newsletter=true")->fetchAll();
        if (isset($permission1)):
            $mail1 = $this->getPdo()->query("SELECT mail FROM " . $permission1 . " INNER JOIN `user` WHERE user.id = " . $permission1 . ".user_id AND user.statut=true AND user.newsletter=true")->fetchAll();
        endif;
        foreach ($mail as $value):
            array_push($mails, $value);
        endforeach;
        foreach ($mail1 as $value):
            array_push($mails, $value);
        endforeach;
        return $mails;
    }

    public function nb_messages_old($id) {
        $sql = "SELECT message FROM user WHERE id=" . $id;
        $result = $this->getPdo()->query($sql);
        return $result->fetchColumn();
    }


}
