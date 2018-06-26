<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 26/06/2018
 * Time: 11:06
 */

namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Offre;
use PDO;
class DAOLike extends DAO
{

    public function get_candidat_like($id){
        $result=$this->getPdo()->query("SELECT intitule FROM offre WHERE id IN (SELECT offre_id FROM candidat_liked_offre WHERE candidat_user_id =".$id.")");
        $result->setFetchMode(PDO::FETCH_CLASS, "BWB\\Framework\\mvc\\models\\Offre");
        $object = $result->fetchAll();
        return $object;


    }
//    public function get_entreprise_like($id){
//        $result=$this->getPdo()->query("SELECT nom,w prenom, age, adresse, tel, mail, password, photo, date_creation, user_id FROM candidat WHERE user_id=12;".$id);
//        $donnees=$result->fetchAll();
//        return $donnees;
//    }

    public function create($array)
    {
        // TODO: Implement create() method.
    }

    public function retrieve($id)
    {
        // TODO: Implement retrieve() method.
    }

    public function update($array)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function getAllBy($filter)
    {
        // TODO: Implement getAllBy() method.
    }
}
