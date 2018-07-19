<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace BWB\Framework\mvc\dao;

use BWB\Framework\mvc\DAO;

/**
 * Description of DAOStats
 *
 * @author NootNoot
 */
class DAOStat extends DAO{
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

    public function count_user(){
        return $result=$this->getPdo()->query("SELECT COUNT(*) "
                . "FROM user "
                . "WHERE permission <> 'admin' AND statut=true")->fetch()['COUNT(*)'];
    }
    public function count_entreprise(){
        return $result=$this->getPdo()->query("SELECT COUNT(*) "
                . "FROM user "
                . "WHERE permission='entreprise' "
                . "AND statut=true")->fetch()['COUNT(*)'];
    }
    public function count_candidat(){

        return $result=$this->getPdo()->query("SELECT COUNT(*) "
                . "FROM user "
                . "WHERE permission='candidat' "
                . "AND statut=true")->fetch()['COUNT(*)'];    }
    public function count_offre(){
        
        return $result=$this->getPdo()->query("SELECT COUNT(*) "
                . "FROM offre "
                . "WHERE statut=true")->fetch()['COUNT(*)'];
    }
    public function count_like(){
        return $result=$this->getPdo()->query("SELECT COUNT(*) "
                . "FROM candidat_liked_offre ")->fetch()['COUNT(*)'] + $this->getPdo()->query("SELECT COUNT(*) "
                . "FROM entreprise_liked_candidat ")->fetch()['COUNT(*)'];
    }
    public function count_match(){
        return $result=$this->getPdo()->query("SELECT COUNT(*) "
                . "FROM matching ")->fetch()['COUNT(*)'];
    }
}
