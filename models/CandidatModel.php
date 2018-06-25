<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\models;

/**
 * Description of CandidatModel
 *
 * @author NootNoot
 */
class CandidatModel {
    private $id_user;
    private $nom;
    private $prenom;
    private $age;
    private $adresse;
    private $tel;
    private $mail;
    private $password;
    private $photo;
    private $date_creation;
    
    function __construct($id_user=null, $nom=null, $prenom=null, $age=null, $adresse=null, $tel=null, $mail=null, $password=null, $photo=null, $date_creation=null) {
        $this->id_user = $id_user;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->age = $age;
        $this->adresse = $adresse;
        $this->tel = $tel;
        $this->mail = $mail;
        $this->password = $password;
        $this->photo = $photo;
        $this->date_creation = $date_creation;
    }
    
    function getId_user() {
        return $this->id_user;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getAge() {
        return $this->age;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getTel() {
        return $this->tel;
    }

    function getMail() {
        return $this->mail;
    }

    function getPassword() {
        return $this->password;
    }

    function getPhoto() {
        return $this->photo;
    }

    function getDate_creation() {
        return $this->date_creation;
    }

    function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setAge($age) {
        $this->age = $age;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    function setDate_creation($date_creation) {
        $this->date_creation = $date_creation;
    }


}
