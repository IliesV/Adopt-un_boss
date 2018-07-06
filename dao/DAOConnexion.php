<?php
/**
 * Created by PhpStorm.
 * User: vidalfrancois
 * Date: 03/07/2018
 * Time: 14:21
 */

namespace BWB\Framework\mvc\dao;
use BWB\Framework\mvc\DAO;
use BWB\Framework\mvc\models\Candidat;
use PDO;

class DAOConnexion extends DAO
{

    public function create($array)
    {
        // TODO: Implement create() method.
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

    public function verif_user($username, $password)
    {
        $result = $this->getPdo()->query("SELECT * FROM candidat WHERE nom='".$username."' AND password='".$password."'");
        $result->setFetchMode(PDO::FETCH_CLASS, Candidat::class);
        $object = $result->fetch();
        return $object;
    }



//    public function get_view_entreprise()
//    {
//
//    }

}