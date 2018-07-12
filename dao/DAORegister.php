<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

/**
 * Description of DAORegister
 *
 * @author NootNoot
 */
class DAORegister extends DAO {

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

    public function add_user_candidat($donnees, $date, $adresse) {
        var_dump($this->getPdo()->exec("INSERT INTO `user`(permission) VALUES ('candidat')"));
        $id= $this->getPdo()->lastInsertId();
        echo "INSERT INTO candidat(`user_id`,`nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) "
                . "VALUES (".$id.",'".$donnees['nom']."','".$donnees['prenom']."',".$donnees['age'].",'".$adresse."',".$donnees['tel'].",'".$donnees['email']."','".$donnees['password']."','".$donnees['photo']."',".$date.",'".$donnees['description']."')";
        var_dump($this->getPdo()->query("INSERT INTO candidat(`user_id`,`nom`, `prenom`, `age`, `adresse`, `tel`, `mail`, `password`, `photo`, `date_creation`, `description`) "
                . "VALUES (".$id.",'".$donnees['nom']."','".$donnees['prenom']."',".$donnees['age'].",'".$adresse."',".$donnees['tel'].",'".$donnees['email']."','".$donnees['password']."','".$donnees['photo']."',".$date.",'".$donnees['description']."')"));}

}
