<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\models;

/**
 * Description of Chat
 *
 * @author amchi
 */
class Chat {

    private $id;
    private $recepteur_id;
    private $emetteur_id;
    private $contenu;
    private $date_creation;

    function to_array() {
        return array(
            "id" => $this->id,
            "recepteur_id" => $this->recepteur_id,
            "emetteur_id" => $this->emetteur_id,
            "contenu" => $this->contenu,
            "date_creation" => $this->date_creation
        );
    }

    function getId() {
        return $this->id;
    }

    function getRecepteur_id() {
        return $this->recepteur_id;
    }

    function getEmetteur_id() {
        return $this->emetteur_id;
    }

    function getContenu() {
        return $this->contenu;
    }

    function getDate_creation() {
        return $this->date_creation;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setRecepteur_id($recepteur_id) {
        $this->recepteur_id = $recepteur_id;
    }

    function setEmetteur_id($emetteur_id) {
        $this->emetteur_id = $emetteur_id;
    }

    function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    function setDate_creation($date_creation) {
        $this->date_creation = $date_creation;
    }

}
