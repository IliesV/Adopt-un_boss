<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\models;

use BWB\Framework\mvc\UserInterface;

/**
 * Description of Admin
 *
 * @author amchi
 */
class Admiwn implements UserInterface{

    private $id;
    private $pseudo;
    private $password;
    private $mail;

    function getId() {
        return $this->id;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getMail() {
        return $this->mail;
    }

    function getPassword() {
        return $this->password;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    public function getRoles() {
        
    }

    public function getUsername() {
        
    }

}
