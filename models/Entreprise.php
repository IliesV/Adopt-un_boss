<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\models;

/**
 * Description of EntrepriseModel
 *
 * @author NootNoot
 */
class Entreprise {

    private $user_id;
    private $nom;
    private $tel;
    private $adresse;
    private $logo;
    private $description;
    private $salarie;
    private $site_web;
    private $password;
    private $date_creation;
    private $mail;

    public function getRoles() {
        return "entreprise";
    }

    function to_array() {
        return array(
            "user_id" => $this->user_id,
            "nom" => $this->nom,
            "password" => $this->password,
            "mail" => $this->mail,
            "tel" => $this->tel,
            "adresse" => $this->adresse,
            "logo" => $this->logo,
            "salarie" => $this->salarie,
            "site_web" => $this->site_web,
            "date_creation" => $this->date_creation,
            "description" => $this->description
        );
    }

    public function to_json() {
        return json_encode($this->to_array());
    }

    function getUser_id() {
        return $this->user_id;
    }

    function getNom() {
        return $this->nom;
    }

    function getTel() {
        return $this->tel;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getLogo() {
        return $this->logo;
    }

    function getDescription() {
        return $this->description;
    }

    function getSalarie() {
        return $this->salarie;
    }

    function getSite_web() {
        return $this->site_web;
    }

    function getDate_creation() {
        return $this->date_creation;
    }

    function setUser_id($user_id) {
        $this->id_user = $user_id;
    }

    function getPassword() {
        return $this->password;
    }

    function getMail() {
        return $this->mail;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setSalarie($salarie) {
        $this->salarie = $salarie;
    }

    function setSite_web($site_web) {
        $this->site_web = $site_web;
    }

    function setDate_creation($date_creation) {
        $this->date_creation = $date_creation;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setMail($mail) {
        $this->mail = $mail;
    }

}
