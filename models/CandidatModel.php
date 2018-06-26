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
    private $description;

    public function __construct($id_user = null, $nom = null, $prenom = null, $age = null, $adresse = null, $tel = null, $mail = null, $password = null, $photo = null, $date_creation = null, $description = null) {
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
        $this->description = $description;
    }
    
    public function getRole() {
        return [
            "candidat"
        ];
    }
    
    public function to_array() {
        return array(
            "id" => $this->user_id,
            "nom" => $this->nom,
            "prenom" => $this->password,
            "age" => $this->mail,
            "adresse" => $this->adresse,
            "tel" => $this->tel,
            "mail" => $this->mail,
            "password" => $this->password,
            "photo" => $this->photo,
            "date_creation" => $this->date_creation,
            "description" => $this->description
        );
    }

    public function to_json() {

        return json_encode($this->to_array());
    }

    public function getId_user() {
        return $this->id_user;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAge() {
        return $this->age;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function getDate_creation() {
        return $this->date_creation;
    }

    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function setDate_creation($date_creation) {
        $this->date_creation = $date_creation;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

}